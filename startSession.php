<?php
include ('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$userID = $_SESSION['userId'];
	$cid = $_POST['cid'];
	$sql = "SELECT * FROM game_session WHERE USER_ID_2 = 0 AND USER_ID_1 != $userID LIMIT 1";
	$result = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$result = mysqli_fetch_assoc($result);
		$sql= "UPDATE game_session SET USER_ID_2 = $userID, USER_ID_WINNER = $userID WHERE SESSION_ID = " . $result['SESSION_ID'];
		mysqli_query($conn, $sql);
		$sql = "INSERT INTO score (USER_ID, SCORE, SESSION_ID) VALUES ('$userID', '0', '". $result['SESSION_ID'] ."');";
		mysqli_query($conn, $sql);
		header("Location: spinner/index.php?sid=". $result['SESSION_ID']);
	}else {
		$sql = "INSERT INTO game_session (USER_ID_1, USER_ID_2, USER_ID_WINNER, COURSE_ID, IS_OVER) VALUES ('$userID', '0', '$userID', '$cid', '1');";
		mysqli_query($conn, $sql);
		$sid = $conn->insert_id;
		$sql = "INSERT INTO score (USER_ID, SCORE, SESSION_ID) VALUES ('$userID', '0', '$sid');";
		mysqli_query($conn, $sql);
		header("Location: spinner/index.php?sid=$sid");
	}
}
?>