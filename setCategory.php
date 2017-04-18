<?php
	//page title
	include('db.php');
	$numCat = 0;
	$title = 'LoginPage';
	$cid = $_GET ["cid"];
	//Landing page
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['category'])) {
        $catName = $_POST['category'];
        $sql = "INSERT INTO triviacrack.categoryList (COURSE_ID, CATEGORY_NAME) VALUES ('$cid', '$catName')";
		$result = mysqli_query($conn, $sql);
    }    
}	
?>
<!DOCTYPE html>
<html lang="en">
  <head>  
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
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
						<h2>Categories</h2>
						<br>
						<table>
						<?php
						$sql = "SELECT * FROM triviacrack.categoryList WHERE COURSE_ID = $cid;";
							$result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									$numCat +=1;
								echo "
									<tr>
										<td>".$row['CATEGORY_NAME']."</td>
										<td align='center'>
										<form action='deleteCat.php' method='POST'>
										<input type='hidden' name='cat_id' value='$row[CATEGORY_ID]'>
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
						<form action="setCategory.php?cid=<?php echo"$cid" ?>" method="POST">
							<label>New Category:</label>
							<div class="row">
								<div class="col-sm-10 text-center">
									<input type="text" class="form-control" name="category" placeholder="Category" required>
								</div>
								<div class="col-sm-2">
									<input type="submit" value="Create">
								</div>
							</div>
						</form>
						<br>
						<!-- <form action="catChaeck.php" method="POST">
						<input type="hidden" value="<?php echo"$numCat"; ?>" name="numcat">
						<input type="submit" value="Done">
						</form> -->
						<?php echo"<a href='ManageCourse.php?cid=".$cid."' class='btn btn-primary' role='button'>Done</a>"; ?>
					</div>
				</div>
	</div>    

  </body>
</html>