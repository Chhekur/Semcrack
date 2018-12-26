<?php
session_start();
header("Access-Control-Allow-Origin: *");
if(isset($_SESSION['usr_id'])!="") {
  header("Location: /");
}
include_once 'dbconnect.php';
$error_msg="";
  $email = mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $result = mysqli_query($con, "SELECT * FROM users WHERE email = '" . $email. "' and password = '" . md5($password) . "'");
  if($row = mysqli_fetch_array($result)){
    $_SESSION['usr_id'] = $row['id'];
    $_SESSION['usr_name'] = $row['name'];
    $_SESSION['usr_email'] = $row['email'];
    $_SESSION['usr_password'] = $row['password'];
    $_SESSION['usr_status'] = $row['status'];
    $_SESSION['usr_contribution'] = $row['contribution'];
    exit("/profile");
  }else{
    $error_msg = "incorrect email or password";
    exit("incorrect email or password");
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
        <h4>Sign in</h4>
        <form style="width: 320px;" method="POST">
          <input class="input-box" style="border:none;" type = "email" name = "email" placeholder="Email" required /><br>
          <input class="input-box" style="border:none;margin-bottom: 0px;" type="password" name="password" placeholder="Password" required /><br>
          <br>
          <a href = "reset">Forgot your password?</a><br><br>
          <input type="submit" name="signin"/>
        </form>
        <span style="color: red;font-size: 15px;"><?php echo $error_msg;?></span>
        
        </div>
      </center>
    </section>
    <?php include_once "footer.php"; ?>
  </body>
</head>
</html>
