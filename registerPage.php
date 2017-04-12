<?php
	//page title
	include('db.php');
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
			<div class="col-sm-3 text-center">
			</div>
				<div class="col-sm-6 text-center" id="regeistration">
					<div class="well well-lg">
						<h2>Register</h2>
						<br>
						<form method="post" action="newuser.php">
							<div class="form-group">
								<label>Username</label>
								<input type="text" class="form-control" name="username" placeholder="Username" required>
							</div>
							<div class="form-group">
								<label>Password</label>
								<input type="password" class="form-control" name="password" placeholder="Password" required>
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Confirm Password</label>
								<input type="password" class="form-control" name="password2" placeholder="Password">
							</div>
							<input type="submit" value="Register">
						</form>
						<script>
							$("form").submit(function(){
								if($("input[name=password]").val() != $("input[name=password2]")){
									alert("Your Passwords Do Not Match");
									$("input[name=password]").val("");
									$("input[name=password2]").val("");
									return false;
								}else{
									return true;
								}
							});
						</script>
					</div>
				</div>
			</div>
	</div>

  </body>
</html>
