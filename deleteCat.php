<!-- 
Marist College - Copyright
Marist Fox Trivia
==========================
Matthew Blades
JohnAnthony Eletto
Francesco Galletti
Peter Sofronas
==========================

addStudents is a page programmed to simply POST a server request
to the db. It adds a student to a course.
-->


<?php
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$cid = $_POST['cid'];
		$cat_id = $_POST['cat_id'];
		$sql = "DELETE FROM triviacrack.question WHERE CATEGORY_ID ='$cat_id';";
		mysqli_query($conn, $sql);
		$sql = "DELETE FROM triviacrack.categoryList WHERE CATEGORY_ID='$cat_id';";
		mysqli_query($conn, $sql);				
		//echo"$sql";
		header("Location: setCategory.php?cid=$cid");
}
?>