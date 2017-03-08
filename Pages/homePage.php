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

    <!-- Bootstrap -->
    <link href="lib/bootstrap/css/bootstrap.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="lib/bootstrap/js/bootstrap.min.js"></script>
	<script src="lib/Jquery/jquery-3.1.1.min.js"></script>
	<script href="style/general.css" rel="stylesheet" type="text/css"></script>

	
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  </head>
  <body background ="marist_pic2.jpg">	
	<div class="container">
		<div class="page-header text-center" id="pg_header">
			<h1><font face="Comic sans MS" size="40px" color="black">Marist Fox Trivia</font><br /></h1>
		</div>
		<div class="row">
<<<<<<< HEAD
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="marist_pic3.jpg">
					<div class="caption">
						<h3>Math</h3>
						<p>Quick description of the game</p>
						<p><a href="#" class="btn btn-primary" role="button">Play</a></p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="marist_pic3.jpg">
					<div class="caption">
						<h3>Business</h3>
						<p>Quick description of the game</p>
						<p><a href="#" class="btn btn-primary" role="button">Play</a></p>
					</div>
				</div>
			</div>
			<div class="col-sm-6 col-md-4">
				<div class="thumbnail">
					<img src="marist_pic3.jpg">
					<div class="caption">
						<h3>Science</h3>
						<p>Quick description of the game</p>
						<p><a href="#" class="btn btn-primary" role="button">Play</a></p>
					</div>
				</div>
			</div>
=======
		<?php
                                $numberOfGames = 6;
                                for ($i = 0; $i < $numberOfGames; $i++) {
	                                echo "<div class='col-sm-6 col-md-3'>
											<div class='thumbnail'>
												<img src='img/marist_pic3.jpg'>
												<div class='caption'>
													<h3>Math</h3>
													<p>Quick description of the game</p>
													<p><a href='#' class='btn btn-primary' role='button'>Play</a>
													<a href='#' class='btn btn-default' role='button'>Edit</a></p>
												</div>
											</div>
										</div>";
								}
        ?>
>>>>>>> e4e10477468acbaab50e86e3e5694323fd98f3ac
		</div>
	</div>    

  </body>
</html>