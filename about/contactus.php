<?php
session_start();
require '../phpmailer/PHPMailerAutoload.php';

$mail = new PHPMailer;

include_once '../dbconnect.php';
$name_error="";
$email_error="";
$password_error="";
$cpassword_error="";
$checkbox_error="";
  $name = mysqli_real_escape_string($con, $_GET['name']);
  $email = mysqli_real_escape_string($con, $_GET['email']);
  $message = mysqli_real_escape_string($con, $_GET['message']);
  $checkbox = mysqli_real_escape_string($con, $_GET['checkbox']);
  if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
    $error = true;
    $name_error = "Name must contain only alphabets and space";
    exit($name_error);
  }
  if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $error = true;
    $email_error = "Please Enter Valid Email ID";
    exit($email_error);
  }
  if($checkbox != 'on'){
    $error = true;
    $checkbox_error = "Please accept terms and conditions";
    exit($checkbox_error);
  }
  if(!$error){
    $mail->isSMTP();                                     
  $mail->Host = 'smtp.gmail.com'; 
  $mail->SMTPAuth = true; 
  $mail->Username = 'semcrack17@gmail.com';                 
  $mail->Password = 'Semcrack@17';                           
  $mail->SMTPSecure = 'ssl'; 
  $mail->Port = 465;  
  $mail->setFrom($email, $name);
  $mail->addAddress('semcrack17@gmail.com');   
  $mail->addReplyTo($email, $name);
  $mail->isHTML(true);                              // Set email format to HTML

$mail->Subject = "Feedback";
$mail->Body    = $name . "<br><br>". $email."<br><br>".$message ;
$mail->AltBody = '';

if(!$mail->send()) {
    exit("faild");
} else {
    exit("Successfully sent");
}
}
?>
<html>
<head>
  <title>SemCrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script type="text/javascript" src = "/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src = "/js/umd/popper.min.js"></script>
  <script type="text/javascript" src = "/js/bootstrap.js"></script>
  <link rel = "stylesheet" href = "/css/milligram.css"></link>
  <link rel = "stylesheet" href = "/css/style.css"></link>
  <body class="body">
    <?php include_once "../navbar.php"; ?>
    <section style="margin-top: 40px;">
      <center>
        <div class="form">
        <h4>Support or Feedback</h4>
        <form style="width: 320px;">
          <input style="border:none;" type = "text" class="input-box" name ="name" placeholder="Name"/>
          <span style="color: red;font-size: 12px;"><?php echo $name_error;?></span><br>
          <input class="input-box" style="border:none;" type = "email" name = "email" placeholder="Your Email"/>
          <span style="color: red;font-size: 12px;"><?php echo $email_error;?></span><br>
          <textarea name = "message" placeholder="Message" class="input-box"></textarea>
          <select class="input-box" name="option">
          <option value="" disabled selected>Choose your option</option>
            <option value="Feedback">Feedback</option>
            <option value="Report">Report</option>
            <option value="Query">Query</option>
          </select>
          <input style="float:left;" name = "checkbox" type="checkbox" id="test5" onclick="EnableSubmit(this)" />
          <label for="test5" style="margin-top:-3px;text-align: left;" style="font-size: 12px;">you agree to semcrack's <a href="/termsandcondition" class="link" style="font-size: 12px;">Terms of Service and Privacy Policy.</a></label><br>
          <input type="submit" name="contact"/>
        </form>
        <span style="color: red;font-size: 12px;"><?php echo $checkbox_error;?></span>
        </div>
      </center>
    </section>
    <?php include_once "../footer.php"; ?>
  </body>
</head>
</html>
