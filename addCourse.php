<?php
	//page title
	$title = 'addCourse';
	include('db.php');
	// Add Course	
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
			$sql = "INSERT INTO triviacrack.course (TITLE, USER_ID, DESCRIPTION) VALUES ('$cn', '2', '$d')";
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
<!DOCTYPE html>
<html lang="en">
  <head>
  <style>	
		img:hover { 
   			color: black;
   			border: 0.1px solid #e5e5e5;
   			-webkit-transition-duration: 0.2s;
    		transition-duration: 0.2s; 
    		padding: 0px;
			Margin - Border - Padding - Content
		}
		/* The Modal (background) */
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

		/* Modal Content */
		.modal-content {
		    background-color: #fefefe;
		    margin: auto;
		    padding: 20px;
		    border: 1px solid #888;
		    width: 80%;
		}

		/* The Close Button */
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
				<h3>Hi, <?php echo"$userN" ?></h3>
			</div>
			<div class="col-sm-6" id="utilities">
                <!-- Utility Icons Here -->
                <a type="button" href="homePage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
				<a type="button" href="options.php"><img src="img/settings.png" width="40px" alt="Options" title="Options"></a>
				<a type="button" href="homePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
            </div>
        </div>
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
  </body>
</html>