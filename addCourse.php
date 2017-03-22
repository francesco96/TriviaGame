<?php
	//page title
	$title = 'addCourse';
	include('db.php');
	// Manage Course	
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
			header("Location:ManageCourse.php?cid=$cid");
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
				<h3>Hi, Blades</h3>
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
					<form action= "<?php echo "addCourse.php"; ?>"  method="post">
						<div class="form-group">
							<label for="exampleInputEmail1">Course Name</label>
							<input type='text' class='form-control' name='CourseName' placeholder="Course Name">
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Description</label>
							<textarea rows ="5" width="%100" name='description' placeholder="Description"> </textarea>
						</div>
						<div class="col-sm-6 text-center">
							<input type="submit" value="Add Course" href="homePage.php">
						</div>
						<div class="col-sm-6 text-center">
							<a type="button" href="homePage.php" class="btn btn-danger">Cancel</a>
						</div>
					</form>
					<br>
			</div>
		</div>
	</div>    

	<script>
	// Get the modal
	var modal = document.getElementById('myModal');

	// Get the button that opens the modal
	var btn = document.getElementById("myBtn");

	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName("close")[0];
	
	// When the user clicks the button, open the modal 
	btn.onclick = function() {
	    modal.style.display = "block";
	}

	// When the user clicks on <span> (x), close the modal
	span.onclick = function() {
	    modal.style.display = "none";
	}

	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}
	</script>

  </body>
</html>