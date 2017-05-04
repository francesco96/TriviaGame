<?php
	//page title
	$title = 'ManageCourse';
	include('db.php');
	//session_start()
	$userN = $_SESSION['username'];
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
                    <form action='reportcard.php' method='POST'>
                    <input type='hidden' name='uid' value='$row[USER_ID]'>
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
		<div class="row">
            <div class="col-sm-6" id="currentUser">
				<h3></h3>
			</div>
			<div class="col-sm-6" id="utilities">
                <!-- Utility Icons Here -->
                <a type="button" href="homePage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
				<a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
				<a type="button" href="options.php"><img src="img/settings.png" width="40px" alt="Options" title="Options"></a>

            </div>
        </div>
		<div class="page-header text-center" id="pg_header">
			<h1>Students</h1>
		</div>
		<div class="row">
			<div class="well well-lg">
						<br>
						<form>
							<table>
							  <tr>
									<!-- select COURSE_NAME, FROM triviacrack.course WHERE USER_ID = -->
                  <th width="90px">Class</th>
							    <th width="110px">Games Played</th> <!-- -->
							    <th width="90px">Win Rate</th>
							  </tr>
							  <tr align="center">
							    <td>PHY 101</td>
							    <td>30</td>
							    <td>72%</td>
							  </tr>
							  <tr align="center">
							    <td>CMPT 308</td>
							    <td>20</td>
							    <td>89%</td>
							  </tr>
							  <tr align="center">
							    <td>PHIL 200</td>
							    <td>15</td>
							    <td>68%</td>
							  </tr>
                <tr align="center">
							    <td>PHIL 200</td>
							    <td>15</td>
							    <td>68%</td>
							  </tr>
							  </tr>
							</table>

							<div id="myModal" class="modal">
						</form>

						</div>
					</div>
		</div>
	</div>

  </body>
</html>
