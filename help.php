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

        .line_break{
            display: block;
            margin-top: 0.5em;
            margin-bottom: 0.5em;
            margin-left: auto;
            margin-right: auto;
            border-style: inset;
            border-width: 1px;
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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Guide</title>

    <link rel="icon" type="image/png" href="img/foxTriviaIcon.png"/>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="style/general.css" rel="stylesheet" type="text/css">


  </head>
  <body>

    <button style="bottom: 50px; right: 20px; position:fixed"><a href="help.php#pg_header">
    Back to Top</a>
    </button>

	<div class="container">
		<div class="row">
            <div class="col-sm-6" id="currentUser">
				<h3></h3>
			</div>
			<div class="col-sm-6" id="utilities">
                <!-- Utility Icons Here -->
                <a type="button" href="homePage.php"><img src="img/home.png" width="40px" alt="Home" title="Home"></a>
				<a type="button" href="ProfilePage.php"><img src="img/profile.png" width="40px" alt="Profile" title="Profile"></a> <!-- PUT PROFILE PAGE -->
				<a type="button" href="help.php"><img src="img/help.png" width="40px" alt="Help" title="Help"></a>

            </div>
        </div>
		<div class="page-header text-center" id="pg_header">
			<h1>User Guide</h1>
		</div>
		<div class="row">
			<div class="well well-lg">
        <p dir="ltr" align="center"><b>
            Table of Contents
        </b></p>
        <br/>

        <p dir="ltr" align="center"><b>
            1 Basics
        </b></p>
        <p dir="ltr" align="center"><a href="help.php#1.1">1.1 Introduction</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            2
        </p>
        <p dir="ltr" align="center"><a href="help.php#1.2">1.2 Landing Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            2
        </p>
        <p dir="ltr" align="center"><a href="help.php#1.3">1.3 Login Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            3
        </p>
        <p dir="ltr" align="center"><a href="help.php#1.4">1.4 Register Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            4
        </p>
        <p dir="ltr" align="center"><b>
            2 Main Page
        </b></p>
        <p dir="ltr" align="center"><a href="help.php#2.1">2.1 Home Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            5
        </p>
        <p dir="ltr" align="center"><a href="help.php#2.11">2.11 Home Page Admin</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            6
        </p>
        <p dir="ltr" align="center"><a href="help.php#2.2">2.2 Game Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            7
        </p>
        <p dir="ltr" align="center"><b>
            3 Actual Game Pages
        </b></p>
        <p dir="ltr" align="center"><a href="help.php#3.1">3.1 Spinner Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            8
        </p>
        <p dir="ltr" align="center"><a href="help.php#3.2">3.2 Question Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            9
        </p>
        <p dir="ltr" align="center"><a href="help.php#3.3">3.3 Profile Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            10
        </p>
        <p dir="ltr" align="center"><b>
            4 Edit Pages
        </b></p>
        <p dir="ltr" align="center"><a href="help.php#4.1">4.1 Manage Course Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            11
        </p>
        <p dir="ltr" align="center"><a href="help.php#4.2">4.2 Set Categories Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            12
        </p>
        <p dir="ltr" align="center"><a href="help.php#4.21">4.21 Manage Students</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            13
        </p>
        <p dir="ltr" align="center"> <a href="help.php#4.3">4.3 Add Course Page</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            14
        </p>
        <p dir="ltr" align="center"><b>
            5 General Considerations
        </b></p>
        <p dir="ltr" align="center"> <a href="help.php#5.1">5.1 General Considerations</a>
            &#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;&#8230;
            15
        </p>
        <br/>

        <hr class="line_break">
        <hr class="line_break">
        <p dir="ltr" align="center"><b>
            Basics
        </b></p>
        <p dir="ltr" id="1.1">
            1.1 Introduction
        </p>
        <p dir="ltr">
            Welcome to the user guide for Marist Fox Trivia. This web application is an
            online learning tool used by professors at Marist College to teach students
            in a more engaging and innovative way. Users can register accounts in order
            to play games that belong to their classes. After registering, the teacher
            will have to select a course that was created and add the student (See
            4.21). After being added, the student can then go into the class and click
            <img
                src="https://lh4.googleusercontent.com/2wXRRwnbaLpLQbk5Rqe3zy_BlZapgOAdGxfFqVZXd3z23Qu9W_9Iv4dcNRzGYvvASyNeUbY10s7Gqj91stnHFfaF4aPncnby4hWi3MCuZa_e9lHX5aJpcVuGghLm51PE1B6iNgLE"
                width="75"
                height="20"
            />
            to start playing.
        </p>
        <br/>
        <hr class="line_break">
        <br/>
        <p dir="ltr" id="1.2">
            1.2 Landing Page
        </p>
        <p dir="ltr">
            The landing page is the first page the user will see upon entering the web
            application. The user can either decide to click
            <img
                src="https://lh3.googleusercontent.com/FjkJdaFyzhroLwqi-FKsGs4COAsn1Pj8j_XHxu3xGhMUu9-jrtIqDi2Ov_cLKvDb8MtUVRb5z9h6C6cqIBc6z4Rr2pQD6Vaq2T0EgEwDINZxQFDup4dgKdumbye936ylffG2nP-c"
                width="39"
                height="20"
            />
            or
            <img
                src="https://lh4.googleusercontent.com/dvuZ1rNnfLEYZBH74l8-qc7Nu2SOjAdRGQNLi_oAZCQO8iBM_8VfFMjxQTUtL2rGXERZ88-rkR7Gr7Kj5XTeMaNk8GxRP8lh_vqo9O1Kc3bNhiJvpfFUtRAQdK_ybnsEVHdhsW3b"
                width="50"
                height="20"
            />
            whether the user has already an account registered in the website or not.
        </p>
        <p dir="ltr" align="center">
            <img
                src="https://lh5.googleusercontent.com/WepYWdYJnTc4ZorWCXzbBGJmM56dl8WXXEoJlbt68EDTp2H4ZN5qlufsrL629k-JGgDfPOOBknCQ1jIokmrqx5goWgpsSK1wGsymrLE_qsOKEjXenMIjxxbE-hTBCFPKVRbw4tCQ"
                width="502"
                height="290"
            />
        </p>
        <br/>
        <hr class="line_break">
        <br/>
        <p dir="ltr" id="1.3">
            1.3 Login Page
        </p>
        <p dir="ltr">
            The login page asks the user for her email and password that have to be
            typed in the appropriate text area. Clicking Login will take the user to
            the main page if the login is correct. Otherwise, a red sentence
            &#8220;Incorrect username or password &#8221; will appear on the top of the
            page, highlighting that the user has entered incorrect information.
            Clicking on Or Register will bring the user to the Register Page.
        </p>
        <br/>
        <p dir="ltr" align="center">
            <img
                src="https://lh5.googleusercontent.com/jA2Y890GyNbpN5G9DzByHqyJB7UJAR11j1gIbxXFryaFb1QsOsDHCsrn0tIjKnsOQBvdYr--XGxpi4PhpSs6gdMTWrelpRUtSf7oAdTzmExydZ3ACOLVtm2MdKFDiGCqpyervWMF"
                width="624"
                height="361"
            />
        </p>
        <br/>
        <hr class="line_break">
        <br/>
        <p dir="ltr" id="1.4">
            1.4 Register Page
        </p>
        <p dir="ltr">
            The Register Page is similar to the Login Page, it displays a box where the
            user will have to put her E-mail, username, and password in order to
            successfully register on the website. The information is then safely stored
            on the database.
        </p>
        <br/>
        <br/>
        <p dir="ltr"  align="center">
            <img
                src="https://lh3.googleusercontent.com/HkqlleRsoZgXAGyKpWCREO0OmINCMJgmFpINmNDLJsCFLin-GIKKPWcYGj85tb9uEyTkIZw2c9Szn6nGvMP8mHg8UHwPq-JPW1l4q_3PdzoTyMmR96nhkBHCSd_p3G-8wwtwLTRt"
                width="624"
                height="475"
            />
        </p>
        <br/>
        <hr class="line_break">
        <hr class="line_break">
        <p dir="ltr" align="center"><b>
            Main Pages
        </b></p>
        <br/>
        <p dir="ltr" id="2.1">
            2.1 Home Page
        </p>
        <br/>
        <p dir="ltr">
            The Home Page is the main page of the web application. Here the user can
            see all the different available classes and clicking on Play on any of
            those classes will take the user to its Game Page. Because now the user is
            logged in, she can see the three main buttons on the top right corner. The
            <img
                src="https://lh6.googleusercontent.com/iNDrRQknDTMIWH07xkj-HKCiqaOmbfZtdPKG7W59bRYdIJQs79LBzqhyG97ujmu8qepX_Sup2YwclshskKgHzQyxQZQsQcJQt35h-VrRPXBY4ShAKFaHX639NgF-Xy76mZV0TVK5"
                width="20"
                height="20"
            />
            button will take the user to the Home Page. The
            <img
                src="https://lh6.googleusercontent.com/iKh0EZqSizwSuV_Rp72H674_5kK1egA-_lbAQs5VX3WfY0d4ZFu1jFZvn9WsmWwzg4cBhY07Mi54Km6rSiVHEuJPHQ5kbAYRfHUuL3ZJfLv1Ifxrwvl4oa_sUebUHTp9A_CyTXdd"
                width="20"
                height="20"
            />
            button will take the user to the Profile Page. The
            <img
                src="https://lh3.googleusercontent.com/j4RV24Lh8yZjvxttfTSg5zxkJwSlPQ71MrdMbuqWrUz0g7GV4tRBOoSC3u4vbM12NRNcGCrBMk9GEPf6CF5Wh15kFE_vY2-Qbc3sSiF1eOPbq4TcEyoohM9lDNnq2h9RJxLyUsej"
                width="20"
                height="20"
            />
            button will take the user to the Option Page.
        </p>
        <br/>
        <p dir="ltr" align="center">
            <img
                src="https://lh4.googleusercontent.com/m3TUvsyPwiWfW7ffe-t8Eyv2eeDNVp6v7dV_PTdcwWEZe6s8GhZZ17YlpGQ7RlHf9-mMp14vwUsWIjJTBlCsd1t2WfMgF7AQfTqlSN8nUAKY7408z5NcqKnpll8mekOUhrG8tPfo"
                width="624"
                height="361"
            />
        </p>
        <br/>
        <hr class="line_break">
        <br/>
        <p dir="ltr" id="2.11">
            2.11 Home Page for Admin
        </p>
        <br/>
        <p dir="ltr">
            The Home Page for the Admin displays the same information as the Home Page
            for general users, but it also displays extra information. On each class
            box, the Admin will be able to see the
            <img
                src="https://lh4.googleusercontent.com/bR5UDX4LLVhtO3u_bfRVbGOCacbIwYzKvuU6K7SdqiqWKKe4iyUAQ6G3-z7hJpu1bdX7WhOWceA-ufv5P3lRm4hdsA2ncgLH6W92S4mE_plV99lBXZJWmlhq5G87agSGQMs3Pod2"
                width="35"
                height="20"
            />
            buttons to edit the class, and a
            <img
                src="https://lh4.googleusercontent.com/sDNMgFiHAAdvMf_XoOoBgGmdlqKUWItsx_hMBdM1sMjfKyikfhnCUr1e-6kzWBYPSzNh8WS1JqAGluWA-Q0YIrcWqLjCR_UsSqjnnwpIuoyLl83lBwKRizMblBshCGTN8UkABxSq"
                width="46"
                height="20"
            />
            button to delete the class entirely. If the admin clicks on Add a Game, she
            will be brought to AddCourse Page.
        </p>
        <br/>
        <p dir="ltr" align="center">
            <img
                src="https://lh4.googleusercontent.com/_uaqG-B3HRgotBFvidpqaOC6AtzR7FacILyHUze0f_qKhSzD5FZLJMEWRG1YdM84DtckuRWJeI_kut3Lr1bEaPu6yVfvvFLrKd-7OYRXS2GG8ZcOLwG3t8P4bgXxNY5U7XNiVvZg"
                width="624"
                height="360"
            />
        </p>
        <br/>
        <hr class="line_break">
        <br/>
        <p dir="ltr" id="2.2">
            2.2 Game Page
        </p>
        <br/>
        <p dir="ltr">
            The Game Page displays the title of the class with a big
            <img
                src="https://lh6.googleusercontent.com/qbma01Ge7VkvhUwpKZ9-SUHDHQkjDZlKrAKN2qBMvwYvV32S3BX2KTogtaOVcVvzXxmg3fvp8wnrmjhsPpv9ZpdlGBjJVn_du1zMgCn1lcKI6JmDk_33WCrHVFY4wPHYADj8ZY-f"
                width="77"
                height="20"
            />
            button that will take the user to the Spinner Page. Beneath there is a
            table that shows the available games that the user can play immediately
            just by clicking
            <img
                src="https://lh6.googleusercontent.com/pJn1B497w4IUCFmBZanoA2AJa0bFCLcSeMkOMy3mlJVXD23dArrQ4sHd__cniWuVed-7VzI5sPGL_8bA7bKB0_b8x1z-X3u3WcEYLFOREI_tL8w1xxnBARXOCsjfhOoIXkp_2Q0n"
                width="33"
                height="20"
            />
            .
            Underneath that there are the games that other players are playing, and the
            past games which are games that are over. If the user does not see any
            available games under Your Turn, it means that other users need to play
            their turns in order for a game to show up under Your Turn. In case the
            user wants to immediately play a game, they can press on
            <img
                src="https://lh6.googleusercontent.com/qbma01Ge7VkvhUwpKZ9-SUHDHQkjDZlKrAKN2qBMvwYvV32S3BX2KTogtaOVcVvzXxmg3fvp8wnrmjhsPpv9ZpdlGBjJVn_du1zMgCn1lcKI6JmDk_33WCrHVFY4wPHYADj8ZY-f"
                width="77"
                height="20"
            />
            to start a new game.
        <br/>
        <br/>
        </p>
        <p dir="ltr" align="center">
            <img
                src="https://lh4.googleusercontent.com/O8iGH9mSl7V3MQl6FIpevIYqUoPl2o2MoxVQv4mVV02XBY47-w0LljGOCzRbnJ5lufoKlFZZr25XkkSTc7_98ry6vEazwBUvWRZBnpFYGTon1P1VimJrHRU_KHGzUCDYvCR983A9"
                width="624"
                height="361"
            />
        </p>
        <br/>
        <hr class="line_break">
        <hr class="line_break">
        <p dir="ltr" align="center"><b>
            Actual Game Pages
        </b></p>
        <p dir="ltr" id="3.1">
            3.1 Spinner Page
        </p>
        <br/>
        <p dir="ltr">
            The Spinner Page is a page that displays the main game. On the left the
            user can see her tokens, which are obtained after completing successfully
            three chapters (or topics) in a row. On the right the user can see the
            opponent&#8217;s tokens. In the center there is the main spinning wheel.
            Clicking on Spin will make the wheel spin. On whatever chapter it stops on,
            that will be the chosen chapter. A question randomly chosen from the
            database will pop up (see Question Page). Leaving this page while the game
            is running will not make the user lose her turn.
        </p>
        <br/>
        <p dir="ltr" align="center">
            <img
                src="https://lh6.googleusercontent.com/ji6HAPNoHsKtK8g4qM2ZXz0f37PxsFwgIcRJud9LuM9iytnAVQ0uOT31XjZ1xv8ICqFkFD_H0LhQdBI2xsqho9Maw1LDyCx_Pjh_w0PE4S54PmcxyJikTXocsX4fWNw11JCl6TAO"
                width="624"
                height="360"
            />
        </p>
        <br/>
        <hr class="line_break">
        <br/>
        <p dir="ltr" id="3.2">
            3.2 Question Page
        </p>
        <br/>
        <p dir="ltr">
            The Question Page displays the question randomly chosen from the database
            based on the result of the spinning wheel. The user has a certain amount of
            time to answer the questions, if the time runs up the game will count it as
            a wrong answer and the player currently playing will lose her turn.
            Clicking on End Turn will close the Spinner Page and take the user back to
            the Game Page.
        </p>
        <br/>
        <p dir="ltr" align="center">
            <img
                src="https://lh5.googleusercontent.com/hzuiVsCb6qF7md46nrYMlneh4cT5Qa7LVMoArKhdpGiPa8o_RiwbIGdbXKQZHvB1f9fg6snkPkgqip6k1Mh3vwg0aorWrQSearzEFlUJnF55QmCThbSMogYu1052eVJurJADvDSo"
                width="624"
                height="360"
            />
        </p>
        <br/>
        <hr class="line_break">
        <br/>
        <p dir="ltr" id="3.3">
            3.3 Profile Page
        </p>
        <br/>
        <p dir="ltr">
            The Profile Page displays the profile of the currently logged-in user. For
            example here I am logged in as Francesco and I see his profile. I can see
            the classes he is or has taken, how many games he has played in each class,
            and other information about those classes. Each time a teacher adds a
            student to a classroom, more information will be added to the Profile Page
            of such student.
        </p>
        <br/>
        <p dir="ltr" align="center">
            <img
                src="https://lh5.googleusercontent.com/_Hj-7Ok6jAyAa4S-guWsmbew4TuFknDYr99H7FGhyCMM2kDtJ9o_TTLyskpg3FPZ5LsRU5hCO8auV6hTvxx_-C9NQ6i4STRITA5bZnCky8c3aPXq7lImUKzW38yLJ-BDR7kAXNwl"
                width="624"
                height="268"
            />
        </p>
        <br/>
        <hr class="line_break">
        <hr class="line_break">
        <p dir="ltr" align="center"><b>
            Edit Pages
        </b></p>
        <br/>
        <p dir="ltr" id="4.1">
            4.1 Manage Course Page
        </p>
        <br/>
        <p dir="ltr">
            The Manage Course Page displays the information about the class. The name
            and description of the class are displayed and the admin can see each
            question with its category and correct answer. Moreover, the
            <img
                src="https://lh4.googleusercontent.com/sDNMgFiHAAdvMf_XoOoBgGmdlqKUWItsx_hMBdM1sMjfKyikfhnCUr1e-6kzWBYPSzNh8WS1JqAGluWA-Q0YIrcWqLjCR_UsSqjnnwpIuoyLl83lBwKRizMblBshCGTN8UkABxSq"
                width="46"
                height="20"
            />
            button will allow the admin to delete the question.
            <img
                src="https://lh4.googleusercontent.com/5U4dqVhdUU2hN1vfK7pMXzf3tTU0sld6kuW7EiNDGIUYpGBMN6oBE3XwyIJ8ioenh93gbwD3hVbriFjNA-KKVwgmiAxHOqgZ7MaeW1NHoj6eqWBviwnFqrwyoE8Ck3po5ZxmOMS2"
                width="81"
                height="20"
            />
            adds a question to the class.
            <img
                src="https://lh6.googleusercontent.com/QRRaCdKvhRo-hj7mWbqStjRW2V5xbXELPbobu_SibcNMugbvR3xOgWp5bahqjfKR0fJ9wnB8_tA6Czhkb7Kflv_jNL4BoR8lYF6YYS1Skl7YsQNPbgS-aZ9HnIlyICHSFDGMvBMN"
                width="83"
                height="20"
            />
            adds a chapter (category) to the classroom,
            <img
                src="https://lh3.googleusercontent.com/ioKksK4jUKsOHTgTPOMSpccb7WnDuaHVMbh3EWyXCjjDPQjdeuyBfp58EZdircmAggykdjczIjUOPNxCsuk74Qhne-xv2d6zrCXb-ykpGIB23f7X6ss7e6x-EXe5eEei9Vv6c7sc"
                width="126"
                height="20"
            />
            takes the admin to a page where the admin can change the name of
            description of the class.
            <img
                src="https://lh5.googleusercontent.com/A0FQwQJFJxzlWaR-jACF54g11kCWoP7dWzOI3T47WIcLoexgnqU1lzD-BSQr0eVyNcJtUSL0SwGfZaYK43XUB5djlqsuYRCnf3sR3aRQ4_lhU5uJlNAXZtPd1wm68aBkF4iIgYQg"
                width="81"
                height="20"
            />
            lets the admin edit the students currently enrolled in the classroom.
        </p>
        <br/>
        <p dir="ltr" align="center">
            <img
                src="https://lh4.googleusercontent.com/yZ8T2Wnu0xkFflH8A5nF_8ZUWMN8G5guUStk-jXFRbFCN8xdpg5sNw19eOjG4ztf9lijHr2J3sDxlYiq1V6T5T5fjflld356kmTp5_pdcsI9ML3FJvdvmKHKgVG8c9ouP1bbnXCk"
                width="624"
                height="360"
            />
        </p>
        <br/>
        <hr class="line_break">
        <br/>
        <p dir="ltr" id="4.2">
            4.2 Set Categories Page
        </p>
        <br/>
        <p dir="ltr">
            Set the chapters (categories) for a certain class. Clicking on
            <img
                src="https://lh4.googleusercontent.com/sDNMgFiHAAdvMf_XoOoBgGmdlqKUWItsx_hMBdM1sMjfKyikfhnCUr1e-6kzWBYPSzNh8WS1JqAGluWA-Q0YIrcWqLjCR_UsSqjnnwpIuoyLl83lBwKRizMblBshCGTN8UkABxSq"
                width="46"
                height="20"
            />
            will delete the chapter. To add a new chapter, the admin simply need to
            type its name into the textbox underneath New Category. To ensure clarity,
            the admin should add chapter names that are short and that reflect the
            topic about such chapters. For example, if a class is about History in
            Eastern Europe and Russia after 1928, and a chapter is Fall of Communism in
            1989 in Eastern Europe, the chapter name could be changed to Fall of
            Communism. This will prevent problems in the Spinner Page in case a name is
            too long, which would end up being chaotic and confusing for the end user
            (students).
        <br/>
        <br/>
        </p>
        <p dir="ltr" align="center">
            <img
                src="https://lh3.googleusercontent.com/s9rGatUQ7s34zTOu_vdlN2eWjTEfRQbZpjzF68A-QT5sJzVnnFQtZBcN0RBrFVx7Ps7bhkc2dAJShoPS_YqNEgFXin0-SOhPpjlWYZyd0LXngJhjouEK63bGS8V_5cfDPaJ-ygtI"
                width="624"
                height="421"
            />
        </p>
        <br/>
        <hr class="line_break">
        <br/>
        <p dir="ltr" id="4.21">
            4.21 Manage Students
        </p>
        <br/>
        <p dir="ltr">
            The Manage Student Page displays the students currently enrolled in the
            classroom. Clicking on the
            <img
                src="https://lh4.googleusercontent.com/sDNMgFiHAAdvMf_XoOoBgGmdlqKUWItsx_hMBdM1sMjfKyikfhnCUr1e-6kzWBYPSzNh8WS1JqAGluWA-Q0YIrcWqLjCR_UsSqjnnwpIuoyLl83lBwKRizMblBshCGTN8UkABxSq"
                width="46"
                height="20"
            />
            button will delete a student from a classroom. If a teacher or admin wants
            to add a new student, they can click on the textbox and simply enter the
            username of the student and click on Search. The admin/teacher needs to be
            sure that the student registered with the username that the teacher is
            trying to find.
        </p>
        <br/>
        <p dir="ltr" align="center">
            <img
                src="https://lh3.googleusercontent.com/aNDVAKrJ5lS8Jjf5gtrYUDF3An7Dwa0Yg6b9YKzvvFQU2bX5xcDI82rE11h1ddFOX4uwmXEK7TsbfNn3P-Wa7SGG7Dw7XfoRYpKkr85TYQ7RfV2ZcZRqM4mYdKsyy5ISy3MiYYwl"
                width="315"
                height="235"
            />
        </p>
        <br/>
        <hr class="line_break">
        <br/>
        <p dir="ltr" id="4.3">
            4.3 Add Course Page
        </p>
        <br/>
        <p dir="ltr">
            The Add Course Page simply displays the course name and description of a
            class (course) the user wants to add. After filling in the textboxes, the
            user can click on Add Course to add the course to the database.
        </p>
        <br/>
        <p dir="ltr" align="center">
            <img
                src="https://lh4.googleusercontent.com/rCZt7nP1CeftkPhdrW-CcviBO_3U6UYmlVgk5TjdwxbfjlhhgFzqRF8JaR2fN9aud-BC2rxskYkvjhbMjS-6A40kfHc50phR4Bj4WHoAmz5sOrg9Z_kuxj-BfekL-MU4a9emDiul"
                width="624"
                height="308"
            />
        </p>
        <br/>
        <hr class="line_break">
        <hr class="line_break">
        <p dir="ltr" align="center"><b>
            General Considerations
        </b></p>
        <br/>
        <br/>
        <p dir="ltr" id="5.1">
            5.1 General Considerations
        </p>
        <br/>
        <p dir="ltr">
            Because of how currently the website is set, please avoid using single quotation marks ‘ when typing information in text areas. This will avoid running into bugs and problems where information is not pushed to the database. Regarding registration, please use authentic email addresses to get a confirmation email.
        <div>
        <br/>
        <br/>
        <hr class="line_break">
        <br/>
        <?php include( 'footer.php' ); ?>
            <br/>
        </div>
      		</div>
    		</div>
  			</div>
			</div>
		</div>
	</div>
  </body>
</html>
