<?php
session_start();

if(isset($_SESSION['usr_id'])=="") {
  header("Location: /");
}
include_once 'dbconnect.php';
$name_error="";
$email_error="";
$password_error="";
$current_password_error="";
$cpassword_error = "";
$error = "";
$msg = "";
  $check = mysqli_real_escape_string($con, $_POST['check']);
  if ($check == "editprofile"){
  $name = mysqli_real_escape_string($con, $_POST['name']);
  $email = mysqli_real_escape_string($con, $_POST['email']);
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
  if(!$error){
    if(mysqli_query($con,"update users set name = '{$name}',email='{$email}' where id = {$_SESSION['usr_id']}"));
    $msg = "Relogin to see changes";
    exit($msg);
  }
}
elseif($check == "changepassword"){
	$current_password = mysqli_real_escape_string($con, $_POST['currentpassword']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
  if(md5($current_password) != $_SESSION['usr_password']){
  	$error = true;
  	$current_password_error = "Your current password in incorrect";
    exit($current_password_error);
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
  if(!$error){
    if(mysqli_query($con,"update users set password='".md5($cpassword)."' where id = '{$_SESSION['usr_id']}'"));
    $msg = "Relogin to see changes";
    exit($msg);
    session_destroy();
    unset($_SESSION['usr_id']);
	unset($_SESSION['usr_name']);
  }
}
?>
<html>
<head>
  <title>SemCrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
  <script type="text/javascript" src = "/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src = "/js/umd/popper.min.js"></script>
  <script type="text/javascript" src = "/js/bootstrap.js"></script>
  <link rel = "stylesheet" href = "/css/milligram.css"></link>
  <link rel = "stylesheet" href = "/css/bootstrap.css"></link>
  <link rel = "stylesheet" href = "/css/style.css"></link>
  <body class="body">
    <?php include_once "navbar.php"; ?>
    <section>
      <center>
        <div class="form">
        <h4>Settings</h4>
        <form style="width: 320px;" method="POST">
          <input style="border:none;margin-bottom: 15px;" type = "text" class="input-box" name ="name" placeholder="Name" value="<?php echo $_SESSION['usr_name'];?>"/><br>
          <span style="color: red;font-size: 12px;"><?php echo $name_error;?></span>
          <input class="input-box" style="border:none;margin-bottom: 15px;" type = "email" name = "email" placeholder="Email" value="<?php echo $_SESSION['usr_email'];?>"/><br>
          <span style="color: red; font-size: 12px;"><?php echo $email_error;?></span>
          <br>
          <input type="submit" name="update" value="update"/>
        </form>
        <form style="width: 320px;" method="POST">
        <input class="input-box" style="border:none;margin-bottom: 15px;" type="password" name="currentpassword" placeholder="Current Password"/><br>
          <span style="color: red; font-size: 12px;"><?php echo $current_password_error;?></span>
          <input class="input-box" style="border:none;margin-bottom: 15px;" type="password" name="password" placeholder="New Password"/><br>
          <span style="color: red; font-size: 12px;"><?php echo $password_error;?></span>
          <input class="input-box" style="border:none;margin-bottom: 15px;" type="password" name="cpassword" placeholder="Confirm Password"/><br>
          <span style="color: red;font-size: 12px;"><?php echo $cpassword_error;?></span>
          <br>
          <input type="submit" name = "update1" value="update"/>
        </form>
        <span style="font-size: 12px;"><?php echo $msg;?></span>
        </div>
      </center>
    </section>
    <?php include_once "footer.php"; ?>
  </body>
</head>
</html>
