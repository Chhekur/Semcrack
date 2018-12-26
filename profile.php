<?php
session_start();
include_once "dbconnect.php";

if(isset($_SESSION['usr_id'])=="") {
  header("Location: /");
}
$pending_post="";
$result = mysqli_query($con, "select * from data where status='pending'");
while($row = mysqli_fetch_array($result)){
  $pending_post .= "<div class='post-approval'><h7>{$row['name']}</h7><br><form method='post' style='float:left;'><input type='text' style='display: none;' name='post_id' value='{$row['id']}'/><br><button class='button-small' type='submit' name='publish'>Approve</button></form><br><form action='/preview' style='float:left;margin-left: 10px;'><input type='text' style='display: none;' name='post_id' value='{$row['id']}'/><input type='text' name='name' style='display: none' value='{$row['name']}'/><input name = 'description' type='text' style='display: none' value='{$row['description']}'/><input name = 'branch' type='text' style='display: none' value='{$row['branch']}'/><input name = 'year' type='text' style='display: none' value='{$row['year']}'/><input name = 'user' type='text' style='display: none' value='{$row['user']}'/><button class='button-small'>Preview</button></form><form method = 'post'><input type='text' style='display: none;' name='post_id' value='{$row['id']}'/><button class='button-small' type='submit' name='disapprove'>Disapprove</button></form></div>";
}
$my_posts = "";
$name = $_SESSION['usr_name'];
$results = mysqli_query($con, "select * from data where user='$name'");
while($row = mysqli_fetch_array($results)){
  $my_posts .= "<div class='post-approval'><h7>{$row['name']}</h7><br><br><form action='/preview' style='float:left;margin-left: 10px;'><input type='text' style='display: none;' name='post_id' value='{$row['id']}'/><input type='text' name='name' style='display: none' value='{$row['name']}'/><input name = 'description' type='text' style='display: none' value='{$row['description']}'/><input name = 'branch' type='text' style='display: none' value='{$row['branch']}'/><input name = 'year' type='text' style='display: none' value='{$row['year']}'/><input name = 'user' type='text' style='display: none' value='{$row['user']}'/><button class='button-small'>Preview</button></form></div>";
}
$post_id = "";
if(isset($_POST['publish'])){
  $post_id = $_POST['post_id'];
  mysqli_query($con,"update data set status='publish' where id={$post_id}");
}
if(isset($_POST['disapprove'])){
  $post_id = $_POST['post_id'];
  mysqli_query($con, "DELETE from data where id = {$post_id}");
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
  <body style="background-color: #f7f7f7;">
    <?php include_once "navbar.php"; ?>
    <section>
    <style>
      input[type='file']{
        display: none;
      }
      .hello{
        color:#D0D3D4;
        cursor: pointer;
      }
      .hello:hover{
        color:white;
      }
      .nav-bar{
      	display: none;
      }

    </style>
      <div class="desktop">
        <div class="left">
          <a  href="/"><i style = "font-size:35px;margin:10px;color:#fff;margin-top:-30px;" class="large material-icons">home</i></a><center>
          <img class="circle" style="width:150px;border-radius: 50%;" src="/assets/img/usr/<?php echo $_SESSION['usr_id']; ?>.jpg" onError="this.onerror=null;this.src='/assets/img/usr/sample.png';"/><br><form action="/upload_image" method="post" enctype="multipart/form-data" style="margin:0px;">
          <label for="file" class="button-small" style="margin-left:-80px;margin-top:-30px;cursor:pointer;"><i style = "font-size:35px;color:white;background-color:#62a8ea; border-radius:100%;font-size:25px;border:solid #62a8ea 5px;" class="small material-icons">camera_alt</i><input id="file" name ="file" type="file" onchange="this.form.submit()" style="opacity: 1;"></label>
          </form><br>
          <h3><?php echo $_SESSION['usr_name'];?></h3></center>
          <div style = "margin-left:10px;margin-top:30px;">
          <?php if($_SESSION['usr_status'] == 'admin'){?>
          <a onclick = "rightgen_approval();"><h5 class = "hello" style = "padding-right:10px;" ><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">collections</i>&nbsp;&nbsp;&nbsp;Approvals<span  id = "pendingpostcount" style='color:#fff;background-color:#62a8ea;padding-left:15px;padding-right:18px;border-radius:200px;float:right;'></span></h5></a>
          <?php }?>
          <a onclick = "rightgen_mycontribution()"><h5 class = "hello" style = "padding-right:10px;"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">collections</i>&nbsp;&nbsp;&nbsp;My Contribution<span id = "contributioncount" style='color:#fff;background-color:#62a8ea;padding-left:15px;padding-right:18px;border-radius:200px;float:right;'></span></h5></a>
          <a onclick = "rightgen_upload()" style = "cursor:pointer;color:#D0D3D4;"><h5 class = "hello"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">file_upload</i>&nbsp;&nbsp;&nbsp;Upload</h5></a>
          <a onclick = "rightgen_edit()"><h5 class = "hello"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">settings</i>&nbsp;&nbsp;&nbsp;Edit Profile</h5></a>
          <a onclick = "rightgen_feedback()"><h5 class = "hello"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">forum</i>&nbsp;&nbsp;&nbsp;Feedback</h5></a>
          <a style = "cursor:pointer;color:#D0D3D4;" href = "/logout"><h5 class = "hello"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">first_page</i>&nbsp;&nbsp;&nbsp;Logout</h5></a>
        </div>
        </div>
        <div class="right" id ="right"><center>
          <div id = "approvals" style = "display:none;"><br>
          	<h3>Posts For Approval</h3>
            <?php echo $pending_post;?>
          </div>
          <div id = "mycontribution" style = "display:none;"><br>
          	<h3>My Contribution</h3>
            <?php echo $my_posts;?>
          </div>
          <div id = "upload_form" style = "display:none;"><br><br>
            <h3>Contribute</h3>
            <form name = "createpost" id = 'createpost' action = 'createpost.php' method = 'post' enctype="multipart/form-data" style="width: 500px;" >
              <span class="input input--jiro">
                <input name = "name" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="text" id="input-11" required>
                <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
                  <span class="input__label-content input__label-content--jiro">Post Name</span>
                </label>
              </span>
              <span class="input input--jiro">
                <textarea name = "description" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="text" id="input-11" required></textarea>
                <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
                  <span class="input__label-content input__label-content--jiro">Description</span>
                </label>
              </span>
              <select name = "branch" style="border:none;margin-bottom: 15px;width:470px;" class="input-box" required>
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
          <select name = "year" style="border:none;margin-bottom: 15px;width:470px;" class="input-box" required>
            <option>Select Year</option>
            <option value = "2016">2017</option>
            <option value = "2016">2016</option>
            <option value = "2015">2015</option>
          </select><br>
          <label for="pdf" class="button-small" style="font-size:15px;cursor:pointer;"><img src = '/assets/icon/upload.svg' style="width:50px;"><input id="pdf" name="file" type = "file"  required/> Choose File</label>
          </img><br><br>
          <button style="width:470px; border-radius: 4px;">Submit</button>
            </form><br>
            <span id = "hello8" style="color: red;font-size: 15px;"></span>
          </div>
          <div id = "feedback" style = "display:none;">
            <br><br>
            <center>
              <h4>Support / Feedback</h4>
            <form name = "feedback_form" style = "width:50%;" action = "about/contactus.php" method = "get">
              <span class="input input--jiro">
          <input name = "name" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="text" required>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Name</span>
          </label>
      </span>
      <span class="input input--jiro">
          <input name = "email" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="email" id="input-11" required>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Email</span>
          </label>
      </span>
      <span class="input input--jiro">
          <textarea name = "message" style = "font-size:12px;border:none;" class="input__field input__field--jiro" required></textarea>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Message</span>
          </label>
      </span><br><br>
      <input type = "checkbox" name = "checkbox"><label for="test5" style="margin-top:-3px;text-align: left;" style="font-size: 12px;">&nbsp;&nbsp;you agree to semcrack's <a href="/termsandcondition" class="link" style="font-size: 12px;">Terms of Service and Privacy Policy.</a></label>
      <br><br>
      <button style = "background-color:#62a8ea;border:none;border-radius:3px;width:92%;">Send</button><span id = "hello2" style="color: red;font-size: 15px;"></span>

            </form>
          </center>
          </div>
          <div id = "editform" style = "display:none;"><br>
            <center><h3>Edit Profile</h3><form name = "editprofile" style = 'width:50%' action = 'settings.php' method = 'post'><input type = "text" name = "check" style = "display:none" value = "editprofile"><span class='input input--jiro'><input name = 'name' style = 'font-size:12px;border:none;' value = '<?php echo $_SESSION['usr_name'];?>' class='input__field input__field--jiro' type='name' id='input-11' required><label style = 'font-size:12px; padding-bottom:20px;' class='input__label input__label--jiro' for='input-11'><span class='input__label-content input__label-content--jiro'>Name</span></label></span><span class='input input--jiro'><input name = 'email' style = 'font-size:12px;border:none;' class='input__field input__field--jiro' value = '<?php echo $_SESSION['usr_email'];?>' type='email' id='input-11' required><label style = 'font-size:12px; padding-bottom:20px;' class='input__label input__label--jiro' for='input-11'><span class='input__label-content input__label-content--jiro'>Email</span></label></span><br><br><button style = 'background-color:#62a8ea;border:none;border-radius:3px;width:93%;'>Update</button><br><span id = "hello" style="color: red;font-size: 15px;"></span></form><form name = "changepassword" style = 'width:50%;' action = 'settings.php' method = 'post'><input type = "text" name = "check" style = "display:none" value = "changepassword"><span class='input input--jiro'><input name = 'currentpassword' style = 'font-size:12px;border:none;' class='input__field input__field--jiro' type='password' id='input-11' required><label style = 'font-size:12px; padding-bottom:20px;' class='input__label input__label--jiro' for='input-11'><span class='input__label-content input__label-content--jiro'>Current Password</span></label></span><span class='input input--jiro'><input name = 'password' style = 'font-size:12px;border:none;' class='input__field input__field--jiro' type='password' id='input-11' required><label style = 'font-size:12px; padding-bottom:20px;' class='input__label input__label--jiro' for='input-11'><span class='input__label-content input__label-content--jiro'>New Password</span></label></span><span class='input input--jiro'><input name = 'cpassword' style = 'font-size:12px;border:none;' class='input__field input__field--jiro' type='password' id='input-11' required><label style = 'font-size:12px; padding-bottom:20px;' class='input__label input__label--jiro' for='input-11'><span class='input__label-content input__label-content--jiro'>Confirm Password</span></label></span><br><br><button style = 'background-color:#62a8ea;border:none;border-radius:3px;width:93%;'>Update</button><br><span id = "hello1" style="color: red;font-size: 15px;"></span></form></center>
          </div>
        </div></center>
      </div>
      <div class="mobile">
      	<a  href="#" data-activates="slide-out9" class="button-collapse9"><i style = "font-size:35px;margin:10px;" class="large material-icons">menu</i></a>
      	<ul style="background-color: rgb(28, 38, 47);" id="slide-out9" class="side-nav">
        <a  href="/"><i style = "font-size:35px;margin:10px;color:#fff;" class="large material-icons">home</i></a><center>
     		<br>
          <img class="circle" style="width:150px;border-radius: 50%;" src="/assets/img/usr/<?php echo $_SESSION['usr_id']; ?>.jpg" onError="this.onerror=null;this.src='/assets/img/usr/sample.png';"/><br><form action="/upload_image" method="post" enctype="multipart/form-data" style="margin:0px;">
          <label for="file" class="button-small" style="margin-left:-80px;margin-top:-30px;cursor:pointer;"><i style = "font-size:35px;color:white;background-color:#62a8ea; border-radius:100%;font-size:25px;border:solid #62a8ea 5px;" class="small material-icons">camera_alt</i><input id="file" name ="file" type="file" onchange="this.form.submit()" style="opacity: 1;"></label>
          </form><br>
          <h3><?php echo $_SESSION['usr_name'];?></h3></center>
          <div style = "margin-left:10px;margin-top:30px;">
          <?php if($_SESSION['usr_status'] == 'admin'){?>
          <a onclick = "rightgen_approval();"><h5 class = "hello" style = "padding-right:10px;"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">collections</i>&nbsp;&nbsp;&nbsp;Approvals<span  id = "pendingpostcount1" style='color:#fff;background-color:#62a8ea;padding-left:15px;padding-right:18px;border-radius:200px;float:right;'></span></h5></a>
          <?php }?>
          <a onclick = "rightgen_mycontribution()"><h5 class = "hello" style = "padding-right:10px;"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">collections</i>&nbsp;&nbsp;&nbsp;My Contribution<span  id = "contributioncount1" style='color:#fff;background-color:#62a8ea;padding-left:15px;padding-right:18px;border-radius:200px;float:right;'></span></h5></a>
          <a onclick = "rightgen_upload()" style = "cursor:pointer;color:#D0D3D4;"><h5 class = "hello"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">file_upload</i>&nbsp;&nbsp;&nbsp;Upload</h5></a>
          <a onclick = "rightgen_edit()"><h5 class = "hello"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">settings</i>&nbsp;&nbsp;&nbsp;Edit Profile</h5></a>
          <a onclick = "rightgen_feedback()"><h5 class = "hello"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">forum</i>&nbsp;&nbsp;&nbsp;Feedback</h5></a>
          <a style = "cursor:pointer;color:#D0D3D4;" href = "/logout"><h5 class = "hello"><i style = "color:white;background-color:#62a8ea; border-radius:100%;font-size:15px;border:solid #62a8ea 5px;" class="small material-icons">first_page</i>&nbsp;&nbsp;&nbsp;Logout</h5></a>
     	</ul><center>
          <div id = "approvals1" style = "display:none;">
          	<h3>Posts For Approval</h3>
            <?php echo $pending_post;?>
          </div>
          <div id = "mycontribution1" style = "display:none;">
          	<h3>My Contribution</h3>
            <?php echo $my_posts;?>
          </div>
          <div id = "upload_form1" style = "display:none;">
            <h3>Contribute</h3>
            <form name = "createpost5" id = 'createpost5' action = 'createpost.php' method = 'post' enctype="multipart/form-data" style="width: 100%;" >
              <span class="input input--jiro">
                <input name = "name" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="text" id="input-11" required>
                <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
                  <span class="input__label-content input__label-content--jiro">Post Name</span>
                </label>
              </span>
              <span class="input input--jiro">
                <textarea name = "description" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="text" id="input-11" required></textarea>
                <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
                  <span class="input__label-content input__label-content--jiro">Description</span>
                </label>
              </span>
              <select name = "branch" style="border:none;margin-bottom: 15px;width:92%;" class="input-box" required>
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
          <select name = "year" style="border:none;margin-bottom: 15px;width:92%;" class="input-box" required>
            <option>Select Year</option>
            <option value = "2016">2017</option>
            <option value = "2016">2016</option>
            <option value = "2015">2015</option>
          </select><br>
          <label for="pdf3" class="button-small" style="font-size:15px;cursor:pointer;"><img src = '/assets/icon/upload.svg' style="width:50px;"><input id="pdf3" name="file" type = "file"  required/> Choose File</label>
          </img><br>
          <button style="width:92%;border-radius: 4px;">Submit</button>
            </form><br><br>
            <span id = "hello7" style="color: red;font-size: 15px;"></span>
          </div></center>
          <div id = "feedback1" style = "display:none;">
            <center>
              <h4>Support / Feedback</h4>
            <form name = "feedback_form" action = "about/contactus.php" method = "get">
              <span class="input input--jiro">
          <input name = "name" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="text" required>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Name</span>
          </label>
      </span>
      <span class="input input--jiro">
          <input name = "email" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="email" id="input-11" required>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Email</span>
          </label>
      </span>
      <span class="input input--jiro">
          <textarea name = "message" style = "font-size:12px;border:none;" class="input__field input__field--jiro" required></textarea>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Message</span>
          </label>
      </span><br><br>
      <input type = "checkbox" name = "checkbox">&nbsp;you agree to semcrack's <a href="/termsandcondition" class="link" style="font-size: 12px;">Terms of Service and<br> Privacy Policy.</a></label>
      <br><br>
      <button style = "border-radius:3px;width:92%;">Send</button><span id = "hello5" style="color: red;font-size: 15px;"></span>

            </form>
          </center>
          </div>
          <div id = "editform1" style = "display:none;">
            <center><h3>Edit Profile</h3><form name = "editprofile" action = 'settings.php' method = 'post'><input type = "text" name = "check" style = "display:none" value = "editprofile"><span class='input input--jiro'><input name = 'name' style = 'font-size:12px;border:none;' value = '<?php echo $_SESSION['usr_name'];?>' class='input__field input__field--jiro' type='name' id='input-11' required><label style = 'font-size:12px; padding-bottom:20px;' class='input__label input__label--jiro' for='input-11'><span class='input__label-content input__label-content--jiro'>Name</span></label></span><span class='input input--jiro'><input name = 'email' style = 'font-size:12px;border:none;' class='input__field input__field--jiro' value = '<?php echo $_SESSION['usr_email'];?>' type='email' id='input-11' required><label style = 'font-size:12px; padding-bottom:20px;' class='input__label input__label--jiro' for='input-11'><span class='input__label-content input__label-content--jiro'>Email</span></label></span><br><br><button style = 'border-radius:3px;width:93%;'>Update</button><br><span id = "hello3" style="color: red;font-size: 15px;"></span></form><form name = "changepassword" action = 'settings.php' method = 'post'><input type = "text" name = "check" style = "display:none" value = "changepassword"><span class='input input--jiro'><input name = 'currentpassword' style = 'font-size:12px;border:none;' class='input__field input__field--jiro' type='password' id='input-11' required><label style = 'font-size:12px; padding-bottom:20px;' class='input__label input__label--jiro' for='input-11'><span class='input__label-content input__label-content--jiro'>Current Password</span></label></span><span class='input input--jiro'><input name = 'password' style = 'font-size:12px;border:none;' class='input__field input__field--jiro' type='password' id='input-11' required><label style = 'font-size:12px; padding-bottom:20px;' class='input__label input__label--jiro' for='input-11'><span class='input__label-content input__label-content--jiro'>New Password</span></label></span><span class='input input--jiro'><input name = 'cpassword' style = 'font-size:12px;border:none;' class='input__field input__field--jiro' type='password' id='input-11' required><label style = 'font-size:12px; padding-bottom:20px;' class='input__label input__label--jiro' for='input-11'><span class='input__label-content input__label-content--jiro'>Confirm Password</span></label></span><br><br><button style = 'border-radius:3px;width:93%;'>Update</button><br><span id = "hello4" style="color: red;font-size: 15px;"></span></form></center>
          </div>
    </section>
  </body>
         <script>
          function rightgen_approval(){
            document.getElementById("mycontribution").style.display = "none";
            document.getElementById("upload_form").style.display = "none";
            document.getElementById("editform").style.display = "none";
            document.getElementById("feedback").style.display = "none";
            document.getElementById("approvals").style = "";
            document.getElementById("mycontribution1").style.display = "none";
            document.getElementById("upload_form1").style.display = "none";
            document.getElementById("editform1").style.display = "none";
            document.getElementById("feedback1").style.display = "none";
            document.getElementById("approvals1").style = "";
          }
          function rightgen_mycontribution(){
            document.getElementById("upload_form").style.display = "none";
            document.getElementById("editform").style.display = "none";
            document.getElementById("feedback").style.display = "none";
            document.getElementById("approvals").style.display = "none";
            document.getElementById("mycontribution").style = "";
            document.getElementById("upload_form1").style.display = "none";
            document.getElementById("editform1").style.display = "none";
            document.getElementById("feedback1").style.display = "none";
            document.getElementById("approvals1").style.display = "none";
            document.getElementById("mycontribution1").style = "";
          }
          function rightgen_upload(){
            document.getElementById("editform").style.display = "none";
            document.getElementById("feedback").style.display = "none";
            document.getElementById("approvals").style.display = "none";
            document.getElementById("mycontribution").style.display = "none";
            document.getElementById("upload_form").style = "";
            document.getElementById("editform1").style.display = "none";
            document.getElementById("feedback1").style.display = "none";
            document.getElementById("approvals1").style.display = "none";
            document.getElementById("mycontribution1").style.display = "none";
            document.getElementById("upload_form1").style = "";
          }
          function rightgen_edit(){
            document.getElementById("feedback").style.display = "none";
            document.getElementById("approvals").style.display = "none";
            document.getElementById("mycontribution").style.display = "none";
            document.getElementById("upload_form").style.display = "none";
            document.getElementById("editform").style = "";
            document.getElementById("feedback1").style.display = "none";
            document.getElementById("approvals1").style.display = "none";
            document.getElementById("mycontribution1").style.display = "none";
            document.getElementById("upload_form1").style.display = "none";
            document.getElementById("editform1").style = "";
          }
          function rightgen_feedback(){
            document.getElementById("approvals").style.display = "none";
            document.getElementById("mycontribution").style.display = "none";
            document.getElementById("upload_form").style.display = "none";
            document.getElementById("editform").style.display = "none";
            document.getElementById("feedback").style = "";
            document.getElementById("approvals1").style.display = "none";
            document.getElementById("mycontribution1").style.display = "none";
            document.getElementById("upload_form1").style.display = "none";
            document.getElementById("editform1").style.display = "none";
            document.getElementById("feedback1").style = "";
          }
        </script>
   <!-- /container -->
   <?php if($_SESSION['usr_status'] == 'admin'){?>
    <script>
      rightgen_approval();
    </script>
  <?php } else{?>
  <script>
      rightgen_mycontribution();
    </script>
  <?php }?>
    <script src="js/classie.js"></script>
    <script>
   $(".button-collapse9").sideNav();
     $('.button-collapse9').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );

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
        [].slice.call( document.querySelectorAll( "textarea.input__field" ) ).forEach( function( inputEl ) {
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

      $('form[name=editprofile]').submit(function(e) {
      e.preventDefault();
       $.ajax({
        type:this.method,
        url: this.action,
        data: $(this).serialize(),
        success: function(response) {
              document.getElementById('hello').innerHTML = response;
              document.getElementById('hello3').innerHTML = response;
        }
    });
});
      $('form[name=createpost5]').submit(function(e) {
      e.preventDefault();
      var form1 = $('#createpost5')[0];
      var data1 = new FormData(form1);
       $.ajax({
        type:this.method,
        enctype:'multipart/form-data',
        processData:false,
        contentType:false,
        url: this.action,
        data: data1,
        success: function(response) {
              $('#hello7').html(response);
        }
    });
});

      $('form[name=createpost]').submit(function(e) {
      e.preventDefault();
      var form = $('#createpost')[0];
      var data = new FormData(form);
       $.ajax({
        type:this.method,
        enctype:'multipart/form-data',
        processData:false,
        contentType:false,
        url: this.action,
        data: data,
        success: function(response) {
              $('#hello8').html(response);
        }
    });
});

      $('form[name=changepassword]').submit(function(e) {
      e.preventDefault();
       $.ajax({
        type:this.method,
        url: this.action,
        data: $(this).serialize(),
        success: function(response) {
          if(response == "Relogin to see changes"){
            window.location.href = "/logout";
          }
          else{
          document.getElementById("hello1").innerHTML = response;
          document.getElementById('hello4').innerHTML = response;
        }
        }
    });
});
      $('form[name=feedback_form]').submit(function(e) {
      e.preventDefault();
       $.ajax({
        type:this.method,
        url: this.action,
        data: $(this).serialize(),
        success: function(response) {
          console.log(response);
          document.getElementById("hello2").innerHTML = response;
          document.getElementById('hello5').innerHTML = response;
        }
    });
});
      $.ajax({
      	type:'post',
      	url: 'getcontribution.php',
      	data: ({check:'getcontributioncount',name:'<?php echo $_SESSION['usr_name'];?>'}),
      	success:function(response){
      		document.getElementById('contributioncount').innerHTML = response;
      		document.getElementById('contributioncount1').innerHTML = response;
      	}
      });
      $.ajax({
      	type:'post',
      	url: 'getcontribution.php',
      	data: ({check:'getpendingpostcount'}),
      	success:function(response){
      		document.getElementById('pendingpostcount').innerHTML = response;
      		document.getElementById('pendingpostcount1').innerHTML = response;
      	}
      });
    </script>
</head>
</html>