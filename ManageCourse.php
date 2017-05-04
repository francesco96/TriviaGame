<?php
	//page title
	$title = 'ManageCourse';
	include('db.php');
	$cid = $_GET ["cid"];
	// Manage Course
	//session_start();
	$userN = $_SESSION['username'];
	$userRole = $_SESSION['role'];
	$userID = $_SESSION['userId'];
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$errors = array();
		$q = $_POST['Question'];
		$category = $_POST['Category'];
		$sql = "SELECT * FROM categorylist WHERE CATEGORY_NAME = '$category' AND COURSE_ID = $cid;";
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$category = $result['CATEGORY_ID'];
		$a = $_POST['Answer'];
		$o2 = $_POST['Option_2'];
		$o3 = $_POST['Option_3'];
		$o4 = $_POST['Option_4'];
		$sql = "";
		if($q){
			if($category){
				$sql = "INSERT INTO triviacrack.question (QUESTION_TEXT, QUESTION_CORRECT, TIMES_ASKED, CATEGORY_ID, COURSE_ID) VALUES ('$q', '0', '0', '$category', '$cid')";
				mysqli_query($conn, $sql);
				$sql ="";
				$q_id = $conn->insert_id;
				if($a){
					$sql .= "INSERT INTO triviacrack.answer (QUESTION_ID, ANSWER_CORRECT, ANSWER_TEXT, TIMES_PICKED) VALUES ('$q_id', '1', '$a', '$cid')";
				}else {
					$errors[] ='Enter in a correct answer!';
				}
				if($o2){
					$sql .= ",('$q_id', '0', '$o2', '$cid')";
				}else {
					$errors[] ='Enter 3 options!';
				}
				if($o3){
					$sql .= ",('$q_id', '0', '$o3', '$cid')";
				}else {
					$errors[] ='Enter 3 options!';
				}
				if($o4){
					$sql .= ",('$q_id', '0', '$o4', '$cid')";
				}else {
					$errors[] ='Enter 3 options!';
				}
				if(empty($errors)){
					mysqli_query($conn, $sql);
				}else{
				}
			}else {
				$errors[] = 'Enter a category';
			}
		}else {
				$errors[] ='Enter in a question!';
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
    <title>Manage Course</title>


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
				<a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
				<a type="button" href="options.php"><img src="img/settings.png" width="40px" alt="Options" title="Options"></a>

            </div>
        </div>
		<div class="page-header text-center" id="pg_header">
			<h1>Manage Course<br /></h1>
		</div>
		<div class="row">
			<div class="well well-lg">
					<div class="col-sm-12 text-center">
							<h2>Course Name: <?php
								$sql = "Select *
									From triviacrack.course
									WHERE COURSE_ID = '$cid'
									";
								$result = mysqli_query($conn, $sql);
								$result = mysqli_fetch_assoc($result);
								$courseName = ($result['TITLE']);
								$description = ($result['DESCRIPTION']);
								echo"$courseName";
							?></h2>
							<h4><?php echo"$description" ?></h4>
					</div>
				<div class="col-sm-12 text-center">
							<a type="button" id="myBtn" class="btn btn-success">+ Add Question</a>
							<a type="button" class="btn btn-success" href="<?php echo"setCategory.php?cid=$cid" ?>">+ Add Category</a>
							<a type="button" id="editName" href="<?php echo"editCourse.php?cid=$cid"; ?>" class="btn btn-success">Edit: Name, Description</a>
							<a type="button" id="Edit Students" href="<?php echo"editStudents.php?cid=$cid"; ?>" class="btn btn-success"> Edit Students </a>
				</div>
				<br>
				<table class="table-striped" width="100%">
					<tr>
						<th>Questions</th>
						<th>Category</th>
						<th>Answer</th>
						<th>Delete</th>
					</tr>
					<form action='' method='post'>
					<?php
								$sql = "SELECT * FROM question, answer, categorylist WHERE question.COURSE_ID = $cid AND question.CATEGORY_ID = categorylist.CATEGORY_ID AND question.QUESTION_ID = answer.QUESTION_ID AND answer.ANSWER_CORRECT = 1";
								$result = mysqli_query($conn, $sql);
								$count = 1;
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										echo"
										<tr>
											<td>$count. $row[QUESTION_TEXT]</td>
											<td>$row[CATEGORY_NAME]</td>
											<td>$row[ANSWER_TEXT]</td>
											<td align='center'>
											<form action='deleteQuestion.php' method='POST'>
											<input type='hidden' name='qid' value='$row[QUESTION_ID]'>
											<input type='hidden' name='cid' value='$cid'>
											<input type='submit' id='delete' value='Delete'>
											</form>
											</td>
										</tr>
										";
										$count += 1;
									}
								}
					?>
					</form>
				</table>
				<br>
							<div class="col-sm-6 text-center">
								<!-- The Modal -->
								<div id="myModal" class="modal">
									<!-- Modal content WHEN PRESSING BUTTON -->
									<div class="modal-content">
										<span class="close">&times;</span>
										<h3 align="center">Adding a New Question<br></h3>
										<p>
											<form action= "<?php echo "ManageCourse.php?cid=$cid"; ?>"  method="post">
											<p>
											<div class="col-sm-2 text-center">
												<label>Question:</label>
											</div>
											<div class="col-sm-10 text-center">
												<input type='text' class='form-control' name="Question" placeholder='Question' required oninvalid="this.setCustomValidity('Please Enter a Question!')" oninput="setCustomValidity('')">
											</div>
											</p>
											<br>
											<br>
											<p>
											<div class="col-sm-2 text-center">
												<label>Category:</label>
											</div>
											<div class="col-sm-10 text-center">
												<select class="form-control" id="Category" name="Category" required oninvalid="this.setCustomValidity('Please Select a Category!') " oninput="setCustomValidity('')">
													<option disabled="" selected="" value=""> -- select an category -- </option>
													<?php
														$sql = "SELECT categorylist.CATEGORY_NAME FROM categorylist WHERE categorylist.COURSE_ID = $cid";
														$result = mysqli_query($conn, $sql);
														if (mysqli_num_rows($result) > 0) {
															while($row = mysqli_fetch_assoc($result)) {
																echo"
																<option>$row[CATEGORY_NAME]</option>
																";
																$count += 1;
															}
														}
													?>
												</select>
											</div>
											</p>
											<br>
											<br>
										<!-- Answer -->
											<p>
											<div class="col-sm-2 text-center">
												<label>Answer:</label>
											</div>
											<div class="col-sm-10 text-center">
												<input type="text" class="form-control" name="Answer" placeholder="Answer" required oninvalid="this.setCustomValidity('Please Enter an Answer')" oninput="setCustomValidity('')">
											</div>
											</p>
											<br>
											<br>
										<!-- Option 2 -->
											<p>
											<div class="col-sm-2 text-center">
												<label>Option 2:</label>
											</div>
											<div class="col-sm-10 text-center">
												<input type="text" class="form-control" name="Option_2" placeholder="Option 2" required oninvalid="this.setCustomValidity('Please Enter an Option')" oninput="setCustomValidity('')">
											</div>
											</p>
											<br>
											<br>
										<!-- Option 3 -->
											<p>
											<div class="col-sm-2 text-center">
												<label>Option 3:</label>
											</div>
											<div class="col-sm-10 text-center">
												<input type="text" class="form-control" name="Option_3" placeholder="Option 3" required oninvalid="this.setCustomValidity('Please Enter an Option')" oninput="setCustomValidity('')">
											</div>
											</p>
											<br>
											<br>
										<!-- Option 4 -->
											<p>
											<div class="col-sm-2 text-center">
												<label>Option 4:</label>
											</div>
											<div class="col-sm-10 text-center">
												<input type="text" class="form-control" name="Option_4" placeholder="Option 4" required oninvalid="this.setCustomValidity('Please Enter an Option')" oninput="setCustomValidity('')">
											</div>
											</p>
											<br>
											<br>
												<input type="submit" value="Add Question">
											</form>
										</p>
									</div>
								</div>
							</div>
						<div class="col-sm-12" align="center">
						<?php						
						if(6 > 5){ //checks to see if there is a question for each category
							echo"
								<p>Please Put Atleast One Question For Ever Category</p>
							";
						}else {
						echo "
						<a type='button' href='homePage.php' class='btn btn-primary'>Done</a>
						";
						}
						?>
						</div>
						</br>
			</div>
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
