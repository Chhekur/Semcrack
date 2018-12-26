<?php
include_once "../dbconnect.php";
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>SemCrack</title>
  <meta name="viewport" content="width=device-width, initial-scale=1"></meta>
  <meta name="description" content="SEMCRACK is an online platform that provide last year question papers !">
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
      background-color:#fff;
    }
  }
  @media screen and (max-width: 640px){
    body{
      background-color: #fff;
    }
  }
  </style>
  <body>
    <?php include_once "../navbar.php"; ?>
    <section>
      <center>
      <div id = "logo" style = "padding:20px;">
      <img src = "../assets/logo.png" style = "width:300px;"></img>
      <h5><b style = "font-weight:1000;">SEMCRACK</b> is very much like <b style ="font-weight:1000;">THE_ONE_&_LAST_NIGHT_STAND</b> for engineers lke us.<br>Saying like us, we mean to say engineers who are bothered to study only on the eve. And on the (eve i.e. Exams) what's foremost needed _ _ _ _ _ _ ?<br>Literally speaking  <b style ="font-weight:1000;">KASH PEVIOUS YEAR K QUESTION PAPERS MIL GYE HOTE !</b> Isn't it like this ? Hahaha !<br>So here it is.....<b style = "font-weight:1000;">SEMCRACK</b> - Helping Engineers for <b style ="font-weight:1000;">THE_ONE_&_LAST_NIGHT_STAND !</b><br><b style = "font-weight:1000;">SEMCRACK</b> is an easily accessible platform for previous year question papers for all branches / courses.</h5></div>
      <hr width='90%'><br>
      <h3>Team Semcrack</h3>
      <div id = "team" style = "padding:20px;">
        <div id = "first" style = "display:inline-block;margin:15px;">
          <img src = "../assets/img/1.jpg" style = "width:120px;border-radius:100%;">
          <h4 style ="margin-top:10px;">Pawan Kuswhah</h4>
          <h6><b style = "font-weight:1000;">Developer<br>Student<br>MITS, Gwalior<br>CSE</h6>
        </div>
        <div id = "second" style = "display:inline-block;margin:15px;">
          <img src = "../assets/img/2.jpg" style = "width:120px;border-radius:100%;">
          <h4 style ="margin-top:10px;">Harendra Chhekur</h4>
          <h6><b style = "font-weight:1000;">Developer<br>Student<br>MITS, Gwalior<br>CSE</h6>
        </div>
        <div id = "third" style = "display:inline-block;margin:15px;">
          <img src = "../assets/img/3.jpg" style = "width:120px;border-radius:100%;">
          <h4 style ="margin-top:10px;">Anurag Malviya</h4>
          <h6><b style = "font-weight:1000;">Developer<br>Student<br>MITS, Gwalior<br>CSE</h6>
        </div>
        <div id = "fourth" style = "display:inline-block;margin:15px;">
          <img src = "../assets/img/4.jpg" style = "width:120px;border-radius:100%;">
          <h4 style ="margin-top:10px;">Indrakishore Burman</h4>
          <h6><b style = "font-weight:1000;">Graphic Designer<br>Student<br>MITS, Gwalior<br>CSE</h6>
        </div>
      </div><br>
      <div id = "mission" style = "background-color:#62a8ea;color:white;overflow-wrap: break-word;padding:20px;">
        <h3  style = "font-weight:1000;">Mission</h3>
        <h6>We at <b style = "font-weight:1000;">SEMCRACK</b> have only one foremost vision that all of us atleast have accessibilty to commonly needed resources for exams.<br> That's what our prime aim is !<br><b style = "font-weight:1000;">SEMCRACK</b> is an open-source contributing platform and always will be ! </h6>
      </div><br>
      <div id = "vision" style = "overflow-wrap: break-word;padding:20px;">
        <h3>You can also be a part of <b style = "font-weight:1000;">SEMCRACK</b> !</h3>
        <h6>It's obvious that we alone can't gather all question papers from every branch
              so here comes your role for contribution to <b style = "font-weight:1000;">SEMCRACK</b>.
              <br>You, yes you can also contribute just by registering yourself at <b style = "font-weight:1000;">SEMCRACK</b>. There's a dedicated section for all this stuff where you can manage your contribution.<br>We are also planning to expand our team so that we can provide our services to each and every student of <b style = "font-weight:1000;">MITS </b>irrespective of branch / course.<br>Contributing to <b style = "font-weight:1000;">SEMCRACK</b> is way to help your batchmates, juniors, colleagues, rather whole <b style = "font-weight:1000;">MITS STUDENT FAMILY</b>.<br>Expecting a heartthrob response from you guys ! <b style = "font-weight:1000;">B'coz we are a part of you guys ! </b></h6>
      </div>
    </center>
    </section>
  </body>
  <?php include_once "../footer.php"; ?>
</html>