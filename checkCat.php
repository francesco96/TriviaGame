<?php
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$catNum = $_POST['catnum'];
		if(catNum >= 3){
			
		$sql = "DELETE FROM triviacrack.categoryList WHERE COURSE_ID='$cid';";
		mysqli_query($conn, $sql);
		$sql = "DELETE FROM triviacrack.course WHERE COURSE_ID='$cid';";
		mysqli_query($conn, $sql);				
		//echo"$sql";
		header("Location: homePage.php");
}
?>