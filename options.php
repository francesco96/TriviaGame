<?php
	//page title
	$title = 'Options';
	//Landing page
	session_start();
	$userN = $_SESSION['username'];
	$userRole = $_SESSION['role'];
	$userID = $_SESSION['userId'];
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <style>
		img:hover {
   			color: black;
   			border: 0.1px solid #e5e5e5;
   			-webkit-transition-duration: 0.2s;
    		transition-duration: 0.2s;
    		padding: 0px;
			Margin - Border - Padding - Content
		}
		/* The Modal (background) */
		.modal {
		    display: none; /* Hidden by default */
		    position: fixed; /* Stay in place */
		    z-index: 1; /* Sit on top */
		    padding-top: 100px; /* Location of the box */
		    left: 0;
		    top: 0;
		    width: 100%; /* Full width */
		    height: 100%; /* Full height */
		    overflow: auto; /* Enable scroll if needed */
		    background-color: rgb(0,0,0); /* Fallback color */
		    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
		    background-color: #fefefe;
		    margin: auto;
		    padding: 20px;
		    border: 1px solid #888;
		    width: 80%;
		}

		/* The Close Button */
		.close {
		    color: #aaaaaa;
		    float: right;
		    font-size: 25px;
		    font-weight: bold;
		}

		.close:hover,
		.close:focus {
		    color: #000;
		    text-decoration: none;
		    cursor: pointer;
		} ,
	</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Options</title>

    <link rel="icon" type="image/png" href="img/foxTriviaIcon.png"/>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style/optionStyle.css" rel="stylesheet" type="text/css">
	<link href="style/general.css" rel="stylesheet" type="text/css">

  </head>
  <body>
	<div class="container">
		<div class="row">
            <div class="col-sm-6" id="currentUser">
				<h3>Hi, <?php echo"$userN" ?></h3>
			</div>
			<div class="col-sm-6" id="utilities">
                <!-- Utility Icons Here -->
                <a type="button" href="homePage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
				<a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
				<a type="button" href="help.php"><img src="img/help.png" width="40px" alt="Help" title="Help"></a>

               <!--  <img src="img/settings.png" width="40px" alt="Settings" title="Settings"> -->
            </div>
        </div>
		<div class="page-header text-center" id="pg_header">
			<h1>Options</h1>
		</div>
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<div class="well well-lg">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-3 text-center" id="toolTips">
				<h2>Tool Tips:</h2>
			</div>
			<div class="col-sm-3 text-center" id="toolTips1">
				<h2><a type="button" id="tool_tips" class="btn btn-success">On</a><a type="button" id="tool_tips" class="btn btn-danger">Off</a></h2>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12 text-center">
				<a type="button" id="report_a_bug" href="report.php" class="btn btn-danger">Report A Bug</a>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-sm-12 text-center" id="toolTips1">
				<form action="logout.php" method="post">
					<input type="submit" value="Log Out">
					<!-- <a type="button" href="index.php" class="btn btn-success">Log Out</a> -->
				</form>
			</div>
		</div>
		</div>
		</div>
	</div>
	<?php include( 'footer.php' ); ?>
  </body>
</html>
