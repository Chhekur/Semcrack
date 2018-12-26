<?php
session_start();
if(isset($_SESSION['usr_id'])!="") {
  header("Location: /");
}
include_once 'dbconnect.php';
$error_msg="";
include_once 'code.php';
require 'phpmailer/PHPMailerAutoload.php';
  $email = mysqli_real_escape_string($con, $_POST['email']);    
  //name can contain only alpha characters and space
  $result = mysqli_query($con, "SELECT * FROM users WHERE email ='$email' ");
  if ($row = mysqli_fetch_array($result)) {
    $tempid = $row['id'];
    $tempname = $row['name'];
    $mail = new PHPMailer;
    $mail->isSMTP();                                     
    $mail->Host = 'smtp.gmail.com';  
    $mail->SMTPAuth = true;                              
    $mail->Username = 'semcrack17@gmail.com';                
    $mail->Password = 'Semcrack@17';                
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465; 
    $mail->setFrom('support@semcrack.com', 'semcrack');
    $mail->addAddress($email);
    $mail->addReplyTo('support@semcrack.com', 'semcrack');
    $mail->isHTML(true);
    $mail->Subject = 'Password reset';
    $mail->Body    = "Hello {$tempname} <br><br> Someone has requested a link to change your password. You can do this through the link below.<br> <br><a href='http://semcrack.com/rpassword?id={$tempid}&code={$code}'>Change my password</a><br><br>If you didn't request this, please ignore this email.<br><br>Your password won't change until you access the link above and create a new one.<br><br>";
    $mail->AltBody = '';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
    header("Location: /failed");
} else {
    echo 'Message has been sent';
    $myfile = fopen("confirmid.php","w");
    $txt = "<?php\n $"."confirmid = {$tempid};\n?>";
    fwrite($myfile, $txt);
    fclose($myfile);
    header("Location: sent");
}
  }
  else{
    $sussesmsg = "Email not found..";
    exit($sussesmsg);
  }
  
?>
<html>
<head>
  <title>SemCrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel = "stylesheet" href = "/css/milligram.css"></link>
  <link rel = "stylesheet" href = "/css/style.css"></link>
  <body class="body">
    <?php include_once "navbar.php"; ?>
    <section style="margin-top: 110px;">
      <center>
        <div class="form">
        <h4>Forgot your password?</h4>
        <form style="width: 320px;">
          <input class="input-box" style="border:none;margin-bottom: 0px;" type="email" name="email" placeholder="Email"/><br>
          <br>
          <input type="submit" value="RESET PASSWORD" name="reset"/>
        </form>
        <span style="color: red;font-size: 15px;"><?php echo $error_msg;?></span>
        
        </div>
      </center>
    </section>
    <?php include_once "footer.php"; ?>
  </body>
</head>
</html>
