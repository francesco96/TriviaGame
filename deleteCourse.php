<!-- 
Marist College - Copyright
Marist Fox Trivia
==========================
Matthew Blades
JohnAnthony Eletto
Francesco Galletti
Peter Sofronas
==========================

deleteCourse is created to simply POST a server quest
to delete a specific course given Course ID = cid.
-->

<?php
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$cid = $_POST['cid'];
		$sql = "DELETE FROM triviacrack.categoryList WHERE COURSE_ID='$cid';";
		mysqli_query($conn, $sql);
		$sql = "DELETE FROM triviacrack.course WHERE COURSE_ID='$cid';";
		mysqli_query($conn, $sql);				
		//echo"$sql";
		header("Location: homePage.php");
}
?>