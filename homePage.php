<?php
	//page title
	include('db.php');
	$title = 'HomePage';
	$userN = $_SESSION['username'];
	$userRole = $_SESSION['role'];
	$userID = $_SESSION['userId'];
	//Landing page
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Login/Register</title>


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
                <img src="img/profile.png" width="40px" alt="Profile" title="Profile">
               <!--  <img src="img/settings.png" width="40px" alt="Settings" title="Settings"> -->
            </div>
        </div>
		<div class="page-header text-center" id="pg_header">
			<h1>Marist Fox Trivia</h1>
		</div>
		<div class="row">
		<?php
                            $sql = "SELECT * FROM triviacrack.course;";
							$result = mysqli_query($conn, $sql);
							$numberOfGames = mysqli_num_rows($result);
							$gamePics = ['img/marist_pic3.jpg', 'img/marist_pic2.jpg', 'img/marist_pic.jpg'];
                            if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									echo "
									<div class='col-sm-6 col-md-3'>
										<div class='thumbnail'>
										<img src= 'img/marist_pic3.jpg'>
											<div class='caption'>
												<h3>".$row['TITLE']."</h3>
												<p>".$row['DESCRIPTION']."</p>
												<p><div class='col-sm-3'>
													<a href='GamePage.php?courseid=".$row['COURSE_ID']."' class='btn btn-success' role='button'>Play</a>
												</div>";
											if($userRole < 1){											
												echo"
												<div class='col-sm-3'>
													<a href='ManageCourse.php?cid=".$row['COURSE_ID']."' class='btn btn-primary' role='button'>Edit</a>
												</div>
												<div class='col-sm-3'>
													<form action='deleteCourse.php' method='POST'>
													<input type='hidden' name='cid' value='".$row['COURSE_ID']."'>
													<input type='submit' id='delete' value='Delete'>
													</form>
												</div>
												</p>
												<br>
												";
											}
											echo"
											</div>
										</div>
									</div>";	
								}
							}
        
		if($userRole < 1){
			echo"
			<div class='col-sm-6 col-md-3'>
				<div class='thumbnail'>
					<a type='button' href='addCourse.php'><img src='img/plusSign.jpg' width='500px' alt='addGame' title='addGame'></a>
					<!--<img src='img/plusSign.jpg'>-->
					<div class='caption'>
						<h3>Add a Game</h3>
					</div>
				</div>
			</div>";
		}
		?>
		</div>
	</div>    

  </body>
</html>