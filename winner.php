<!--
Marist College - Copyright
Marist Fox Trivia
==========================
Matthew Blades
JohnAnthony Eletto
Francesco Galletti
Peter Sofronas
==========================


-->

<?php
	$title = 'You Win';
	include('db.php'); // Connects to the db
	$userN = $_SESSION['username']; // Gets the username
	$sid = $_GET["sid"]; //Gets the courseID
	$uid = $_SESSION['userId']; // Gets the userID
	$colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#f39c12", "#d35400", "#c0392b", "#bdc3c7"];
	
	$sql = "SELECT * FROM game_session Where SESSION_ID = $sid";
	$result = mysqli_query($conn, $sql);
	$result = mysqli_fetch_assoc($result);
	$cid = $result['COURSE_ID'];
	if($result['USER_ID_2'] == $uid){
		$sql = "SELECT * FROM user WHERE user.USER_ID = ". $result['USER_ID_1'];
		$result2 = mysqli_query($conn, $sql);
		$result2 = mysqli_fetch_assoc($result2);
		$tid = $result2['USER_ID'];
		$tname = $result2['USER_NAME'];
	}else {
		$sql = "SELECT * FROM user WHERE user.USER_ID = ". $result['USER_ID_2'];
		$result2 = mysqli_query($conn, $sql);
		$result2 = mysqli_fetch_assoc($result2);
		$tid = $result2['USER_ID'];
		$tname = $result2['USER_NAME'];
	}
	?>

<!-- START HTML CODE -->
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Winner</title>

		<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<link href="style/general.css" rel="stylesheet" type="text/css">
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-sm-6" id="currentUser">
					<!-- Displays the username on the top left corner-->
					<h3>Hi, <?php echo"$userN" ?></h3>
				</div>
				<div class="col-sm-6" id="utilities">

				<!-- Displays the buttons on the top right corner -->
				<a type="button" href="homePage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
				<a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
				<a type="button" href="options.php"><img src="img/settings.png" width="40px" alt="Options" title="Options"></a>

				</div>
			</div>

			<div class="page-header text-center" id="pg_header">
				<h1>You Win!</h1>
			</div>
			</br>
			</br>
			<div class="well">
				<div class="row">
					<?php
					$sql = "Select *
					From triviacrack.course
					WHERE COURSE_ID = '$cid'
					";
					$result = mysqli_query($conn, $sql);
					$result = mysqli_fetch_assoc($result);
					$courseName = ($result['TITLE']);
					echo"<h2 align='center'>$courseName"." course</h2>";
					?>
					<div class="col-sm-6" align="center">
						<h3 align="center">Your Tokens:</h3>
						<?php
						$sql = "SELECT * FROM score, categorylist WHERE categorylist.CATEGORY_ID = score.CATEGORY_ID AND USER_ID = $uid AND SESSION_ID = $sid";
								$scoreResult = mysqli_query($conn, $sql);
								if(mysqli_num_rows($scoreResult) > 0){
									$t = 0;
									while($row2 = mysqli_fetch_assoc($scoreResult)){
										$t++;
										if(($row2['HAS']) == 1){
											echo "<button class ='button' style = 'background-color:$colors[$t];border-radius: 60px;' disabled> ". $row2['CATEGORY_NAME'] ."</button></br>";
										}
									}
								}else {
									echo "<p style='color:red; align=center;'>no tokens</p>";
								}
						?>
					</div>
					<div class="col-sm-6" align="center">
						<h3 align="center"><?php echo "$tname Tokens: "; ?></h3>
						<?php
						$sql = "SELECT * FROM score, categorylist WHERE categorylist.CATEGORY_ID = score.CATEGORY_ID AND USER_ID = $tid AND SESSION_ID = $sid";
							$scoreResult2 = mysqli_query($conn, $sql);
							//if($scoreResult2){
							if(mysqli_num_rows($scoreResult2) > 0){
								$t = 0;
								while($row3 = mysqli_fetch_assoc($scoreResult2)){
									$t++;
									if(($row3['HAS']) == 1){
										echo "<button class ='button' style = 'background-color:$colors[$t];border-radius: 60px;' disabled> ". $row3['CATEGORY_NAME'] ."</button> \n";
									}
								}
							//}
							}else{
								echo "<p style='color:red; align=center;'>no tokens</p>";
							}
						?>	
					</div>
				</div>
			</div>	
		</div>
	</body>
</html>
