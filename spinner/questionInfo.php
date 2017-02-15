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
        $answers = ['Answer ONe', 'answer 2', 'answer3'];
        $questionData = array();
        $questionData['color'] = '#F44336';
        $questionData['categoryName'] = "Philosophy";
        $questionData['question'] = "How many times have I tested this question thing? I don't know";
        $questionData['answers'] = $answers;
        $questionData['questionID'] = 1;
        header('Content-Type: application/json');
        echo json_encode($questionData);
    }
    
    function getAnswer(){
        echo json_encode(0);
    }
?>