<?php
session_start();

if(isset($_SESSION['usr_id'])!="") {
  header("Location: /");
}
include_once 'dbconnect.php';
include_once 'confirmcode.php';
include_once 'confirmid.php';
//set validation error flag as false
$id = $_GET['id'];
$successmsg = "";
$code = $_GET['code'];
if (isset($_POST['reset'])) {
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']); 
  $resetid = mysqli_real_escape_string($con, $_POST['id']);
  $password  = md5($password);
  $cpassword = md5($cpassword);
  
  if($password == $cpassword){
  if(mysqli_query($con,"UPDATE users SET password='$cpassword' WHERE id='$resetid'")) {
      $successmsg = "Your Password have been changed.";
      include_once 'code.php';
      header("Location: successful");
    } else {
      $successmsg = "Please try again later!";
    }
}
else{
  $successmsg = "New password and confirm password doesn't match.";
}

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
      <?php if ($confirmcode == $code && $confirmid == $id) {?>
        <div class="form">
        <h4>Reset your password?</h4>
        <form style="width: 320px;" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="resetform">
          <input class="input-box" style="border:none;" type="password" name="password" placeholder="Password"/><br>
          <input class="input-box" style="border:none;" type="password" name="cpassword" placeholder="Confirm Password"/>
          <input name="id" value="<?php echo $id;?>" style="display: none;"/>
          <input type="submit" value="RESET PASSWORD" name="reset"/>
        </form>
        <span><?php echo $successmsg;?></span>
      </form>
      <?php } else{ if($confirmid != $id){ ?>
      <h4>You are trying to manipulate url.</h4>
      <?php } else{?>
      <h4>Your password reset link has expired.</h4>
      <?php } }?>
        </div>
      </center>
    </section>
    <?php include_once "footer.php"; ?>
  </body>
</head>
</html>
