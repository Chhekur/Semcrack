<?php
session_start();
require 'phpmailer/PHPMailerAutoload.php';
$mail = new PHPMailer;
include_once 'dbconnect.php';
$error_msg="";
if(isset($_POST['mail'])){
  $message = mysqli_real_escape_string($con, $_POST['message']);
  $result = mysqli_query($con, "SELECT * from users");
  while($row = mysqli_fetch_array($result)){
      $mail->isSMTP();                                     
      $mail->Host = 'smtp.gmail.com';
      $mail->SMTPAuth = true; 
      $mail->Username = 'Your Email';                 
      $mail->Password = 'Your Password';                           
      $mail->SMTPSecure = 'ssl'; 
      $mail->Port = 465;  
      $mail->setFrom("support@semcrack.com", "SemCrack");
      $mail->addAddress('support@semcrack.com');   
      $mail->addReplyTo("support@semcrack.com", "SemCrack");
      $mail->isHTML(true);                     
      $mail->Subject = "Update";
      $mail->Body    = "Hello {$row['name']},<br>".$message;
      $mail->AltBody = '';
      $mail->send();
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
    <?php include_once "navbar.php"; ?>
    <section style="margin-top: 110px;">
      <center>
        <div class="form">
        <form style="width: 320px;" method="POST">
          <textarea class="input-box" style="border:none;margin-bottom: 0px;" name="message" placeholder="Message"></textarea><br> <br> <input type="submit" name="mail"/> </form>
        </div>
      </center>
    </section>
    <?php include_once "footer.php"; ?>
  </body>
</head>
</html>
