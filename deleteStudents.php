<!-- 
Marist College - Copyright
Marist Fox Trivia
==========================
Matthew Blades
JohnAnthony Eletto
Francesco Galletti
Peter Sofronas
==========================

deleteStudents simply deletes a student given
a Student ID = sid.
-->


<?php
include('db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$cid = $_POST['cid'];
		$sid = $_POST['uid'];
		$sql = "DELETE FROM triviacrack.takes WHERE COURSE_ID ='$cid' AND USER_ID = '$sid';";
		mysqli_query($conn, $sql);
		header("Location: editStudents.php?cid=$cid");
}
?>