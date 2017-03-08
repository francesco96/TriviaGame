<?php
	//page title
	$title = 'ManageCourse';
	// Manage Course Page
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  	<style>
  		@font-face { font-family: CartoonRelief; src: url('CartoonRelief.ttf'); }
		
		div h1 { font-family: CartoonRelief; text-shadow:1px 1px black }
		
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
						<form>
							<div class="form-group">
								<label for="exampleInputEmail1">Course Name</label>
								<input type="email" class="form-control" id="CourseName" placeholder="Math101"> <!-- dynamically change of the course-->
							</div>
							<div class="form-group">
								<label for="exampleInputPassword1">Questions</label>
								<p><u>Is Climate Change a hoax?<br>
									  Does looking at a picture of the sun hurt your eyes?</u></p>
							</div>
							<div class="col-sm-6 text-center" id="currentUser">
							<a type="button" id="myBtn" class="btn btn-success">+ Add Question</a>
							<!-- The Modal -->
							<div id="myModal" class="modal">

							  <!-- Modal content WHEN PRESSING BUTTON -->
							  <div class="modal-content">
							    <span class="close">&times;</span>
							    <h3 align="center">Adding a New Question<br></h3>
							    <p>
							    <div class="form-group">
								<label for="exampleInputEmail1">Question:</label>
								<input type="text" class="form-control" id="Question" placeholder="Question">
								</div>
								<!-- Answer -->
								<div class="form-group">
								<label for="exampleInputEmail1">Answer:</label>
								<input type="text" class="form-control" id="Answer" placeholder="Answer">
								</div>
								<!-- Option 2 -->
								<div class="form-group">
								<label for="exampleInputEmail1">Option 2:</label>
								<input type="text" class="form-control" id="Option2" placeholder="Option 2">
								</div>
								<!-- Option 3 -->
								<div class="form-group">
								<label for="exampleInputEmail1">Option 3:</label>
								<input type="text" class="form-control" id="Option 3" placeholder="Option 3">
								</div>
							    </p>
							    <a type="button" id="myBtn" href="ManageCourse.php"class="btn btn-success">Add Question</a>
							  </div>

							</div>
						</div>
						</form>
						<a type="button" href="homePage.php" class="btn btn-success">Submit</a>
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

