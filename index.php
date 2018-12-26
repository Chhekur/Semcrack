<?php
session_start();
include_once 'dbconnect.php';
$sql = "select * from data where status = 'publish'";
$result = mysqli_query($con, $sql);
$json_array = array();
while($row = mysqli_fetch_assoc($result)){
  $json_array[] = $row;
}
$myfile = fopen("data.js", "w");
$data = json_encode($json_array);
$data = "var data = ".$data.";";
fwrite($myfile, $data);
fclose($myfile);
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
  <script type="text/javascript" src = "data.js"></script>
  <link rel = "stylesheet" href = "/css/milligram.css"></link>
  <link rel = "stylesheet" href = "/css/set1.css"></link>
  <!--<link rel = "stylesheet" href = "/css/set2.css"></link>-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel = "stylesheet" href = "/css/bootstrap.css"></link>
  <link rel = "stylesheet" href = "/css/style.css"></link>
  </head>
  <script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "Organization",
  "name": "SemCrack",
  "alternateName": "SemCrack",
  "url": "http://www.semcrack.com",
  "logo": "http://semcrack.com/assets/logo.png",
  "contactPoint": [{
    "@type": "ContactPoint",
    "telephone": "+918519027140",
    "contactType": "customer service"
  }]
}
</script>
<style>
html{
  background: url("assets/home.jpg");
  background-size: 100% 110%;
  background-repeat: no-repeat;
}
body{
  background-color: rgba(0,0,0,0.2); 
}
@media screen and (max-width: 640px){
  .form2{
    margin-top:200px;
  }
  html{
    background-size: 200% 110%;
  }
}
@media screen and (min-width: 640px){
  .form2{
    margin-top: 300px;
  }
}

</style>

  <body style = "height:100%;">
    <?php include_once "navbar-home.php"; ?>
    <section style="margin-top: -20px;">
      <center>
      	<form action = "/search" class='form2'>
          <span style="margin-left:0;margin-right:0;" class="searchbar input input--makiko">
          <input id = "searchbar" autocomplete="off" name = "req" style="border:none;font-size:25px;height:60px;" class="input__field input__field--makiko" type="text" onkeypress="return onlyAlphabets(event,this);">
          <label class="input__label input__label--makiko" for="searchbar">
            <span style = "font-size:18px; margin-bottom:10px;" class="input__label-content input__label-content--makiko"></span>
          </label>
        </span>
          <ul style = "margin-top:-18px;" class="list-group result1" id = "result"></ul><br>
        
        </form><!--
        <button onclick="window.location.href='easymod'">EASY MOD</button>-->
        </center>
    </section>
  </body>
</html>

<script>

  function onlyAlphabets(e, t) {
            try {
                if (window.event) {
                    var charCode = window.event.keyCode;
                }
                else if (e) {
                    var charCode = e.which;
                }
                else { return true; }
                if ((charCode > 64 && charCode < 91) || (charCode ==32 ) || (charCode == 13) || (charCode > 96 && charCode < 123))
                    return true;
                else
                    return false;
            }
            catch (err) {
                alert(err.Description);
            }
        }

  $(document).ready(function(){
    $('#searchbar').keyup(function(e){
      $('#result').html('');
      var searchField = $('#searchbar').val();
      var expression = new RegExp(searchField, "i");
      if (searchField != ""){
        $.each(data,function(key, value){
          if(value.name.search(expression) != -1){
            $('#result').append("<a href='/search?req="+value.name+"'><li style='text-align:left; border:none; border-radius:0px;' class = 'list-group-item livesearch-result'><h7 style='font-size:15px; color:black;'>"+value.name+"</h7></li></a>");
          }
        });
    }
    else{
    	$('#result').html("");
    }
    });
  });
</script>
  <!-- /container -->
    <script src="js/classie.js"></script>
    <script>
      (function() {
        if (!String.prototype.trim) {
          (function() {
            var rtrim = /^[\s\uFEFF\xA0]+|[\s\uFEFF\xA0]+$/g;
            String.prototype.trim = function() {
              return this.replace(rtrim, "");
            };
          })();
        }
        [].slice.call( document.querySelectorAll( "input.input__field" ) ).forEach( function( inputEl ) {
          if( inputEl.value.trim() !== "" ) {
            classie.add( inputEl.parentNode, "input--filled" );
          }
          inputEl.addEventListener( "focus", onInputFocus );
          inputEl.addEventListener( "blur", onInputBlur );
        } );
        function onInputFocus( ev ) {
          classie.add( ev.target.parentNode, "input--filled");
        }
        function onInputBlur( ev ) {
          if( ev.target.value.trim() === "" ) {
            classie.remove( ev.target.parentNode, "input--filled" );
          }
        }
      })();

      $('form[name=signin]').submit(function(e) {
      e.preventDefault();
       $.ajax({
        type:this.method,
        url: 'signin.php',
        data: $(this).serialize(),
        success: function(response) {
            if(response != "incorrect email or password"){
              window.location.href = "/profile";
            } 
            else{
              document.getElementById('error').innerHTML = response;
            }
        }
    });
});

      $('form[name=signup]').submit(function(e) {
      e.preventDefault();
       $.ajax({
        type:this.method,
        url: this.action,
        data: $(this).serialize(),
        success: function(response) {
          if(response == "Name must contain only alphabets and space" || response == "Please Enter Valid Email ID"|| response == "Password must be minimum of 6 characters"|| response == "Password and Confirm password didn't match"|| response == "Please accept terms and conditions"){
            document.getElementById('error1').innerHTML = response;
        }
        else{
          window.location.href = "/profile";
        }
        }
    });
});
      $('form[name=reset]').submit(function(e) {
      e.preventDefault();
       $.ajax({
        type:this.method,
        url: this.action,
        data: $(this).serialize(),
        success: function(response) {
          if (response == "Email not found.."){
            document.getElementById("error2").innerHTML = response;
          }
          else{
            window.location.href = "/sent";
          }
        }
    });
});
    </script>