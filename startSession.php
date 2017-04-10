<?php
include ('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$userID = $_SESSION['userId'];
	$cid = $_POST['cid'];
	echo $cid;
	$sql = "INSERT INTO game_session (USER_ID_1, USER_ID_2, USER_ID_WINNER, COURSE_ID, IS_OVER) VALUES ('$userID', '0', '$userID', '$cid', '1');";
	echo $sql;
	mysqli_query($conn, $sql);
	$sid = $conn->insert_id;
	header("Location: spinner/index.php?sid=$sid");
}
?>