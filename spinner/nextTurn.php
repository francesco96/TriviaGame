<?php
include('../db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sid = $_POST['sid'];
		$uid = $_SESSION['userId'];
		$score = $_POST['score'];
		$sql = "SELECT * FROM game_session WHERE SESSION_ID='$sid';";
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$sql = "UPDATE score SET SCORE = $score WHERE SESSION_ID = $sid AND USER_ID = $uid";
		mysqli_query($conn, $sql);
		$sql = "UPDATE game_session SET USER_ID_WINNER='0' WHERE `SESSION_ID`='$sid'";
		mysqli_query($conn, $sql);
		header("Location: ../homePage.php");
}
?>
