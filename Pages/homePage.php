<?php
	//page title
	$title = 'HomePage';
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
				<h3>Hi, Blades</h3>
			</div>
			<div class="col-sm-6" id="utilities">
                <!-- Utility Icons Here -->
                <a type="button" href="loginPage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
                <img src="img/profile.png" width="40px" alt="Profile" title="Profile">
                <img src="img/settings.png" width="40px" alt="Settings" title="Settings">
            </div>
        </div>
		<div class="page-header text-center" id="pg_header">
			<h1><font face="Comic sans MS" color="black">Marist Fox Trivia</font><br /></h1>
		</div>
		<div class="row">
		<?php
                                $numberOfGames = 6;
                                //$categories = ["Social Studies", "Science", "Math", "English", "PhysEd", "Health", "Art", "Music", "Business", "Computers"];
                                //$colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#f39c12", "#d35400", "#c0392b", "#bdc3c7"];
                                //$apothem = 250;
                                //$base = (2 * $apothem) * tan(deg2rad(180 / $numberOfCategories));
                                //$borderWidth = "border-width:" . $apothem . "px " . ($base / 2) . "px 0 " . ($base / 2) . "px;";
                                //$transformOrigin = "transform-origin: " . ($base / 2) . "px " . $apothem . "px;";
                                //$marginLeft = "margin-left: " . (250 - ($base / 2)) . "px;";

                                for ($i = 0; $i < $numberOfGames; $i++) {
	                                echo "<div class='col-sm-6 col-md-3'>
											<div class='thumbnail'>
												<img src='img/marist_pic3.jpg'>
												<div class='caption'>
													<h3>Math</h3>
													<p>Quick description of the game</p>
													<p><a href='#' class='btn btn-primary' role='button'>Play</a></p>
												</div>
											</div>
										</div>";
								}
        ?>
		</div>
	</div>    

  </body>
</html>