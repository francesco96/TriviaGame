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
        $conn = new mysqli('localhost', 'johnanthonyelett', '', 'triviacrack');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $courseid = $_POST['courseid'];
        $category = $_POST['category'];
        $colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#f39c12", "#d35400", "#c0392b", "#bdc3c7"];
        
        $question = $conn->query("SELECT question.QUESTION_ID, question.QUESTION_TEXT FROM question WHERE question.CATEGORY_ID=$category AND question.COURSE_ID=$courseid ORDER BY RAND() LIMIT 1");
        $question = $question->fetch_assoc();
        
        $color = $colors[$_POST['category']-1];
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
        
        /*for($i = 0; $i < 4; $i++){
            $answers .= "<button type='button' class='form-control modal-body-answer-button' value='$i'>Answer $i</button><br/>";
        }*/
        
        $modal = "<div class='modal fade' id='myModal' role='dialog' value='".$question['QUESTION_ID']."'>
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
        	            Possible ad content here
                    </div>
                </div>
      
                </div>
                </div>";
        echo json_encode($modal);
    }
    
    function getAnswer(){
        $questionid = $_POST['questionid'];
        $answerid = $_POST['answerid'];
        
        $conn = new mysqli('localhost', 'johnanthonyelett', '', 'triviacrack');
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $checkanswer = $conn->query("SELECT answer.ANSWER_CORRECT FROM answer WHERE answer.QUESTION_ID=$questionid AND ANSWER_ID=$answerid");
        $checkanswer = $checkanswer->fetch_assoc();
        $conn->close();
        
        echo json_encode($checkanswer['ANSWER_CORRECT']);
    }
?>