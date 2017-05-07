<?php
if(isset($_POST['email']) && isset($_POST['code'])){
  $email = $_POST['email'];
  $token = $_POST['code'];
  require 'db.php';
  $check = $conn->query("SELECT * FROM pendinguser WHERE email='$email' AND token=$token");
  if($check->num_rows > 0){
    $check = $check->fetch_assoc();
    $password = $check['password'];
    $username = $check['username'];
    $conn->query("INSERT INTO user VALUES(NULL, '$email', '$username', '$password', 1)");
    $conn->query("DELETE FROM pendinguser WHERE email='$email'");
    $conn->close();
    header("Location: loginPage.php?status=creationsuccess");
  }else{
    header("Location: index.php");
  }
}
 ?>
