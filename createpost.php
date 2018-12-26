<?php
session_start();

include_once 'dbconnect.php';
$result = mysqli_query($con, "SELECT * FROM data WHERE name =''");
$userdata = mysqli_query($con, "SELECT * FROM users WHERE id = {$_SESSION['usr_id']}");
$row = mysqli_fetch_array($userdata);
$oldcontribution = $row['contribution'];
$errormsg= '';
  $name = $_POST['name'];
$desc = $_POST['description'];
$branch = $_POST['branch'];
$year = $_POST['year'];
$user = $_SESSION['usr_name'];


if(isset($_FILES['file'])){
  $file = $_FILES['file'];
  $file_name = $file['name'];
  $file_tmp = $file['tmp_name'];
  $file_size = $file['size'];
  $file_error = $file['error'];

  $file_ext = explode('.', $file_name);
  $file_ext = strtolower(end($file_ext));
  $allowed = array('pdf');
  if($file_ext != 'pdf'){
    $errormsg = "Only Pdf is allowed";
    exit($errormsg);
  }

  if(in_array($file_ext, $allowed)){
    mysqli_query($con, "INSERT INTO data(name,description,branch,year,user,status) VALUES('{$name}','{$desc}','{$branch}','{$year}','{$user}','pending')");
    $result = mysqli_query($con, "SELECT * from data where name = '{$name}'");
    $row = mysqli_fetch_array($result);
    $fname = $row['id'];
    if($file_error === 0){
      if($file_size <= 2097152){
        $file_name_new = $fname . '.' .$file_ext ;
        $file_destination = 'assets/data/' . $file_name_new;

         if(move_uploaded_file($file_tmp, $file_destination)){
          $contribution = $oldcontribution+1;
          mysqli_query($con, "UPDATE users SET contribution = {$contribution} WHERE id = {$_SESSION['usr_id']}");
          exit('submit');
         }
      }
      else{
        $errormsg = "File size exceeds";
        exit($errormsg);
      }
    }
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
  <link rel = "stylesheet" href = "/css/bootstrap.css"></link>
  <body class="body">
    <?php include_once "navbar.php"; ?>
    <section style="margin-top: 50px;"><center>
    <div class="form">
      <h4>Create Post</h4>
        <form style="width: 320px;" method="post" enctype="multipart/form-data">
          <input name = "name" style="border:none;margin-bottom: 15px;" class="input-box" type = "text" placeholder="Post Name" required/><br>
          <textarea name="desc" style="border:none;margin-bottom: 15px;" class="input-box" placeholder="description" required></textarea><br>
          <select name = "branch" style="border:none;margin-bottom: 15px;" class="input-box" required>
          	<option>Branch</option>
        <option>Computer Science</option>
        <option>Information Technology</option>
        <option>Mechanical</option>
        <option>Electrical</option>
        <option>Electronics</option>
        <option>Civil</option>
        <option>Automobile</option>
        <option>Chemical</option>
        <option>Biotechnology</option>
          </select><br>
          <select name = "year" style="border:none;margin-bottom: 15px;" class="input-box" required>
          	<option>Select Year</option>
          	<option value = "2016">2017</option>
            <option value = "2016">2016</option>
            <option value = "2015">2015</option>
          </select><br>
          <input id="file" name="file" type = "file" style="margin-bottom: 15px;" required/><br>
          <input type = "submit" name ='createpost'/>
          <form><br><br>
            <span style="color:red;"><?php echo $errormsg;?></span>
        </div>
        </center>
    </section>
    <?php include_once "footer.php"; ?>
  </body>
</head>
</html>
