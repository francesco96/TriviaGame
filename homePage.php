<?php
	//page title
	include('db.php');
	$title = 'HomePage';
	$userN = $_SESSION['username'];
	$userRole = $_SESSION['role'];
	$userID = $_SESSION['userId'];
	$gamePics = ['img/marist_pic.jpg', 'img/marist_pic4.jpg', 'img/Dyson.jpg', 'img/Fontaine.jpg', 'img/Library.jpg', 'img/Lowell Thomas.jpg', 'img/Rotunda.jpg', 'img/marist_pic3.jpg' ];
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
    <title>Login/Register</title>


	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
			<h1>Marist Fox Trivia</h1>
		</div>
		<div class="row">
		<?php
              $sql = "SELECT * FROM triviacrack.course;";
							$result = mysqli_query($conn, $sql);
							$numberOfGames = mysqli_num_rows($result);
                            if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									$pic = $row['IMAGE'];
									echo "
									<div class='col-sm-6 col-md-3'>
										<div class='thumbnail'>
										<img src= '$gamePics[$pic]'>
											<div class='caption'>
												<h3>".substr($row['TITLE'],0,15)."</h3>
												<p>". substr($row['DESCRIPTION'],0,50) ."...</p>
												<div class='col-sm-3'>
													<a href='gameInfo.php?cid=".$row['COURSE_ID']."' class='btn btn-success' role='button'>Play</a>
												</div>";
											if($userRole < 1 && $row['USER_ID'] == $userID){
												echo"
												<div class='col-sm-3'>
													<a href='ManageCourse.php?cid=".$row['COURSE_ID']."' class='btn btn-primary' role='button'>Edit</a>
												</div>
												<div class='col-sm-3'>
													<form action='deleteCourse.php' method='POST'>
													<input type='hidden' name='cid' value='".$row['COURSE_ID']."'>
													<input type='submit' id='delete' value='Delete'>
													</form>
												</div>
												";
											}
											echo"
											<br>
											</div>
										</div>
									</div>";
								}
							}

		if($userRole < 1){
			echo"
			<div class='col-sm-6 col-md-3'>
				<div class='thumbnail'>
					<a type='button' href='addCourse.php'><img src='img/plusSign.jpg' width='500px' alt='addGame' title='addGame'></a>
					<!--<img src='img/plusSign.jpg'>-->
					<div class='caption'>
						<h3>Add a Game</h3>
					</div>
				</div>
			</div>";
		}
		?>
		</div>
	</div>
	<?php include( 'footer.php' ); ?>
  </body>
</html>
