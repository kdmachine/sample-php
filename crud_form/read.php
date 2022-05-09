<?php
  require 'config.php';
  $id = $_GET['id'];
  $sql = 'SELECT * FROM users WHERE id=:id';
  $statement = $pdo->prepare($sql);
  $statement->execute([':id' => $id ]);
  $user = $statement->fetch(PDO::FETCH_OBJ);
?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-5">
    <div class="card-header">
      <h2>Thông tin nhân viên: <?= $user->name ?></h2>
    </div>
    <div class="ml-3 mt-3">
      <a href="update.php?id=<?= $user->id ?>" class="btn btn-warning">Sửa</a>
      <a onclick="return confirm('Bạn có muốn xoá?')" href="delete.php?id=<?= $user->id ?>" class='btn btn-danger'>Xoá</a>
    </div>
    <div class="card-body">
      <table class="table table-bordered">
        <tr>
          <th>ID</th>
          <td><?= $user->id; ?></td>
        </tr>
        <tr>
          <th>Email</th>
          <td><?= $user->email; ?></td>
        </tr>
        <tr>
          <th>Tên</th>
          <td><?= $user->name; ?></td>
        </tr>
        <tr>
          <th>Giới tính</th>
          <td><?= $user->gender; ?></td>
        </tr>
        <tr>
          <th>Ngày sinh</th>
          <td><?= $user->dob; ?></td>
        </tr>
        <tr>
          <th>Địa chỉ</th>
          <td><?= $user->address; ?></td>
        </tr>
      </table>
    </div>
  </div>
</div>
