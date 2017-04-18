<?php
if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email'])){
  require 'db.php';
  $username = $_POST['username'];
  $email = $_POST['email'];
  $check = $conn->query("SELECT * FROM user WHERE USER_EMAIL='$email'");
  if($check->num_rows > 0){
    header("Location: registerPage.php?status=duplicateuser");
    die();
  }
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $token = rand(1000,9999);
  $conn->query("INSERT INTO pendinguser VALUES($token, '$email', '$username', '$password', 1)");
  $conn->close();
  /**
   * This example shows settings to use when sending via Google's Gmail servers.
   */

  //SMTP needs accurate times, and the PHP time zone MUST be set
  //This should be done in your php.ini, but this is how to do it if you don't have access to that
  date_default_timezone_set('Etc/UTC');

  require 'PHPMailer/PHPMailerAutoload.php';

  //Create a new PHPMailer instance
  $mail = new PHPMailer;

  //Tell PHPMailer to use SMTP
  $mail->isSMTP();

  //Enable SMTP debugging
  // 0 = off (for production use)
  // 1 = client messages
  // 2 = client and server messages
  $mail->SMTPDebug = 0;

  //Ask for HTML-friendly debug output
  $mail->Debugoutput = 'html';

  //Set the hostname of the mail server
  $mail->Host = 'smtp.gmail.com';
  // use
  // $mail->Host = gethostbyname('smtp.gmail.com');
  // if your network does not support SMTP over IPv6

  //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
  $mail->Port = 587;

  //Set the encryption system to use - ssl (deprecated) or tls
  $mail->SMTPSecure = 'tls';

  //Whether to use SMTP authentication
  $mail->SMTPAuth = true;

  //Username to use for SMTP authentication - use full email address for gmail
  $mail->Username = "foxtriviamarist@gmail.com";

  //Password to use for SMTP authentication
  $mail->Password = "thisismypassword";

  //Set who the message is to be sent from
  $mail->setFrom('foxtriviamarist@gmail.com', 'Fox Trivia');


  //Set who the message is to be sent to
  $mail->addAddress($email, $username);

  //Set the subject line
  $mail->Subject = 'Your Fox Trivia Verification Code';

  //Read an HTML message body from an external file, convert referenced images to embedded,
  //convert HTML into a basic plain-text alternative body
  $mail->msgHTML("Hello ".$username.",<br/>Your Code Is: ".$token);

  //send the message, check for errors
  if (!$mail->send()) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  }
}else{
  header("Location: registerPage.php");
  die();
}
 ?>

 <!DOCTYPE html>
 <html lang="en">
   <head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
     <title>Login/Register</title>

 	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 	<link href="style/general.css" rel="stylesheet" type="text/css">

   </head>
   <body>
 	<div class="container">
 		<div class="page-header text-center" id="pg_header">
 			<h1>Marist Fox Trivia</font><br /></h1>
 		</div>
 			<div class="row">
 			<div class="col-sm-3 text-center">
 			</div>
 				<div class="col-sm-6 text-center" id="regeistration">
 					<div class="well well-lg">
 						<h2>Register</h2>
            <br/>
            <b>A Code Has Been Sent To <?php echo $email; ?>. Please Enter It Below.</b>
 						<br/>
            <br/>
 						<form method="post" action="newuser.php">
 							<div class="form-group">
 								<label>Confirmation Code</label>
 								<input type="text" class="form-control" name="code" placeholder="Code" required>
 							</div>
                <input type="hidden" name="email" value="<?php echo $email;?>">
 							<input type="submit" value="Verify">
 						</form>
 						<br/>
 						<a href="loginPage.php">Or Login</a>
 						<script>
 							$("form").submit(function(){
 								if($("input[name=password]").val() != $("input[name=password2]").val()){
 									alert("Your Passwords Do Not Match");
 									$("input[name=password]").val("");
 									$("input[name=password2]").val("");
 									return false;
 								}else{
 									$("form").submit();
 									return true;
 								}
 							});
 						</script>
 					</div>
 				</div>
 			</div>
 	</div>

   </body>
 </html>
