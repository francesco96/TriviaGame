<!--
Marist College - Copyright
Marist Fox Trivia
==========================
Matthew Blades
JohnAnthony Eletto
Francesco Galletti
Peter Sofronas
==========================

gameInfo page displays the basic information of a game
like the games available to a certain user. On the right
it displays the leaderboard. When a player click next
the game that the user just entered is then available to any
other player. The next player who clicks Play will enter the
most recently created game. Players will play until they lose.
Score will be recorded on the leaderboard.
-->

<?php
	$title = 'ManageCourse';
	include('db.php'); // Connects to the db
	$cid = $_GET ["cid"]; // Gets the CourseID
	$userN = $_SESSION['username']; // Gets the username
	$uid = $_SESSION['userId']; // Gets the userID
	$colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#f39c12", "#d35400", "#c0392b", "#bdc3c7"];
	?>

<!-- START HTML CODE -->
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Game Info</title>

		<link rel="icon" type="image/png" href="img/foxTriviaIcon.png"/>
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
				<a type="button" href="homePage.php#2.2"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
				<a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
				<a type="button" href="help.php"><img src="img/help.png" width="40px" alt="Help" title="Help"></a>

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
				?>
				</h1>
			</div>

		<form action='startSession.php' method='POST'>
			<input type='hidden' name='cid' value='<?php echo "$cid" ?>'>
			<center><input type='submit' name="newGame" id='newGame' style = 'height:90px;width:350px;font-size:50px;margin-bottom:50px;' value='New Game'></center>
		</form>

		<div class='col-sm-12'>
		<div class='well'>
			<table id="options" class='table-striped'>
				<th colspan="6">Your Turn</th>
				<?php
						$sql = "SELECT * FROM game_session WHERE game_session.USER_ID_WINNER = $uid AND game_session.IS_OVER = 1 AND game_session.COURSE_ID = $cid";
						
						$result = mysqli_query($conn, $sql);
						$count = 1;
						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {
								$cid = $row['COURSE_ID'];
								$sid = $row['SESSION_ID'];
								if($row['USER_ID_2'] == $uid){
									$sql = "SELECT * FROM user WHERE user.USER_ID = ". $row['USER_ID_1'];
									$result2 = mysqli_query($conn, $sql);
									$result2 = mysqli_fetch_assoc($result2);
									$tid = $result2['USER_ID'];
								}else {
									$sql = "SELECT * FROM user WHERE user.USER_ID = ". $row['USER_ID_2'];
									$result2 = mysqli_query($conn, $sql);
									$result2 = mysqli_fetch_assoc($result2);
									$tid = $result2['USER_ID'];
								}
								echo"
								<tr>
								<td>Vs. ". $result2['USER_NAME'] ."</td>
								<td>- Your Tokens: </td>
								<td>";
								$sql = "SELECT * FROM score, categorylist WHERE categorylist.CATEGORY_ID = score.CATEGORY_ID AND USER_ID = $uid AND SESSION_ID = $sid";
								$scoreResult = mysqli_query($conn, $sql);
								if(mysqli_num_rows($scoreResult) > 0){
									$t = 0;
									while($row2 = mysqli_fetch_assoc($scoreResult)){
										$t++;
										if(($row2['HAS']) == 1){
											echo "<button class ='button' style = 'background-color:$colors[$t];border-radius: 60px;' disabled> ". $row2['CATEGORY_NAME'] ."</button> \n";
										}
									}
								}else {
									echo "<p style='color:red; align=center;'>no tokens</p>";
								}
								echo"
								</td>
								<td>- Their Tokens:</td>
								<td>";
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
								echo"
								</td>
								<td> <a type='button' style='background-color: Green; border-radius: 10px; color: Black; padding: 5px' href='spinner/index.php?sid=". $row['SESSION_ID'] ."'>Play</a> </td>
								</tr>
								";
								$count += 1;
							}
						}
				?>
			</table>
			</br>

			<table class='table-striped'>
				<th colspan="6">Their Turn</th>
				<th></th>
				<?php
						$sql = "SELECT * FROM game_session WHERE game_session.USER_ID_WINNER != $uid AND game_session.USER_ID_WINNER != 0 AND game_session.IS_OVER = 1 AND game_session.COURSE_ID = $cid AND ($uid = game_session.USER_ID_1 OR $uid = game_session.USER_ID_2) AND (0 != game_session.USER_ID_1 OR 0 != game_session.USER_ID_2)";
						$result = mysqli_query($conn, $sql);
						$count = 1;
						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {
								$cid = $row['COURSE_ID'];
								$sid = $row['SESSION_ID'];
								if($row['USER_ID_2'] == $uid){
									$sql = "SELECT * FROM user WHERE user.USER_ID = ". $row['USER_ID_1'];
									$result2 = mysqli_query($conn, $sql);
									$result2 = mysqli_fetch_assoc($result2);
									$tid = $result2['USER_ID'];
								}else {
									$sql = "SELECT * FROM user WHERE user.USER_ID = ". $row['USER_ID_2'];
									$result2 = mysqli_query($conn, $sql);
									$result2 = mysqli_fetch_assoc($result2);
									$tid = $result2['USER_ID'];
								}
								echo"
								<tr>
								<td>Vs. ". $result2['USER_NAME'] ."</td>
								<td>- Your Tokens:</td>
								<td>";
								$sql = "SELECT * FROM score, categorylist WHERE categorylist.CATEGORY_ID = score.CATEGORY_ID AND USER_ID = $uid AND SESSION_ID = $sid";
								$scoreResult = mysqli_query($conn, $sql);
								if($scoreResult){
								if(mysqli_num_rows($scoreResult) > 0){
									$t=0;
									while($row2 = mysqli_fetch_assoc($scoreResult)){
										$t++;
										if(($row2['HAS']) == 1){
											echo "<button class ='button' style = 'background-color:$colors[$t];border-radius: 60px;' disabled> ". $row2['CATEGORY_NAME'] ."</button> \n";
										}
									}
								}else {
									echo "<p style='color:red; align=center;'>no tokens</p>";
								}}else {
									echo "<p style='color:red; align=center;'>no tokens</p>";
								}
								echo"
								</td>
								<td>- Their Tokens:</td>
								<td>";
								$sql = "SELECT * FROM score, categorylist WHERE categorylist.CATEGORY_ID = score.CATEGORY_ID AND USER_ID = $tid AND SESSION_ID = $sid";
								$scoreResult2 = mysqli_query($conn, $sql);
								if($scoreResult2){
								if(mysqli_num_rows($scoreResult2) > 0){
									while($row3 = mysqli_fetch_assoc($scoreResult2)){
										$t++;
										if(($row3['HAS']) == 1){
											echo "<button class ='button' style = 'background-color:$colors[$t];border-radius: 60px;' disabled> ". $row3['CATEGORY_NAME'] ."</button> \n";
										}
									}
								}else {
									echo "<p style='color:red; align=center;'>no tokens</p>";
								}
								}else{
									echo "<p style='color:red; align=center;'>no tokens</p>";
								}
								echo"
								</td>
								</tr>
								";
								$count += 1;
							}
						}
				?>
			</table>
			</br>

			<table class='table-striped'>
				<th colspan="6">Past Games</th>
				<th></th>
				<?php
						$sql = "SELECT * FROM game_session WHERE IS_OVER = 0 AND COURSE_ID = $cid AND (USER_ID_1 = $uid OR USER_ID_2 = $uid)";
						$result = mysqli_query($conn, $sql);
						$count = 1;
						if($result){
						if (mysqli_num_rows($result) > 0) {
							while($row = mysqli_fetch_assoc($result)) {
								if($row['USER_ID_2'] == $uid){
									$sql = "SELECT * FROM user WHERE user.USER_ID = ". $row['USER_ID_1'];
									$result2 = mysqli_query($conn, $sql);
									$result2 = mysqli_fetch_assoc($result2);
									$tid = $result2['USER_ID'];
								}else {
									$sql = "SELECT * FROM user WHERE user.USER_ID = ". $row['USER_ID_2'];
									$result2 = mysqli_query($conn, $sql);
									$result2 = mysqli_fetch_assoc($result2);
									$tid = $result2['USER_ID'];
								}
								echo"
								<tr>
								<td>Vs. ". $result2['USER_NAME'] ."</td>
								<td>- Your Tokens: </td>
								<td>- Their Tokens: </td>
								</tr>
								";
								$count += 1;
							}
						}
						}
				?>
			</table>
		</div>
		</div>
		</div>
		<?php include( 'footer.php' ); ?>
	</body>
</html>
