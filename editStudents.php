<!-- 
Marist College - Copyright
Marist Fox Trivia
==========================
Matthew Blades
JohnAnthony Eletto
Francesco Galletti
Peter Sofronas
==========================

editStudents is a page where the authorized user
can edit a specific student and his/her access to pages.
-->

<?php
	include('db.php'); // Connects to the db
	$numCat = 0; // Keeps track of the category Number
	$title = 'Edit Students'; // Title of the page
	$cid = $_GET ["cid"]; //Get CourseID from the db	
?>
<!-- START HTML CODE -->
<!DOCTYPE html>
<html lang="en">
  <head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Set Category</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style/general.css" rel="stylesheet" type="text/css">
  </head>

  <body>	
	<div class="container">
		<div class="page-header text-center" id="pg_header">
			<h1>Set Categories</font><br /></h1>
		</div>

			<div class="row">
			<div class="col-sm-3">
			</div>

				<div class="col-sm-6 text-center" id="logging_in">
					<div class="well well-lg">
						<h2>Students</h2>
						<br>
						<table>

						<?php
						$sql = "SELECT * FROM triviacrack.takes, triviacrack.user WHERE takes.COURSE_ID = $cid AND takes.USER_ID = user.USER_ID;";
							$result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
								echo "
									<tr>
										<td>".$row['USER_NAME']."</td>
										<td align='center'>
										<form action='deleteStudents.php' method='POST'>
										<input type='hidden' name='uid' value='$row[USER_ID]'>
										<input type='hidden' name='cid' value='$cid'>
										<input type='submit' id='delete' value='Delete'>
										</form>
										</td>
									</tr>
								";
								}
							}
						?>

						</table>

						<form action="editStudents.php?cid=<?php echo"$cid" ?>" method="POST">
							<label>New Student:</label>
							<div class="row">
								<div class="col-sm-10 text-center">
									<input type="text" class="form-control" name="sSearch" placeholder="Search" required>
								</div>
								<div class="col-sm-2">
									<input type="submit" value="Search">
								</div>
							</div>
						</form>

						<?php
						if ($_SERVER['REQUEST_METHOD'] == 'POST') {
							if(isset($_POST['sSearch'])) {
								$studentName = $_POST['sSearch'];
								$sql = "SELECT * FROM  triviacrack.user WHERE USER_NAME LIKE '$studentName'";
								$result = mysqli_query($conn, $sql);
								if (mysqli_num_rows($result) > 0) {
									while($row = mysqli_fetch_assoc($result)) {
										echo"
										<table>
										<tr>
											<td>$row[USER_NAME]</td>
											<td align='center'>
											<form action='addStudents.php' method='POST'>
											<input type='hidden' name='uid' value='$row[USER_ID]'>
											<input type='hidden' name='cid' value='$cid'>
											<input type='submit' id='add' value='Add'>
											</form>
											</td>
										</tr>
										</table>
										";
									}
								}

							}
						}
						?>
						
						<br>
						<?php echo"<a href='ManageCourse.php?cid=".$cid."' class='btn btn-primary' role='button'>Done</a>"; ?>
					</div>
				</div>
	</div>    
	<?php include( 'footer.php' ); ?>
  </body>
</html>