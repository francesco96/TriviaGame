<?php
	
    switch($_POST['action']){
        case 'getQuestion':
            getQuestion();
            break;
        case 'getAnswer':
            getAnswer();
            break;
    }
    function getQuestion(){
		
		require('../db.php');
        $courseid = $_POST['courseid'];
        $category = $_POST['category'];		
		
        $question = $conn->query("SELECT question.QUESTION_ID, question.QUESTION_TEXT FROM question WHERE question.CATEGORY_ID=$category AND question.COURSE_ID=$courseid ORDER BY RAND() LIMIT 1");
        $question = $question->fetch_assoc();

		
        $color = "Red";
        $questionText = $question['QUESTION_TEXT'];
        $questionid = $question['QUESTION_ID'];


        $answersinfo = $conn->query("SELECT answer.ANSWER_ID, answer.ANSWER_TEXT FROM answer WHERE answer.QUESTION_ID = $questionid ORDER BY RAND()");
        $answers = "";

        for ($i = 0; $i < $answersinfo->num_rows; $i++){
            $answersinfo->data_seek($i);
            $answertext = $answersinfo->fetch_assoc();

            $answerid = $answertext['ANSWER_ID'];
            $answertext = $answertext['ANSWER_TEXT'];
            $answers .= "<button type='button' class='form-control modal-body-answer-button' value='$answerid'>$answertext</button><br/>";
        }

//echo json_encode();
	//die();

        $modal = "<div class='modal fade' id='myModal' role='dialog' value='".$questionid."'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header' id='modal-header-color' style='background-color: $color;'>
                                <p class='modal-title' id='modal-header-category'>$category ".$_POST['category']."</p>
                                <p id='modal-header-timer'>30</p>
                            </div>
                        <div style='clear: both;'></div>
                        <div class='modal-body'>
        	                <div id='modal-body-question-frame'>
          		                <p id='modal-body-question'>$questionText</p>
          		                <p id='modal-body-result'></p>
          	                </div>
                        <div id='modal-body-answers'>$answers</div>
                    </div>
                    <div class='modal-footer'>
                    </div>
                </div>

                </div>
                </div>";
		
        //echo json_encode($modal);
		echo ($modal);
		$conn->close();
    }

    function getAnswer(){
		require('../db.php');
        $questionid = $_POST['questionid'];
        $answerid = $_POST['answerid'];

        $checkanswer = $conn->query("SELECT answer.ANSWER_CORRECT FROM answer WHERE answer.QUESTION_ID=$questionid AND ANSWER_ID=$answerid");
        $checkanswer = $checkanswer->fetch_assoc();

        echo json_encode($checkanswer['ANSWER_CORRECT']);
		$conn->close();
    }

    
?>
