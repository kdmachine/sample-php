<?php
  require 'config.php';

  if(isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];

    $sql = 'INSERT INTO users(email, password, name, gender, dob, address) VALUES(:email, :password, :name, :gender, :dob, :address)';

    $statement = $pdo->prepare($sql);

    if ($statement->execute([':email' => $email,
                            ':password' => $password,
                            ':name' => $name,
                            ':gender' => $gender,
                            ':dob' => $dob,
                            ':address' => $address])) {
      $message = 'Thêm thành công';
    }
  }
?>
<?php require 'header.php'; ?>
<div class="container">
  <div class="card mt-3">
    <div class="card-header">
      <h2>Thêm nhân viên</h2>
    </div>
    <div class="card-body">
      <form action="" method="POST">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" id="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Mật khẩu</label>
          <input type="password" name="password" id="password" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Tên</label>
          <input type="text" name="name" id="name" class="form-control">
        </div>
        <div class="form-group">
          <label for="name">Giới tính</label>
          <input type="text" name="gender" id="gender" class="form-control">
        </div>
        <div class="form-group">
          <label for="dob">Ngày sinh</label>
          <input type="date" name="dob" id="dob" class="form-control">
        </div>
        <div class="form-group">
          <label for="address">Địa chỉ</label>
          <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="form-group">
          <button type="submit" name="submit" value="submit" class="btn btn-info">Xác nhận</button>
        </div>
      </form>
    </div>
  </div>
</div>
