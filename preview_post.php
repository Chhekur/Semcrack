<?php
session_start();
include_once 'dbconnect.php';
if(isset($_SESSION['usr_id'])==""){
  header("Location : /");
}
$side="";
$result = mysqli_query($con, "SELECT * FROM data WHERE id ='{$_GET['post_id']}'");
if($row = mysqli_fetch_array($result)){
  $id = $row['id'];
  $name = $row['name'];
  $description = $row['description'];
  $branch = $row['branch'];
  $year = $row['year'];
  $user = $row['user'];
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
  <body style="background-color:#f7f7f7;">
    <?php include_once "navbar.php"; ?>
    <section style="margin-top: 80px;"><div class="container" style="width: 100%;"> 
      <div style="background-color: white;padding: 30px;">
          <center><h1><?php echo $name;?></h1></center><br>
          <h4><?php echo $description?></h4>
          <button onclick="window.location.href='/assets/data/<?php echo $id;?>.pdf'">Preview</button>&nbsp;&nbsp;<a href='/assets/data/<?php echo $id;?>.pdf' download><button>Download</button></a>
          <a href = "/assets/data/<?php echo $id;?>.pdf"></a>
          <h5>Branch: <?php echo $branch?></h5><h6>Year: <?php echo $year?></h6>
          <h6>Shared by: <?php echo $user?></h6>
      </div>
      </div>
    </section>
    <?php include_once "footer.php"; ?>
  </body>
</head>
</html>
