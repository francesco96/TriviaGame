<!-- 
Marist College - Copyright
Marist Fox Trivia
==========================
Matthew Blades
JohnAnthony Eletto
Francesco Galletti
Peter Sofronas
==========================

db.php is a PhP file created to simply connect to the 
10.10.7.88 database. Note that the port is :8080
-->

<?php
	//Create connection
	$conn = mysqli_connect('10.10.7.88','Blades','student','triviacrack');
	mysqli_set_charset($conn,'utf8');
	session_start();
?>