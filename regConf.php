<?php
  require 'db.php';
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $conn->query("INSERT INTO user VALUES(NULL, '$username', '$password', 1)");
  $conn->close();
  header('Location: loginPage.php');
 ?>
