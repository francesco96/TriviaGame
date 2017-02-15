<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="style/spinnerStyle.css">
<link rel="stylesheet" type="text/css" href="style/modalStyle.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>



        <div id="wheel">
            <div id="inner-wheel">
            </div>       
           
            <div id="spin" onclick='spinWheel()'>
                <div id="inner-spin"></div>
            </div>
            
        </div>
        
        <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" id='modal-header-color'>
          <p class="modal-title" id='modal-header-category'></p>
          <p id='modal-header-timer'>30</p>
        </div>
       <div style="clear: both;"></div>
        <div class="modal-body">
        	<div id="modal-body-question-frame">
          		<p id='modal-body-question'></p>
          		<p id='modal-body-result'></p>
          	</div>
          <div id='modal-body-answers'></div>
        </div>
        <div class="modal-footer">
        	Possible ad content here
        </div>
      </div>
      
    </div>
  </div>
  
</div>


<script>
    var numberOfCategories = 6;
    
    var colors = ['#F44336', '#673AB7', '#E91E63', '#4CAF50', '#FFEB3B', '#FF5722', '#607D8B','#F44336', '#673AB7', '#E91E63', '#4CAF50', '#FFEB3B', '#FF5722', '#607D8B','#F44336', '#673AB7', '#E91E63', '#4CAF50', '#FFEB3B', '#FF5722', '#607D8B'];
    
    for(var i = 0; i < numberOfCategories; i++){
        $('#inner-wheel').append($('<div class="sec" style="transform: rotate('+(-(360/numberOfCategories)*i)+'deg); -webkit-transform: rotate('+(-(360/numberOfCategories)*i)+'deg); -moz-transform: rotate('+(-(360/numberOfCategories)*i)+'deg); -o-transform: rotate('+(-(360/numberOfCategories)*i)+'deg); -ms-transform: rotate('+(-(360/numberOfCategories)*i)+'deg); border-color: '+colors[i]+' transparent;"><span class="category-text">'+ (i + 1) +'</span></div>'));
    }
    
    var disabled = false;
    function spinWheel(){
        if(!disabled){
            disabled = true;
            
            var randomDegree = Math.floor(Math.random()*360) + 1080;
            
            
            document.getElementById('inner-wheel').style.transform = 'rotate(' + randomDegree + 'deg)';
            
            
            var sectionChange = randomDegree - 1080;
            
            
            // 0-30 = 6; 31-90 = 1; 91-150=2; 151-210=3; 211-270=4; 271-330=5; 331-360=6
            
            var section = Math.round(sectionChange/60) + 1;
            
           
            window.setTimeout(getQuestion, 7000, section);
        }
    }
    
    function getQuestion(category){
        $.ajax({
        	type: "POST",
        	url: "questionInfo.php",
        	data: "action=getQuestion&category="+category,
        	cache: false,
        	dataType: "json",
        	success: function(result){
        		document.getElementById('modal-header-color').style.backgroundColor = result['color'];
        		document.getElementById('modal-header-category').innerHTML = result['categoryName'];
        		document.getElementById('modal-body-question').innerHTML = result['question'];
        		for(var i = 0; i < result['answers'].length; i++){
        			$('#modal-body-answers').append($("<button type='button' class='form-control modal-body-answer-button' value='"+i+"'>"+result['answers'][i]+"</button><br/>"));
        		}
        		$('#myModal').modal({backdrop: 'static', keyboard: false});
        		
        		$("#modal-timer-bar").animate({width: '100%'}, 30000);
        		
        		var counter = 30;
				window.modaltimer = setInterval(function() {
    				document.getElementById('modal-header-timer').innerHTML = counter;
    				// Display 'counter' wherever you want to display it.
    				if (counter != 0) {
    					counter--;
    				}else{
    					window.clearInterval();
    					timeExpired();
    				}
				}, 1000);
				$(".modal-body-answer-button").click(function(){
					window.clearInterval(window.modaltimer);
					checkAnswer(this, this.value, result['questionID']);
				});
        	},
        	
        });
    }
    
    function timeExpired(){
    		document.getElementById('modal-body-result').style.color='red';
    		document.getElementById('modal-body-result').innerHTML = "Time's Up!";
    		button.style.borderColor='red';
    		button.style.color='red';
    		button.style.fontWeight='bold';
    		$("#modal-body-result").animate({fontSize: '50px'});
    		$('#modal-body-answers').append($("<button type='button' class='btn btn-success' onclick='newRound()'>Continue</button><br/>"));
    }
    
    function checkAnswer(button, value, question){
    	$(".modal-body-answer-button"). attr('disabled', 'disabled');
    	$.ajax({
    		type: "POST",
    		url: "questionInfo.php",
    		data: "action=getAnswer&answerID="+value+"questionID="+question,
    		cache: false,
    		dataType: "JSON",
    		success: function(result){
    			if(result){
    				document.getElementById('modal-body-result').style.color='green';
    				document.getElementById('modal-body-result').innerHTML = "Correct!";
    				button.style.borderColor='green';
    				button.style.color='green';
    				button.style.fontWeight='bold';
    			} else {
    				document.getElementById('modal-body-result').style.color='red';
    				document.getElementById('modal-body-result').innerHTML = 'Wrong';
    				button.style.borderColor='red';
    				button.style.color='red';
    				button.style.fontWeight='bold';
    			}
    			$("#modal-body-result").animate({fontSize: '50px'});
    			$('#modal-body-answers').append($("<button type='button' class='btn btn-success' onclick='newRound()'>Continue</button><br/>"));
    		}
    	});
    }
    
    function newRound(){
    	$('#myModal').modal('hide');
    	document.getElementById('modal-body-result').innerHTML="";
    	document.getElementById('modal-body-answers').innerHTML="";
    	disabled = false;
    }
</script>
  