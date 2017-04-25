<?php
include ('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$userID = $_SESSION['userId'];
	$cid = $_POST['cid'];
	$sql = "SELECT * FROM game_session WHERE USER_ID_2 = 0 AND USER_ID_1 != $userID AND USER_ID_WINNER = 0 LIMIT 1";
	$result = mysqli_query($conn, $sql);
	$sql = "SELECT * FROM categorylist WHERE $cid = COURSE_ID";
	$result2 = mysqli_query($conn, $sql);
	if (mysqli_num_rows($result) > 0) {
		$result = mysqli_fetch_assoc($result);
		$sql= "UPDATE game_session SET USER_ID_2 = $userID, USER_ID_WINNER = $userID WHERE SESSION_ID = " . $result['SESSION_ID'];
		mysqli_query($conn, $sql);
		//need to update how score is created to intclude all of the categories
		
		if(mysqli_num_rows($result2) > 0){
			while($row = mysqli_fetch_assoc($result2)) {
				$sql = "INSERT INTO score (USER_ID,CATEGORY_ID, SESSION_ID) VALUES ($userID, ". $row['CATEGORY_ID'] .", ". $result['SESSION_ID'] .")";
				//echo $sql;
				mysqli_query($conn, $sql);
			}
		}
		header("Location: spinner/index.php?sid=". $result['SESSION_ID']);
	}else {
		$sql = "INSERT INTO game_session (USER_ID_1, USER_ID_2, USER_ID_WINNER, COURSE_ID, IS_OVER) VALUES ('$userID', '0', '$userID', '$cid', '1');";
		mysqli_query($conn, $sql);
		$sid = $conn->insert_id;
		if(mysqli_num_rows($result2) > 0){
			while($row = mysqli_fetch_assoc($result2)) {
				$sql = "INSERT INTO score (USER_ID,CATEGORY_ID, SESSION_ID) VALUES ($userID, ". $row['CATEGORY_ID'] .", ". $sid .");";
				mysqli_query($conn, $sql);
				
			}
		}
		header("Location: spinner/index.php?sid=$sid");
	}
}
?>