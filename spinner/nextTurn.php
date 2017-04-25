<?php
include('../db.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
		$sid = $_POST['sid'];
		$uid = $_SESSION['userId'];
		$correct = $_POST['correct'];
		$tid = $_POST['tid'];
		$sql = "SELECT * FROM game_session WHERE SESSION_ID='$sid';";
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_assoc($result);
		$numCorrect = $result['NUMBER_CORRECT'];
		$catId = $_POST['category'];
		//$numCorrect ++;
		$cid= $result['COURSE_ID'];
		$choices = "";
		if($correct == 0){
			$sql = "UPDATE game_session SET USER_ID_WINNER = ". $tid ." AND NUMBER_CORRECT = 0 WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			$numCorrect = 0;
			header("Location: ../gameInfo.php?cid=$cid");
		}else {
			$numCorrect ++;
		}
		if($numCorrect == 4){
			$sql = "UPDATE score SET HAS = 1 WHERE SESSION_ID='$sid' AND CATEGORY_ID = '$catId' AND USER_ID = '$uid'";
			mysqli_query($conn, $sql);
			//$sql = "UPDATE game_session SET NUMBER_CORRECT = $numCorrect WHERE SESSION_ID='$sid'";
			//mysqli_query($conn, $sql);
			$sql = "UPDATE game_session SET NUMBER_CORRECT = 0 WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			$sql = "UPDATE game_session SET USER_ID_WINNER = $tid WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			header("Location: ../gameInfo.php?cid=$cid");
			
		}else if ($numCorrect == 3){
			$sql = "UPDATE game_session SET NUMBER_CORRECT = $numCorrect WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			$sql = "SELECT * FROM categorylist WHERE COURSE_ID = $cid";
			$result = mysqli_query($conn, $sql);
			$i = 0;	
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$choices .= "<button type='button' class='form-control modal-body-answer-button' id='$i' value='". $row['CATEGORY_ID'] ."'>". $row['CATEGORY_NAME'] ."</button><br/>";
					$i ++;
				}
			}
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
						<div class='modal-footer'>
						</div>
					</div>
	
					</div>
					</div>";
			echo ($modal);
		
		}else if($numCorrect >= 0){
			$sql = "UPDATE game_session SET NUMBER_CORRECT = $numCorrect WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			//header("Location: index.php?sid=$sid");
		}
} 

?>
