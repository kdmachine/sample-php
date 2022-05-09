<?php
  require 'config.php';
  $id = $_GET['id'];
  $sql = 'SELECT * FROM users WHERE id=:id';
  $statement = $pdo->prepare($sql);
  $statement->execute([':id' => $id ]);
  $user = $statement->fetch(PDO::FETCH_OBJ);
  if (isset ($_POST['email'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    $sql = 'UPDATE users SET email=:email, password=:password, name=:name, gender=:gender, dob=:dob, address=:address WHERE id=:id';

    $statement = $pdo->prepare($sql);

    if ($statement->execute([':email' => $email,
                            ':password' => $password,
                            ':name' => $name,
                            ':gender' => $gender,
                            ':dob' => $dob,
                            ':address' => $address,
                            ':id' => $id])) {
      $message = 'Cập nhật thành công';
    }
  }
?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-3">
    <div class="card-header">
      <h2>Cập nhật nhân viên</h2>
    </div>
    <div class="card-body">
      <form method="post">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" value="<?= $user->email; ?>" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Mật khẩu</label>
          <input type="password" value="<?= $user->password; ?>" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Tên</label>
          <input value="<?= $user->name; ?>" type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="gender">Giới tính</label>
          <input value="<?= $user->gender; ?>" type="text" name="gender" id="gender" class="form-control">
        </div>
        <div class="form-group">
          <label for="dob">Ngày sinh</label>
          <input value="<?= $user->dob; ?>" type="date" name="dob" id="dob" class="form-control">
        </div>
        <div class="form-group">
          <label for="address">Địa chỉ</label>
          <input value="<?= $user->address; ?>" type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-info">Cập nhật</button>
        </div>
      </form>
    </div>
  </div>
</div>
