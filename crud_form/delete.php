<?php
  require 'config.php';

  $id = $_GET['id'];
  $sql = 'DELETE FROM users WHERE id=:id';
  $statement = $pdo->prepare($sql);
  if ($statement->execute([':id' => $id])) {
    header("Location: http://localhost/test/crud_form/index.php");
    $message = 'Xoá thành công';
  }
?>
