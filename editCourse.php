<!--
Marist College & Donald Schwartz- Copyright
Marist Fox Trivia
==========================
Matthew Blades
JohnAnthony Eletto
Francesco Galletti
Peter Sofronas
==========================

editCourse is a page where the authorized user
can edit a specific course, re-entering the name
or description, for example.
-->

<?php
	$title = 'editCourse';
	include('db.php'); // Connect to db
	$cid = $_GET ["cid"]; // Get CourseID
	$userN = $_SESSION['username']; // Get username
	$userRole = $_SESSION['role']; // Get user role (access)
	$userID = $_SESSION['userId']; // Get userID
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$errors = array();
		$cn = $_POST['CourseName'];
		$d = $_POST['description'];
		$sql = "";
		echo"$cn $d";
		if($cn){
			if($d){
			$sql = "UPDATE triviacrack.course SET TITLE='$cn', DESCRIPTION='$d' WHERE COURSE_ID='$cid';";
			$result = mysqli_query($conn, $sql);
			header("Location: ManageCourse.php?cid=$cid");
			}}else {
			$errors[] ='Enter in a Name and Description';
		}
	}
?>
<!-- START HTML CODE-->
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Course</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style/general.css" rel="stylesheet" type="text/css">
  </head>

  <body>
	<div class="container">
		<div class="row">
            <div class="col-sm-6" id="currentUser">
            	<!-- Displays name of the user on the top left corner-->
				<h3>Hi, <?php echo"$userN"; ?></h3>
			</div>
			<div class="col-sm-6" id="utilities">
                <!-- Displays buttons on the top right corner-->
                <a type="button" href="homePage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
				<a type="button" href="homePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a>
				<a type="button" href="help.php#4.1"><img src="img/help.png" width="40px" alt="Help" title="Help"></a>

            </div>
        </div>
        <!-- Page Header -->
		<div class="page-header text-center" id="pg_header">
			<h1>Edit Course<br /></h1>
		</div>
		<div class="row">
			<div class="well well-lg">
					<br>
					<form action= "editCourse.php?cid=<?php echo"$cid"; ?>"  method="post">
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
							<a type="button" href=" <?php echo"ManageCourse.php?cid=$cid" ?>" class="btn btn-danger">Cancel</a>
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
