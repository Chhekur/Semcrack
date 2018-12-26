<?php
session_start();
include_once "dbconnect.php";
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
  <body>
    <?php include_once "navbar.php"; ?>
    <section style="margin-top: 150px; padding: 10px;">
        <center><h2>This is an error from server.</h2><br>
        <h4>Please try again in some time.</h4>
        </center>
  </section>
    <?php include_once "footer.php"; ?>
  </body>
</head>
</html>