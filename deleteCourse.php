<?php
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$cid = $_POST['cid'];
		$sql = "DELETE FROM triviacrack.course WHERE COURSE_ID='$cid';";
		mysqli_query($conn, $sql);				
		//echo"$sql";
		header("Location: homePage.php");
}
?>