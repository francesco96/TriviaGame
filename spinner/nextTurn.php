<?php
include('../db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sid = $_POST['sid']; //gets the session ID
		$uid = $_SESSION['userId']; // gets the user ID
		$correct = $_POST['correct']; //gets wether the selected answer is correct or not
		$tid = $_POST['tid']; //gets the the other user ID
		$sql = "SELECT * FROM game_session WHERE SESSION_ID='$sid';";
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$numCorrect = $result['NUMBER_CORRECT']; // gets the number of correct answers in a row
		$catId = $_POST['category']; //gets the gategory ID
		$cid= $result['COURSE_ID']; // gets the course ID
		$sql = "SELECT * FROM score WHERE USER_ID = $uid AND SESSION_ID = $sid";
		$result = mysqli_query($conn, $sql);
		$maxTokens = mysqli_num_rows($result);
		$sql = "SELECT * FROM score WHERE score.USER_ID = $uid AND HAS = 1 AND SESSION_ID = $sid";
		$result = mysqli_query($conn, $sql); 
		$tokens = mysqli_num_rows($result);
		$choices = "";
		//Checks to see if the answer is correct or not
		if($correct == 0){ //answer is wrong
			$sql = "UPDATE game_session SET USER_ID_WINNER = ". $tid ." , NUMBER_CORRECT = 0 WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			$numCorrect = 0;
			header("Location: ../gameInfo.php?cid=$cid");
		}else { // answer is correct
			$numCorrect ++;
		}
		//Checks to see how many question in a row have been answered correctly
		if($numCorrect == 4){//you got a token question correct
			$tokens ++;
			//updates the score so that you have the token
			$sql = "UPDATE score SET HAS = 1 WHERE SESSION_ID='$sid' AND CATEGORY_ID = '$catId' AND USER_ID = '$uid'"; 
			mysqli_query($conn, $sql);
			//resets the number correct cout to 0
			$sql = "UPDATE game_session SET NUMBER_CORRECT = 0 WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			if($tokens == $maxTokens){ //checks to see if you have won the game after getting the new token
				$sql = "UPDATE game_session SET IS_ OVER = 0 WHERE SESSION_ID='$sid'";
				mysqli_query($conn, $sql);
				header("Location: ../winner.php?sid=$sid"); // sends you to the winner page
			}else {
				header("Location: index.php?sid=$sid"); // sends you back into the game to play more
			}
		}else if ($numCorrect == 3){//lets you selct the category you want the token form-control
			$sql = "UPDATE game_session SET NUMBER_CORRECT = $numCorrect WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			$sql = "SELECT * FROM categorylist, score WHERE categorylist.COURSE_ID = $cid AND score.USER_ID = $uid AND score.SESSION_ID = $sid AND score.CATEGORY_ID = categorylist.CATEGORY_ID";
			$result = mysqli_query($conn, $sql);
			$i = 1;	
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					if($row['HAS'] == 0){ //displayes all of the categories you havent gotten the token for
						$choices .= "<button type='button' class='form-control modal-body-answer-button' id='$i' value='". $row['CATEGORY_ID'] ."'onClick='getQuestion(this.id)'>". $row['CATEGORY_NAME'] ."</button><br/>";
					}
					$i++;
				}
			}
			//creates the modal
			$modal = "<div class='modal fade' id='myModal' role='dialog' value='Pick a category'>
						<div class='modal-dialog'>
							<div class='modal-content'>
								<div class='modal-header' id='modal-header-color' style='background-color: Blue;'>
									<p class='modal-title' id='modal-header-category'>Please Pick A Category To Go For</p>
								</div>
								<div style='clear: both;'></div>
								<div class='modal-body'>
									<br/>
									<div id='modal-body-answers'>$choices</div>
								</div>
								<div class='modal-footer'></div>
							</div>
						</div>
					</div>";
			echo ($modal);
		
		}else if($numCorrect >= 0){//increases the number of correct in the database
			$sql = "UPDATE game_session SET NUMBER_CORRECT = $numCorrect WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
		}
} 

?>
