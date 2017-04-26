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
		$sql = "SELECT * FROM score WHERE USER_ID = $uid AND SESSION_ID = $sid";
		$result = mysqli_query($conn, $sql);
		$maxTokens = mysqli_num_rows($result);
		$sql = "SELECT * FROM score WHERE score.USER_ID = $uid AND HAS = 1 AND SESSION_ID = $sid";
		$result = mysqli_query($conn, $sql);
		$tokens = mysqli_num_rows($result);
		$choices = "";
		if($correct == 0){
			$sql = "UPDATE game_session SET USER_ID_WINNER = ". $tid ." , NUMBER_CORRECT = 0 WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			$numCorrect = 0;
			header("Location: ../gameInfo.php?cid=$cid");
		}else {
			$numCorrect ++;
		}
		if($numCorrect == 4){
			$tokens ++;
			$sql = "UPDATE score SET HAS = 1 WHERE SESSION_ID='$sid' AND CATEGORY_ID = '$catId' AND USER_ID = '$uid'";
			echo $sql;
			mysqli_query($conn, $sql);
			//$sql = "UPDATE game_session SET NUMBER_CORRECT = $numCorrect WHERE SESSION_ID='$sid'";
			//mysqli_query($conn, $sql);
			$sql = "UPDATE game_session SET NUMBER_CORRECT = 0 WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			if($tokens == $maxTokens){
				$sql = "UPDATE game_session SET IS_OVER = 0 WHERE SESSION_ID='$sid'";
				mysqli_query($conn, $sql);
				header("Location: ../winner.php");
			mysqli_query($conn, $sql);
			}else {
				$sql = "UPDATE game_session SET USER_ID_WINNER = ". $tid ." WHERE SESSION_ID='$sid'";
				mysqli_query($conn, $sql);
				header("Location: index.php?sid=$sid");
			}
			
		}else if ($numCorrect == 3){
			$sql = "UPDATE game_session SET NUMBER_CORRECT = $numCorrect WHERE SESSION_ID='$sid'";
			mysqli_query($conn, $sql);
			$sql = "SELECT * FROM categorylist, score WHERE categorylist.COURSE_ID = $cid AND score.USER_ID = $uid AND score.HAS = 0 AND score.SESSION_ID = $sid AND score.CATEGORY_ID = categorylist.CATEGORY_ID";
			$result = mysqli_query($conn, $sql);
			$i = 1;	
			if (mysqli_num_rows($result) > 0) {
				while($row = mysqli_fetch_assoc($result)) {
					$choices .= "<button type='button' class='form-control modal-body-answer-button' id='$i' value='". $row['CATEGORY_ID'] ."'>". $row['CATEGORY_NAME'] ."</button><br/>";
					$i++;
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
