<!--
Marist College - Copyright
Marist Fox Trivia
==========================
Matthew Blades
JohnAnthony Eletto
Francesco Galletti
Peter Sofronas
==========================

AddCourse is a page where an administrator or user with
correct authorization can add a new course to the homepage.
On the top left, "Hi, ..." displays the user name currently
logged in locally. Add Course sends the new created course
to the database.
-->
<?php
	//Displays the page title.
	$title = 'addCourse';
	include('db.php'); // Connects to the db
	$userN = $_SESSION['username']; // Takes username from db
	$userRole = $_SESSION['role']; // Takes user role (access)
	$userID = $_SESSION['userId']; // Takes userID from db
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$errors = array();
		$cn = $_POST['CourseName'];
		$d = $_POST['description'];
		$n = rand(0,7);
		$sql = "";
		echo"$cn $d";
		if($cn){
			if($d){
			$sql = "INSERT INTO triviacrack.course (TITLE, USER_ID, DESCRIPTION, IMAGE) VALUES ('$cn', '2', '$d', '$n')";
			mysqli_query($conn, $sql);
			$cid = $conn->insert_id;
			header("Location:setCategory.php?cid=$cid");
			}else{

			}
		}else {
			$errors[] ='Enter in a Name and Description';
		}
	}
?>

<!-- HTML CODE TO DISPLAY PAGE STARTS -->
<!DOCTYPE html>
<html lang="en">
  <head>
  	<!-- This controls the black squares when
  	the user hovers images-->
	<style>
	img:hover {
			color: black;
			border: 0.1px solid #e5e5e5;
			-webkit-transition-duration: 0.2s;
			transition-duration: 0.2s;
			padding: 0px;
		Margin - Border - Padding - Content
	}
	.modal {
			display: none; /* Hidden by default */
			position: fixed; /* Stay in place */
			z-index: 1; /* Sit on top */
			padding-top: 100px; /* Location of the box */
			left: 0;
			top: 0;
			width: 100%; /* Full width */
			height: 100%; /* Full height */
			overflow: auto; /* Enable scroll if needed */
			background-color: rgb(0,0,0); /* Fallback color */
			background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
	}
	.modal-content {
			background-color: #fefefe;
			margin: auto;
			padding: 20px;
			border: 1px solid #888;
			width: 80%;
	}
	.close {
			color: #aaaaaa;
			float: right;
			font-size: 25px;
			font-weight: bold;
	}
	.close:hover,
	.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
	} ,
</style>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Add Course</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style/general.css" rel="stylesheet" type="text/css">
  </head>

  <body>
	<div class="container">
		<div class="row">
            <div class="col-sm-6" id="currentUser">
            	<!-- Displays name of the user in top left corner -->
				<h3>Hi, <?php echo"$userN" ?></h3>
			</div>
			<div class="col-sm-6" id="utilities">
				<!-- Buttons on the top right of the page -->
                <a type="button" href="homePage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
				<a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
				<a type="button" href="help.php"><img src="img/help.png" width="40px" alt="Help" title="Help"></a>
            </div>
        </div>
        <!-- Page header -->
		<div class="page-header text-center" id="pg_header">
			<h1>Add Course<br /></h1>
		</div>

		<div class="row">
			<div class="well well-lg">
					<br>
					<form action= "addCourse.php"  method="post">
						<div class="col-sm-12 text-center">
							<label>Course Name</label>
						</div>
							<input type='text' class='form-control' name='CourseName' placeholder="Course Name" required>
					<div class="row">
						<div class="col-sm-12 text-center">
							<label>Description</label>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<textarea rows="8" class="form-control no-resize" id="description" name="description" placeholder="Write the description here!"> </textarea>
						</div>
					</div>
					<div class="row">
					<br>
						<div class="col-sm-6 text-center">
							<input type="submit" value="Add Course">
						</div>
						<div class="col-sm-6 text-center">
							<a type="button" href="homePage.php" class="btn btn-danger">Cancel</a>
						</div>
					</div>
					</form>
					<br>
			</div>
		</div>
	</div>
	<?php include( 'footer.php' ); ?>
  </body>
</html>
