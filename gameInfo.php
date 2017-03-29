<?php
	//page title
	$title = 'ManageCourse';
	include('db.php');
	$cid = $_GET ["cid"];
	// Manage Course
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$errors = array();
		$q = $_POST['Question'];
		$category = $_POST['Category'];
		$a = $_POST['Answer'];
		$o2 = $_POST['Option_2'];
		$o3 = $_POST['Option_3'];
		$o4 = $_POST['Option_4'];
		$sql = "";
		if($q){
			if($category){
				$sql = "INSERT INTO triviacrack.question (QUESTION_TEXT, QUESTION_CORRECT, TIMES_ASKED, CATEGORY, COURSE_ID) VALUES ('$q', '0', '0', '$category', '$cid')";
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
		/* Testing
		a:hover {
   			color: black;
   			border: 1px solid #ffffff;
   			-webkit-transition-duration: 0.2s;
    		transition-duration: 0.2s;
    		padding: 10px;
			Margin - Border - Padding - Content
		}*/
		img:hover {
   			color: black;
   			border: 0.1px solid #e5e5e5;
   			-webkit-transition-duration: 0.2s;
    		transition-duration: 0.2s;
    		padding: 0px;
			Margin - Border - Padding - Content
		}*/
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
    <title>Game Info</title>


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
			<h1><?php
        $sql = "Select *
          From triviacrack.course
          WHERE COURSE_ID = '$cid'
          ";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_assoc($result);
        $courseName = ($result['TITLE']);
        $description = ($result['DESCRIPTION']);
        echo"$courseName";
      ?></h1>
		</div>
		<center><a type="button" href="homepage.php" style = "height:100px;width:300px;font-size:50px"class="btn btn-success">Play</a></center>
    <table>
      <th>Available Games</th>
      <?php
        $sql = "SELECT * FROM triviacrack.question WHERE question.COURSE_ID = $cid";
        $result = mysqli_query($conn, $sql);
        $count = 1;
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
            echo"
            <tr>
              <td>$count. $row[QUESTION_TEXT]</td>
              <td></td>
            </tr>
            ";
            $count += 1;
          }
        }
       ?>
    </table>
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