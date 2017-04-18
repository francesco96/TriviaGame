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
		$uid = $_POST['uid'];
		$sql = "INSERT INTO triviacrack.takes (USER_ID, COURSE_ID) VALUES ('$uid', '$cid')";
		mysqli_query($conn, $sql);
		header("Location: editStudents.php?cid=$cid");
}
?>