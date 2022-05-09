<?php
  require 'config.php';
  $sql = 'SELECT * FROM users';
  $statement = $pdo->prepare($sql);
  $statement->execute();
  $users = $statement->fetchAll(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Danh sách nhân viên</h2>
    </div>
    <div class="mt-3 ml-3 ">
      <a href="create.php" class="btn btn-success">Thêm</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <th>Email</th>
          <th>Tên</th>
          <th>Giới tính</th>
          <th>Ngày sinh</th>
          <th>Địa chỉ</th>
        </tr>
        <?php foreach($users as $user): ?>
          <tr>
            <td><?= $user->id; ?></td>
            <td><?= $user->email; ?></td>
            <td><?= $user->name; ?></td>
            <td><?= $user->gender; ?></td>
            <td><?= $user->dob; ?></td>
            <td><?= $user->address; ?></td>

            <td class="d-flex justify-content-center">
              <a href="read.php?id=<?= $user->id ?>" class="mr-2 btn btn-primary">Xem</a>
              <a href="update.php?id=<?= $user->id ?>" class="mr-2 btn btn-warning">Sửa</a>
              <a onclick="return confirm('Bạn có muốn xoá?')" href="delete.php?id=<?= $user->id ?>" class='btn btn-danger'>Xoá</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
