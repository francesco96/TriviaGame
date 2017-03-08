<?php
	//page title
	include('db.php');
	$title = 'Marist Fox Trivia';
	//Landing page
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LandingPage</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style/landing.css" rel="stylesheet" type="text/css">
 
  </head>
  <body>
	<header id="top" class="header">
        <div class="text-vertical-center">
			<br>
			<br>
			<br>
			<br>
			<br>
			<div class="col-sm-3">
			</div>
				<div class="col-sm-6">
					<div class="well well-lg">
						<h1>Marist Fox Trivia</h1>
						<h3>Get Ready To Study</h3>
						<br>
						<a href="loginPage.php" class="btn btn-success btn-lg">Login/Register</a>
					</div>
				</div>
			
        </div>
    </header>
  </body>
</html>