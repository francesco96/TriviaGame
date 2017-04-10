<?php
include('../db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sid = $_POST['sid'];
		$uid = $_SESSION['userId'];
		$score = $_POST['score'];
		$sql = "SELECT * FROM game_session WHERE SESSION_ID='$sid';";
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$cid= $result['COURSE_ID'];
		$sql = "UPDATE score SET SCORE = $score WHERE SESSION_ID = $sid AND USER_ID = $uid";
		mysqli_query($conn, $sql);
		if($uid == $result['USER_ID_2']){
			$sql = "UPDATE game_session SET USER_ID_WINNER='". $result['USER_ID_1'] ."' WHERE `SESSION_ID`='$sid'";
		}else {
			$sql = "UPDATE game_session SET USER_ID_WINNER='". $result['USER_ID_2'] ."' WHERE `SESSION_ID`='$sid'";
		}
		mysqli_query($conn, $sql);
		header("Location: ../gameinfo.php?cid=$cid");
}
?>
