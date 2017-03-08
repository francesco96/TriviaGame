<?php
	//page title
	$title = 'LoginPage';
	//Landing page
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login/Register</title>

    <!-- Bootstrap -->
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="lib/Jquery/jquery-3.1.1.min.js"></script>
	<script href="style/general.css" rel="stylesheet" type="text/css"></script>

	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  </head>
<<<<<<< HEAD
  <body background ="marist_pic2.jpg">	
	<div class="container">
=======
  <body>	
	<div class="container-fluid">
>>>>>>> e4e10477468acbaab50e86e3e5694323fd98f3ac
		<div class="page-header text-center" id="pg_header">
			<h1><font face="Comic sans MS" size="40px" color="black">Marist Fox Trivia</font><br /></h1>
		</div>
			<div class="row">
				<div class="col-sm-6 text-center" id="logging_in">
					<div class="well well-lg">
						<h1>Login</h1>
						<br>
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">Username</label>
								<input type="email" class="form-control" id="InputUsernamelogin" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="InputPasswordlogin" placeholder="Password">
							</div>
						</form>
						<a type="button" href="homePage.php" class="btn btn-success">Login</a>
					</div>
				</div>
				<div class="col-sm-6 text-center" id="regeistration">
					<div class="well well-lg">
						<h1>Register</h1>
						<br>
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">Username</label>
								<input type="email" class="form-control" id="InputUsernamereg" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Password</label>
								<input type="password" class="form-control" id="InputPasswordreg" placeholder="Password">
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Email address</label>
								<input type="password" class="form-control" id="InputEmailreg" placeholder="Password">
							</div>
						</form>
						<a type="button" href="homePage.php" class="btn btn-success">Register</a>
					</div>
				</div>
			</div>
	</div>    

  </body>
</html>