<?php
	//page title
	$title = 'ReportPage';
	//Landing page
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
    <title>Report</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style/optionStyle.css" rel="stylesheet" type="text/css">

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
				<a type="button" href="options.php"><img src="img/settings.png" width="40px" alt="Options" title="Options"></a>
				<a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
               <!--  <img src="img/settings.png" width="40px" alt="Settings" title="Settings"> -->
            </div>
        </div>
		<div class="page-header text-center" id="pg_header">
			<h1><font face="Comic sans MS" color="black">Report</font><br /></h1>
		</div>
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
		<div class="well well-lg">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm" id="toolTips">
				<h2>The following description will be directed to the Administrator.</h2>
			</div>
		</div>
    <div class="form-group">
      <label for="report">Description of Bug: </label>
      <label for="text" class="form-control" id="report">
    </div>
		<br>
		<div class="row">
			<div class="col-sm-12 text-center" id="toolTips1">
				<a type="button" href="homePage.php" class="btn btn-success">Submit</a>
			</div>
		</div>
		</div>
		</div>
	</div>

  </body>
</html>
