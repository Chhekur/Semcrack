<?php
include_once "dbconnect.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>SemCrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
  <meta name="description" content="SemCrack is an online platform that provide last year question papers and notes!">
<meta name="keywords" content="paper,exampaper,exam,mid sem, sem paper">
  <script type="text/javascript" src = "/js/jquery-3.2.1.min.js"></script>
  <script type="text/javascript" src = "/js/umd/popper.min.js"></script>
  <script type="text/javascript" src = "/js/bootstrap.js"></script>
  <script type="text/javascript" src = "/js/materialize.js"></script>
  <link rel = "stylesheet" href = "/css/milligram.css"></link>
  <link rel = "stylesheet" href = "/css/set1.css"></link>
  <!--<link rel = "stylesheet" href = "/css/set2.css"></link>-->
  <link href='https://fonts.googleapis.com/css?family=Astloch' rel='stylesheet'>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel = "stylesheet" href = "/css/bootstrap.css"></link>
  <link rel = "stylesheet" href = "/css/style.css"></link>
  </head>
  <style type="text/css">
  @media screen and (min-width: 640px){
    body{
      background-color:#f7f7f7;
    }
  }
  @media screen and (max-width: 640px){
    body{
      background-color: #fff;
    }
  }
  </style>
  <body>
    <?php include_once "navbar.php"; ?>
    <center>
    <section style="width: 72%;" class = "contribution-desktop">
      <h1 style = "font-family:astloch;font-size:70px;font-weight:1000;color:#54aff9;">Top Contributors</h1>
      <div id = 'top-three-contributor'>
        <div style="display:inline-block;margin:10px;" id = 'first'></div>
        <div style="display:inline-block;margin:10px;" id = 'second'></div>
        <div style="display:inline-block;margin:10px;" id = 'third'></div>
      </div><br>
      <div style="width: 97.5%;height:600px;overflow:auto;" id = 'top-contributor-list'></div>
    </section></center>
    <section class = "contribution-mobile"><center><br>
      <h1 style = "font-family:astloch;font-size:50px;font-weight:1000;color:#54aff9;">Top Contributors</h1>
      <div id = 'top-three-contributor' style="background-color: #fff;position: relative;z-index: -1;">
        <div style="display:inline-block;margin:10px;" id = 'first1'></div><br>
        <div style="display:inline-block;margin:10px;" id = 'second1'></div>
        <div style="display:inline-block;margin:10px;" id = 'third1'></div>
      </div><br>
      <div style="width: 97.5%;height:600px;overflow:auto;" id = 'top-contributor-list1'></div>
    </center>
    </section>
  </body>
</html>
<script>
$('document').ready(function(){
  $.ajax({
        type:'post',
        url: 'getcontribution.php',
        data: ({check:"gettopcontributors"}),
        success: function(response) {
          document.getElementById('top-contributor-list').innerHTML = response;
        }
    });
  $.ajax({
        type:'post',
        url: 'getcontribution.php',
        data: ({check:"getfirst"}),
        success: function(response) {
          document.getElementById('first').innerHTML = response;
        }
    });
  $.ajax({
        type:'post',
        url: 'getcontribution.php',
        data: ({check:"getsecond"}),
        success: function(response) {
          document.getElementById('second').innerHTML = response;
        }
    });
  $.ajax({
        type:'post',
        url: 'getcontribution.php',
        data: ({check:"getthird"}),
        success: function(response) {
          document.getElementById('third').innerHTML = response;
        }
    });
  $.ajax({
        type:'post',
        url: 'getcontribution.php',
        data: ({check:"gettopcontributorsm"}),
        success: function(response) {
          document.getElementById('top-contributor-list1').innerHTML = response;
        }
    });
  $.ajax({
        type:'post',
        url: 'getcontribution.php',
        data: ({check:"getfirstm"}),
        success: function(response) {
          document.getElementById('first1').innerHTML = response;
        }
    });
  $.ajax({
        type:'post',
        url: 'getcontribution.php',
        data: ({check:"getsecondm"}),
        success: function(response) {
          document.getElementById('second1').innerHTML = response;
        }
    });
  $.ajax({
        type:'post',
        url: 'getcontribution.php',
        data: ({check:"getthirdm"}),
        success: function(response) {
          document.getElementById('third1').innerHTML = response;
        }
    });
});
</script>
