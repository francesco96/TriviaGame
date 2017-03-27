<?php
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$qid = $_POST['qid'];
		$cid = $_POST['cid'];
		$sql = "DELETE FROM triviacrack.question WHERE QUESTION_ID='$qid';";
		mysqli_query($conn, $sql);				
		//echo"$sql";
		header("Location: ManageCourse.php?cid=$cid");
}
?>