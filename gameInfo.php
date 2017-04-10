<?php
	//page title
	$title = 'ManageCourse';
	include('db.php');
	$cid = $_GET ["cid"];
	$userN = $_SESSION['username'];
	$uid = $_SESSION['userId'];
	// Manage Course
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
			}*/
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
			#tableContainer{
				width:600px;
				left:40%;
				position:absolute;
			}
			#table1{
				width:70%;
			}
			#table2{
				width:25%;
				background-color: #FFFFFF;
				height: 300px;
				border: 5px solid black;
			}
			#table1, #table2{
				display: inline-block;
			}
			#leaderboard{

			}
			#options{
				font-size: 30px;
				background-color: #FFFFFF;
				text-align: left;
			}
		</style>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Game Info</title>
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
				<a type="button" href="options.php"><img src="img/settings.png" width="40px" alt="Options" title="Options"></a>
				<a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
				</div>
			</div>
			<div class="page-header text-center" id="pg_header">
				<h1><?php
					$sql = "Select *
					From triviacrack.course
					WHERE COURSE_ID = '$cid'
					";
					$result = mysqli_query($conn, $sql);
					$result = mysqli_fetch_assoc($result);
					$courseName = ($result['TITLE']);
					echo"$courseName"." course";
				?></h1>
			</div>
		<!-- <center><a type="button" href="spinner/index.php?cid=<?php echo "$cid" ?>" style = "height:90px;width:250px;font-size:50px;margin-bottom:50px;"class="btn btn-success">Play</a></center> -->
		<form action='startSession.php' method='POST'>
			<input type='hidden' name='cid' value='<?php echo "$cid" ?>'>
			<center><input type='submit' id='submit' style = 'height:90px;width:250px;font-size:50px;margin-bottom:50px;' value='Play'></center>
		</form>
			<div id = "tableContainer">
				<div id="table1">
					<table id="options">
						<th alight="right">Available Games</th>
						<?php
							$sql = "SELECT * FROM game_session, score WHERE game_session.USER_ID_WINNER = $uid AND game_session.IS_OVER = 1 AND game_session.SESSION_ID = score.SESSION_ID AND game_session.USER_ID_WINNER = score.USER_ID";
							$result = mysqli_query($conn, $sql);
							$count = 1;
							if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									echo"
									<tr>
									<td>". $row['USER_ID_2'] ."'s Game</td>
									<td>-  Score: ". $row['SCORE'] ." </td>
									<td> <a type='button' href='spinner/index.php?sid=". $row['SESSION_ID'] ."'>Play</a> </td>
									</tr>
									";
									$count += 1;
								}
							}
						?>
					</table>
				</div>
				<div id="table2">
					<table id="leaderboard">
						<th>Leaderboard</th>
						<?php
							$sql = "SELECT * FROM triviacrack.question WHERE question.COURSE_ID = $cid";
							$result = mysqli_query($conn, $sql);
							$count = 1;
							if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									echo"
									<tr>
									<td></td>
									<td></td>
									</tr>
									";
									$count += 1;
								}
							}
						?>
						<tr>
							<td>Blades</td>
							<td>1120</td>
						</tr>
						<tr>
							<td>Eletto</td>
							<td>1085</td>
						</tr>
						<tr>
							<td>Eletto</td>
							<td>1085</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
