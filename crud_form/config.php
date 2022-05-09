<?php
  $servername = "localhost";
  $database = "db_crud_sys";
  $username = "root";
  $password = "";
  $charset = "utf8mb4";

  try {
    $dsn = "mysql:host=$servername;dbname=$database;charset=$charset";
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    return $pdo;
  }
  catch (PDOException $e) {
    echo "Kết nối db thất bại: ". $e->getMessage();
  }
?>
