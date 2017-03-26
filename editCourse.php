<?php
	//page title
	$title = 'addCourse';
	include('db.php');
	$cid = $_GET ["cid"];
	echo "$cid";
	// Manage Course
	session_start();	
	$userN = $_SESSION['username'];
	$userRole = $_SESSION['role'];
	$userID = $_SESSION['userId'];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$errors = array();
		$cn = $_POST['CourseName'];
		$d = $_POST['description'];
		$sql = "";
		echo"$cn $d";
		if($cn){
			if($d){
			$sql = "UPDATE triviacrack.course SET TITLE='$cn', DESCRIPTION='$d' WHERE COURSE_ID='$cid';";
			mysqli_query($conn, $sql);
			header("Location:ManageCourse.php?cid=$cid");
			}}else {		
			$errors[] ='Enter in a Name and Description';
		}
	}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
				<h3>Hi, <?php echo"$userN"; ?></h3>
			</div>
			<div class="col-sm-6" id="utilities">
                <!-- Utility Icons Here -->
                <a type="button" href="homePage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
				<a type="button" href="options.php"><img src="img/settings.png" width="40px" alt="Options" title="Options"></a>
				<a type="button" href="homePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
            </div>
        </div>
		<div class="page-header text-center" id="pg_header">
			<h1>Manage Course<br /></h1>
		</div>
		<div class="row">
			<div class="well well-lg">
					<br>
					<form action= "addCourse.php"  method="post">
						<div class="col-sm-12 text-center">
							<label>Course Name</label>
						</div>
						<?php  
							$sql = "SELECT * FROM triviacrack.course WHERE COURSE_ID = $cid;";
							$result = mysqli_query($conn, $sql);
							$row = mysqli_fetch_assoc($result);
						?>
							<input type='text' class='form-control' name='CourseName' value="<?php echo"$row[TITLE]"; ?>" required>
					<div class="row">	
						<div class="col-sm-12 text-center">
							<label>Description</label>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 text-center">
							<textarea rows="8" class="form-control no-resize" id="description" name="description"><?php echo"$row[DESCRIPTION]"; ?></textarea>
						</div>
						
					</div>
					<div class="row">
					<br>
						<div class="col-sm-6 text-center">
							<input type="submit" value="Update Course" href="homePage.php">
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


  </body>
</html>