<?php
	//page title
	include('db.php');
	$title = 'LoginPage';
	//Landing page
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if($_POST['email'] == "comp@comp.com"){
			header("Location: loginPage.php");
			die();
		}
    if(isset($_POST['email']) and isset($_POST['password']) ) {
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $sql =
        "SELECT *
         FROM user
         WHERE USER_EMAIL = '$email'"; //SHA2(?, 256)
		$result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0){
					$userData = $result->fetch_assoc(); #stores data as array w/ column names as index
					if(password_verify($pass, $userData['USER_PASSWORD'])){
            session_start();
            $_SESSION['username'] = $userData['USER_NAME'];
            $_SESSION['role'] = $userData['USER_TYPE'];
            $_SESSION['userId'] = $userData['USER_ID'];
            header("Location: homePage.php");
					}else{
						header("Location: loginPage.php?status=incorrectlogin");
					}
        } else {
            $invalid = true;
						header("Location: loginPage.php?status=incorrectlogin");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login/Register</title>

    <link rel="icon" type="image/png" href="img/foxTriviaIcon.png"/>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style/general.css" rel="stylesheet" type="text/css">


  </head>
  <body>
	<div class="container">
		<div class="page-header text-center" id="pg_header">
			<h1>Marist Fox Trivia</font><br /></h1>
		</div>
			<div class="row">
			<div class="col-sm-3">
			</div>
				<div class="col-sm-6 text-center" id="logging_in">
					<div class="well well-lg">
						<h2>Login</h2>
						<?php if(isset($_GET['status']) && $_GET['status'] == "incorrectlogin"){ echo "<b style='color:red;'>Incorrect Username or Password</b>";} if(isset($_GET['status']) && $_GET['status'] == "creationsuccess"){ echo "<b style='color:green;'>Account Successfully Created. You can now login below.</b>";}?>
						<br>
						<form action="loginPage.php" method="POST">
							<div class="form-group">
								<label>E-Mail</label>
								<input type="text" class="form-control" name="email" placeholder="Email" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password" required>
							</div>
							<input type="submit" value="Login">
						</form>
						<br/>
						<a href="registerPage.php">Or Register</a>
					</div>
				</div>
	</div>
	<?php include( 'footer.php' ); ?>
  </body>
</html>
