<?php
	//page title
	$title = 'ManageCourse';
	include('db.php');
	$userN = $_SESSION['username']; // Gets the username
	$uid = $_SESSION['userId']; // Gets the userID
	if(isset($_POST['passwordReset'])){
		$uinfo = $conn->query("SELECT USER_PASSWORD FROM USER WHERE USER_ID=$uid");
		$uinfo = $uinfo->fetch_assoc();
		$passwordSuccess = false;
		if(password_verify($_POST['currentPassword'], $uinfo['USER_PASSWORD'])){
			$passwordSuccess = true;
			$newPassword = password_hash($_POST["newPassword"], PASSWORD_DEFAULT);
			$conn->query("UPDATE USER SET USER_PASSWORD = '$newPassword' WHERE USER_ID=$uid");
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
    <title>Profile Page</title>


	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style/general.css" rel="stylesheet" type="text/css">


  </head>
  <body>
	<div class="container">
		<div class="row">
            <div class="col-sm-6" id="currentUser">
				<h3></h3>
			</div>
			<div class="col-sm-6" id="utilities">
                <!-- Utility Icons Here -->
                <a type="button" href="homePage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
				<a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
				<a type="button" href="help.php"><img src="img/help.png" width="40px" alt="Help" title="Help"></a>

            </div>
        </div>
		<div class="page-header text-center" id="pg_header">
			<h1><?php echo"$userN" ?>'s profile</h1>
		</div>
		<div class="row">
			<div class="well well-lg">
				<?php
					if(isset($_POST['passwordReset']) && $passwordSuccess == true){
						echo "<div class='alert alert-success'><strong>Success!</strong> Your password has been reset.</div>";
					}else if(isset($_POST['passwordReset']) && $passwordSuccess == false){
						echo "<div class='alert alert-danger'><strong>Sorry,</strong> you entered the wrong password.</div>";
					}
				 ?>
				<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#passwordModal">Reset Your Password</button>
				<a href="logout.php"><button type="button" class="btn btn-success">Logout</button></a>
						<br>
							<table>
							  <tr>
									<!-- select COURSE_NAME, FROM triviacrack.course WHERE USER_ID = -->
							    <th width="90px">Class</th>
							    <th width="110px">Games Played</th> <!-- -->
							    <th width="90px">Win Rate</th>
							    <th width="90px">In Class</th>
							    <th width="150px">On-Going Games</th>
							  </tr>
								<?php
									$conn->query("SET @user_id = ".$_SESSION['userId'].";");
									$profileInfo = $conn->query("SELECT COURSE.TITLE, COUNT(GAME_SESSION.SESSION_ID) AS GAMES_PLAYED, (COUNT(CASE GAME_SESSION.USER_ID_WINNER WHEN @user_id THEN 1 ELSE NULL END)/COUNT(GAME_SESSION.SESSION_ID))*100 AS WIN_RATE, (SELECT CASE WHEN TAKES.USER_ID IS NOT NULL THEN 'YES' ELSE 'NO' END FROM TAKES WHERE COURSE.COURSE_ID = TAKES.COURSE_ID AND TAKES.USER_ID=@user_id) AS TAKES, COUNT(CASE GAME_SESSION.IS_OVER WHEN 1 THEN 1 ELSE NULL END) AS ONGOING_GAMES FROM COURSE JOIN GAME_SESSION ON COURSE.COURSE_ID = GAME_SESSION.COURSE_ID WHERE GAME_SESSION.USER_ID_1 = @user_id OR GAME_SESSION.USER_ID_2 = @user_id GROUP BY COURSE.COURSE_ID;");

									for($i = 0; $i < $profileInfo->num_rows; $i++){
										$profileInfo->data_seek($i);
										$info = $profileInfo->fetch_assoc();
										echo "<tr align='center'>";
										echo "<td>".$info['TITLE']."</td>";
										echo "<td>".$info['GAMES_PLAYED']."</td>";
										echo "<td>".$info['WIN_RATE']."<span style='font-family: arial;'>%</span></td>";
										echo "<td>".$info['TAKES']."</td>";
										echo "<td>".$info['ONGOING_GAMES']."</td>";
										echo "</tr>";
									}
								?>
							</tr>
							</table>

							<div class="modal fade" id="passwordModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Reset Your Password</h4>
        </div>
        <div class="modal-body">
          <form action="ProfilePage.php" method="post">
						<div class="form-group">
							<label for="currentPassword">Your Current Password</label>
							<input class="form-control" type="password" name="currentPassword" placeholder="Current Password">
						</div>
						<div>
							<label for="newPassword">Your New Password</label>
							<input class="form-control" type="password" name="newPassword" placeholder="New Password">
						</div>
						<div class="form-group">

						</div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-default" name="passwordReset">Save</button>
        </div>
				</form>
      </div>

    </div>
  </div>
					</div>
		</div>
	</div>
	<?php include 'footer.php'; ?>
  </body>
</html>
