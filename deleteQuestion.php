<!-- 
Marist College - Copyright
Marist Fox Trivia
==========================
Matthew Blades
JohnAnthony Eletto
Francesco Galletti
Peter Sofronas
==========================

deleteQuestion simply deletes a question given
a Question ID = qid.
-->


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