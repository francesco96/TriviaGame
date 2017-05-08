<!DOCTYPE html>
<html lang="en">
    <head>
    <style>
    img:hover {
        color: black;
        border: 0.1px solid #e5e5e5;
        -webkit-transition-duration: 0.2s;
        transition-duration: 0.2s;
        padding: 0px;
      Margin - Border - Padding - Content
    }
    /* The Modal (background) */
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin: auto;
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
    }

    /* The Close Button */
    .close {
        color: #aaaaaa;
        float: right;
        font-size: 25px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
    } ,
  </style>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><!-- Title Of Game Here - PHP --></title>

        <link rel="icon" type="image/png" href="img/foxTriviaIcon.png"/>
        <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="style/spinnerStyle.css">
        <link rel="stylesheet" type="text/css" href="style/modalStyle.css">
        <link rel="stylesheet" type="text/css" href="style/gamePageStyle.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12" id="utilities">
                    <!-- Utility Icons Here -->
                     <a type="button" href="homePage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
          <a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
          <a type="button" href="help.php#2.2"><img src="img/help.png" width="40px" alt="Help" title="Help"></a>

                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="gameTitle">
                    <h1>Game Title<!-- Game Title - PHP --></h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <!-- Spinner Section Left Side -->
                </div>
                <div class="col-sm-6">
                    <div id="wheel">
                        <div id="inner-wheel">
                            <?php
                                $numberOfCategories = 6;
                                $categories = ["Social Studies", "Science", "Math", "English", "PhysEd", "Health", "Art", "Music", "Business", "Computers"];
                                $colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#f39c12", "#d35400", "#c0392b", "#bdc3c7"];
                                $apothem = 250;
                                $base = (2 * $apothem) * tan(deg2rad(180 / $numberOfCategories));
                                $borderWidth = "border-width:" . $apothem . "px " . ($base / 2) . "px 0 " . ($base / 2) . "px;";
                                $transformOrigin = "transform-origin: " . ($base / 2) . "px " . $apothem . "px;";
                                $marginLeft = "margin-left: " . (250 - ($base / 2)) . "px;";

                                for ($i = 0; $i < $numberOfCategories; $i++) {
	                                $transformStyles = "transform: rotate(" . (-(360 / $numberOfCategories) * $i) . "deg);
                                    -webkit-transform: rotate(" . (-(360 / $numberOfCategories) * $i) . "deg);
                                    -moz-transform: rotate(" . (-(360 / $numberOfCategories) * $i) . "deg);
                                    -o-transform: rotate(" . (-(360 / $numberOfCategories) * $i) . "deg);
                                    -ms-transform: rotate(" . (-(360 / $numberOfCategories) * $i) . "deg);";
	                                $colorStyles = "border-color:" . $colors[$i] . " transparent;";
	                                echo "<div class='sec' style='" . $transformStyles . $colorStyles . $borderWidth . $transformOrigin . $marginLeft . "'><span class='category-text'>" . $categories[$i] . " " /*. ($i + 1) */. "</span></div>";
                                }
                            ?>
                        </div>
                        <div id="spin" onclick='spinWheel()'>
                            <div id="inner-spin"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-3">
                    <!-- Spinner Section Right Side -->
                </div>
            </div>
            <h1 id="test"><!-- Used for testing purposes --></h1>
            <div id="modal-section"><!-- The Question Popup Will Be Generated In This Section --></div>
        </div>
        <?php include( 'footer.php' ); ?>
    </body>
</html>

<script>
    var disabled = false;
    var numberOfCategories = <?php echo $numberOfCategories ?>;

    function spinWheel() {
        if (!disabled) {
            disabled = true;

            var randomDegree = Math.floor(Math.random() * 360) + 1080;


            document.getElementById('inner-wheel').style.transform = 'rotate(' + randomDegree + 'deg)';


            var degreesPerSection = 360 / numberOfCategories;

            var degreeChange = randomDegree % 360;

            var section = Math.floor(((degreeChange + (degreesPerSection / 2)) / degreesPerSection) + 1);

            if (section == numberOfCategories + 1) {
                section = 1;
            }




            //document.getElementById("test").innerHTML = section;


            window.setTimeout(getQuestion, 7000, section);
        }
    }

    function getQuestion(category) {
        $.ajax({
            type: "POST",
            url: "questionInfo.php",
            data: "action=getQuestion&category=" + category,
            cache: false,
            dataType: "JSON",
            success: function(result) {
                document.getElementById("modal-section").innerHTML = result;
                $('#myModal').modal({
                    backdrop: 'static',
                    keyboard: false
                });


                var counter = 30;
                window.modaltimer = setInterval(function() {
                    document.getElementById('modal-header-timer').innerHTML = counter;
                    // Display 'counter' wherever you want to display it.
                    if (counter != 0) {
                        counter--;
                    } else {
                        window.clearInterval(window.modaltimer);

                        $(".modal-body-answer-button"). attr('disabled', 'disabled');
    		            document.getElementById('modal-body-result').style.color='red';
    		            document.getElementById('modal-body-result').innerHTML = "Time's Up!";
    		            $("#modal-body-result").animate({fontSize: '50px'});
    		            $('#modal-body-answers').append($("<button type='button' class='btn btn-success' onclick='newRound()'>Continue</button><br/>"));
                    }
                }, 1000);
                $(".modal-body-answer-button").click(function() {
                    window.clearInterval(window.modaltimer);
                    checkAnswer(this, this.value, result['questionID']);
                });
            },

        });
    }

    function checkAnswer(button, value, question) {
        $(".modal-body-answer-button").attr('disabled', 'disabled');
        $.ajax({
            type: "POST",
            url: "questionInfo.php",
            data: "action=getAnswer&answerID=" + value + "questionID=" + question,
            cache: false,
            dataType: "JSON",
            success: function(result) {
                if (result) {
                    document.getElementById('modal-body-result').style.color = 'green';
                    document.getElementById('modal-body-result').innerHTML = "Correct!";
                    button.style.borderColor = 'green';
                    button.style.color = 'green';
                    button.style.fontWeight = 'bold';
                } else {
                    document.getElementById('modal-body-result').style.color = 'red';
                    document.getElementById('modal-body-result').innerHTML = 'Wrong';
                    button.style.borderColor = 'red';
                    button.style.color = 'red';
                    button.style.fontWeight = 'bold';
                }
                $("#modal-body-result").animate({
                    fontSize: '50px'
                });
                $('#modal-body-answers').append($("<button type='button' class='btn btn-success' onclick='newRound()'>Continue</button><br/>"));
            }
        });
    }

    function newRound() {
        $('#inner-wheel').css({
            WebkitTransition: 'none',
            MozTransition: 'none',
            MsTransition: 'none',
            OTransition: 'none',
            transition: 'none'
        });

        document.getElementById('inner-wheel').style.transform = 'none';

        $('#myModal').modal('hide');
        document.getElementById('modal-section').innerHTML = "";
        $('#inner-wheel').removeAttr('style');
        disabled = false;
    }


</script>

<!--
    TODO:
        - Center Game Title
        - Utility Icons - Top Right
-->
