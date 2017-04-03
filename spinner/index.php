<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fox Trivia</title>

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
                    <img src="img/home.png" width="40px" alt="Home" title="Home">
                    <img src="img/profile.png" width="40px" alt="Profile" title="Profile">
                    <img src="img/settings.png" width="40px" alt="Settings" title="Settings">
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12" id="gameTitle">
                    <?php
                        require("databaseConnect.php");
                        $gameinfo = $conn->query("SELECT DISTINCT course.TITLE, categorylist.CATEGORY_NAME, categorylist.CATEGORY_ID FROM course JOIN categorylist ON course.COURSE_ID = categorylist.COURSE_ID WHERE course.COURSE_ID = ".$_GET['courseid']);
                        $conn->close();
                        $gamename = $gameinfo->fetch_assoc();
                        $gamename = $gamename['TITLE'];
                    ?>
                    <h1><?php echo $gamename; ?></h1>
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
                                $numberOfCategories = $gameinfo->num_rows;
                                $colors = ["#1abc9c", "#2ecc71", "#3498db", "#9b59b6", "#f1c40f", "#e67e22", "#e74c3c", "#ecf0f1", "#16a085", "#27ae60", "#2980b9", "#8e44ad", "#f39c12", "#d35400", "#c0392b", "#bdc3c7"];
                                $apothem = 250;
                                $base = (2 * $apothem) * tan(deg2rad(180 / $numberOfCategories));
                                $borderWidth = "border-width:" . $apothem . "px " . ($base / 2) . "px 0 " . ($base / 2) . "px;";
                                $transformOrigin = "transform-origin: " . ($base / 2) . "px " . $apothem . "px;";
                                $marginLeft = "margin-left: " . (250 - ($base / 2)) . "px;";

                                for ($i = 0; $i < $numberOfCategories; $i++) {
                                    $gameinfo->data_seek($i);
                                    $category = $gameinfo->fetch_assoc();
	                                $transformStyles = "transform: rotate(" . (-(360 / $numberOfCategories) * $i) . "deg);
                                    -webkit-transform: rotate(" . (-(360 / $numberOfCategories) * $i) . "deg);
                                    -moz-transform: rotate(" . (-(360 / $numberOfCategories) * $i) . "deg);
                                    -o-transform: rotate(" . (-(360 / $numberOfCategories) * $i) . "deg);
                                    -ms-transform: rotate(" . (-(360 / $numberOfCategories) * $i) . "deg);";
	                                $colorStyles = "border-color:" . $colors[$i] . " transparent;";
	                                echo "<div class='sec' id='".($i+1)."' value='".$category['CATEGORY_ID']."' style='" . $transformStyles . $colorStyles . $borderWidth . $transformOrigin . $marginLeft . "'><span class='category-text' style='transform: rotate(0deg); width: 100px; left: -50px;'>" . $category['CATEGORY_NAME'] . " " /*. ($i + 1) */. "</span></div>";
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
            window.setTimeout(getQuestion, 7000, section);
        }
    }

    function getQuestion(category) {
        var value = document.getElementById(category).getAttribute('value');
        $.ajax({
            type: "POST",
            url: "questionInfo.php",
            data: "action=getQuestion&category=" + value + "&courseid=" + <?php echo $_GET['courseid']; ?>,
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

                    var questionid = document.getElementById("myModal").getAttribute('value');
                    checkAnswer(this, this.value, questionid);
                });
            },

        });
    }

    function checkAnswer(button, value, question) {
        $(".modal-body-answer-button").attr('disabled', 'disabled');
        $.ajax({
            type: "POST",
            url: "questionInfo.php",
            data: "action=getAnswer&answerid=" + value + "&questionid=" + question + "&courseid=" + <?php echo $_GET['courseid']; ?>,
            cache: false,
            dataType: "JSON",
            success: function(result) {
                if (result == 1) {
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
