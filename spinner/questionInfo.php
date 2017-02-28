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
        
        $categories = ["Social Studies", "Science", "Math", "English", "PhysEd", "Health", "Art", "Music", "Business", "Computers"];
        $colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#f39c12", "#d35400", "#c0392b", "#bdc3c7"];
        
        $color = $colors[$_POST['category']-1];
        $categoryName = $categories[$_POST['category']-1];
        $questionText = "How many times have I tested this question thing? I don't know";
        $answers = "";
        
        for($i = 0; $i < 4; $i++){
            $answers .= "<button type='button' class='form-control modal-body-answer-button' value='$i'>Answer $i</button><br/>";
        }
        
        $modal = "<div class='modal fade' id='myModal' role='dialog'>
                    <div class='modal-dialog'>
                        <div class='modal-content'>
                            <div class='modal-header' id='modal-header-color' style='background-color: $color;'>
                                <p class='modal-title' id='modal-header-category'>$categoryName ".$_POST['category']."</p>
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
        echo json_encode(1);
    }
?>