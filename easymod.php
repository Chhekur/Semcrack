<?php
session_start();
include_once 'dbconnect.php';
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
    	<style>
    		.not-active{
    			display: none;
    		}
    		
.active{
color:red;
}
fieldset{
display:none;

}
#first{
display:block;
}

    	</style>
      	<center>
        <div class="form">
        <h4>Fill few things to find result in EasyMod.</h4>
        <form action="search">
			<fieldset id="first">
			<select class="input-box" name = 'req'/>
				<option>chemistry</option>
				<option>physics</option>
			</select>
			<input class="next_btn" name="next" type="button" value="Next" />
			</fieldset>
			<fieldset>
				<select class="input-box" name = "branch">
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
        			</select>
				<input class="next_btn" name="next" type="button" value="Next" />
			</fieldset>
			<fieldset>
			<select class="input-box" name = "year">
        			<option>Year</option>
        			<option>2017</option>
        			<option>2016</option>
        			<option>2015</option>
      			</select>
      			<input class="next_btn" name="next" type="button" value="Next" />
			</fieldset>
			<fieldset>
			<select class="input-box" name = "sem">
        			<option>Choose</option>
        			<option>Sem</option>
        			<option>Mid Sem</option>
      			</select>
				<input class="submit_btn" type="submit" value="Submit">
			</fieldset>
		</form>
        </div>
      </center>
    </section>
    <?php include_once "footer.php"; ?>
  </body>
  <script>
  	$(document).ready(function() {
var count = 0;


$(".next_btn").click(function() { // Function Runs On NEXT Button Click
$(this).parent().next().fadeIn('slow');
$(this).parent().css({
'display': 'none'
});
// Adding Class Active To Show Steps Forward;
$('.active').next().addClass('active');
});

});
  </script>
</head>
</html>
