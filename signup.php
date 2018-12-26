<?php
session_start();
header("Access-Control-Allow-Origin: *");
if(isset($_SESSION['usr_id'])!="") {
  header("Location: /");
}
include_once 'dbconnect.php';
$name_error="";
$email_error="";
$password_error="";
$cpassword_error="";
$checkbox_error="";
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
  $checkbox = mysqli_real_escape_string($con, $_POST['checkbox']);
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
  if(strlen($password) < 6) {
    $error = true;
    $password_error = "Password must be minimum of 6 characters";
    exit($password_error);
  }
  if($password != $cpassword){
    $error = true;
    $cpassword_error = "Password and Confirm password didn't match";
    exit($cpassword_error);
  }
  if($checkbox != 'on'){
    $error = true;
    $checkbox_error = "Please accept terms and conditions";
    exit($checkbox_error);
  }
  if(!$error){
    if(mysqli_query($con,"insert into users(name,email,password,status) values('{$name}','{$email}','".md5($password)."','user')"));
      $result = mysql_query($con, "select * from users where email={$email} and password='".md5($cpassword)."'");
      $row = mysqli_fetch_array($result);
      $_SESSION['usr_id'] = $row['id'];
      $_SESSION['usr_name'] = $row['name'];
      $_SESSION['usr_email'] = $row['email'];
      $_SESSION['usr_password'] = $row['password'];
      $_SESSION['usr_status'] = $row['status'];
    exit("/profile");
  }
  else{
    $errormsg = "This email is already registered.";
    exit($errormsg);
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
    <section style="margin-top: 40px;">
      <center>
        <div class="form">
        <h4>Sign up</h4>
        <form style="width: 320px;" method="POST">
          <input style="border:none;" type = "text" class="input-box" name ="name" placeholder="Name" required /><br>
          <span style="color: red;font-size: 12px;"><?php echo $name_error;?></span>
          <input class="input-box" style="border:none;" type = "email" name = "email" placeholder="Email" required/><br>
          <span style="color: red; font-size: 12px;"><?php echo $email_error;?></span>
          <input class="input-box" style="border:none;" type="password" name="password" placeholder="Password" required/><br>
          <span style="color: red; font-size: 12px;"><?php echo $password_error;?></span>
          <input class="input-box" style="border:none;" type="password" name="cpassword" placeholder="Confirm Password" required/><br>
          <span style="color: red;font-size: 12px;"><?php echo $cpassword_error;?></span>
          <input style="float:left;" name = "checkbox" type="checkbox" id="test5" onclick="EnableSubmit(this)" required />
          <label for="test5" style="margin-top:-3px;text-align: left;" style="font-size: 12px;">you agree to semcrack's <a href="/termsandcondition" class="link" style="font-size: 12px;">Terms of Service and Privacy Policy.</a></label><br>
          <input type="submit" name="signup"/>
        </form>
        <span style="color: red;font-size: 12px;"><?php echo $checkbox_error;?></span>
        </div>
      </center>
    </section>
    <?php include_once "footer.php"; ?>
  </body>
</head>
</html>
