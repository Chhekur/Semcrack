<script type="text/javascript" src = "/js/materialize.js"></script>
<link rel = "stylesheet" href = "/css/set1.css"></link>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<nav class = "nav-bar">
  <style>
    .button-small {
  font-size: 1rem;
  height: 2.8rem;
  line-height: 2.8rem;
  padding: 0 1.5rem;
}

.side-nav {
  position: fixed;
  width: 300px;
  left: 0;
  top: 0;
  margin: 0;
  -webkit-transform: translateX(-100%);
          transform: translateX(-100%);
  height: 100%;
  height: calc(100% + 60px);
  height: -moz-calc(100%);
  padding-bottom: 60px;
  background-color: #fff;
  z-index: 999;
  overflow-y: auto;
  will-change: transform;
  -webkit-backface-visibility: hidden;
          backface-visibility: hidden;
  -webkit-transform: translateX(-105%);
          transform: translateX(-105%);
}

.side-nav.right-aligned {
  right: 0;
  -webkit-transform: translateX(105%);
          transform: translateX(105%);
  left: auto;
  -webkit-transform: translateX(100%);
          transform: translateX(100%);
}

.side-nav .collapsible {
  margin: 0;
}

.side-nav li {
  float: none;
  line-height: 48px;
}

.side-nav li.active {
  background-color: rgba(0, 0, 0, 0.05);
}

.side-nav li > a {
  color: rgba(0, 0, 0, 0.87);
  display: block;
  font-size: 14px;
  font-weight: 500;
  height: 48px;
  line-height: 48px;
  padding: 0 32px;
}

.side-nav li > a:hover {
  background-color: rgba(0, 0, 0, 0.05);
}

.side-nav li > a.btn, .side-nav li > a.btn-large, .side-nav li > a.btn-large, .side-nav li > a.btn-flat, .side-nav li > a.btn-floating {
  margin: 10px 15px;
}

.side-nav li > a.btn, .side-nav li > a.btn-large, .side-nav li > a.btn-large, .side-nav li > a.btn-floating {
  color: #fff;
}

.side-nav li > a.btn-flat {
  color: #343434;
}

.side-nav li > a.btn:hover, .side-nav li > a.btn-large:hover, .side-nav li > a.btn-large:hover {
  background-color: #2bbbad;
}

.side-nav li > a.btn-floating:hover {
  background-color: #26a69a;
}

.side-nav li > a > i,
.side-nav li > a > [class^="mdi-"], .side-nav li > a li > a > [class*="mdi-"],
.side-nav li > a > i.material-icons {
  float: left;
  height: 48px;
  line-height: 48px;
  margin: 0 32px 0 0;
  width: 24px;
  color: rgba(0, 0, 0, 0.54);
}

.side-nav .divider {
  margin: 8px 0 0 0;
}

.side-nav .subheader {
  cursor: initial;
  pointer-events: none;
  color: rgba(0, 0, 0, 0.54);
  font-size: 14px;
  font-weight: 500;
  line-height: 48px;
}

.side-nav .subheader:hover {
  background-color: transparent;
}

.side-nav .user-view,
.side-nav .userView {
  position: relative;
  padding: 32px 32px 0;
  margin-bottom: 8px;
}

.side-nav .user-view > a,
.side-nav .userView > a {
  height: auto;
  padding: 0;
}

.side-nav .user-view > a:hover,
.side-nav .userView > a:hover {
  background-color: transparent;
}

.side-nav .user-view .background,
.side-nav .userView .background {
  overflow: hidden;
  position: absolute;
  top: 0;
  right: 0;
  bottom: 0;
  left: 0;
  z-index: -1;
}

.side-nav .user-view .circle, .side-nav .user-view .name, .side-nav .user-view .email,
.side-nav .userView .circle,
.side-nav .userView .name,
.side-nav .userView .email {
  display: block;
}

.side-nav .user-view .circle,
.side-nav .userView .circle {
  height: 64px;
  width: 64px;
}

.side-nav .user-view .name,
.side-nav .user-view .email,
.side-nav .userView .name,
.side-nav .userView .email {
  font-size: 14px;
  line-height: 24px;
}

.side-nav .user-view .name,
.side-nav .userView .name {
  margin-top: 16px;
  font-weight: 500;
}

.side-nav .user-view .email,
.side-nav .userView .email {
  padding-bottom: 16px;
  font-weight: 400;
}


.side-nav .collapsible-body > ul:not(.collapsible) > li.active a,
.side-nav.fixed .collapsible-body > ul:not(.collapsible) > li.active a {
  color: #fff;
}

.side-nav .collapsible-body {
  padding: 0;
}

#sidenav-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  height: 120vh;
  background-color: rgba(0, 0, 0, 0.5);
  z-index: 997;
  will-change: opacity;
}
  </style>

  <!-- Side nav  -->
  <ul id="slide-out" class="side-nav">
  <a style= "float:right; margin-right:10px;" href="#"><i style ="margin-top: 10px;" class=" material-icons">close</i></a>
    <form name = "signin" action = "signin.php" method = "POST" style = "margin-top:100px;">
    <h4 style = "margin-left:15px;margin-bottom:-5px;">Login</h4>
    <center>
    <span class="input input--jiro">
          <input name = "email" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="email" id="input-11" required>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Email</span>
          </label>
      </span>
      <span class="input input--jiro">
          <input name = "password" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="password" id="input-11" required>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Password</span>
          </label>
      </span>
      <a style = "float:right;color:#62a8ea; font-size:12px;"  href="#" data-activates="slide-out2" class="button-collapse2">Forgot password?</a><br><br><br>
      <button style = "border-radius:3px;width:92%;">Log in</button><br><br>
      <p style = "font-size:12px;">Still no account? Please go to <a style="color:#62a8ea;font-size:16px;cursor:pointer;"  href="#" data-activates="slide-out1" class="button-collapse1">Sign up</a></p><br>
      <span id = "error" style="color: red;font-size: 15px;"></span>
    </center>
  </form>
  </ul>
        <!--     -->
        <?php if(isset($_SESSION['usr_id'])){?>
        <!-- user Side nav  -->
   <ul id="slide-out5" class="side-nav" style="list-style: none;">
    <li><div class="user-view">
      <div class="background">
        <img src = "/assets/home.jpg">
      </div>
      <a href="#!user"><img id = "user1" class="circle" style="border-radius: 100%;" src = "/assets/img/usr/<?php echo $_SESSION['usr_id'];?>.jpg" onError="this.onerror=null;this.src= '/assets/img/usr/sample.png';"></a>
      <a href="#!name"><span id = "user_name" class="white-text name" style="color:white;"><?php echo $_SESSION['usr_name'];?></span></a>
      <a href="#!email"><span id = "user_email" class="white-text email" style="color:white;"><?php echo $_SESSION['usr_email'];?></span></a>
    </div></li>
    <li><a href="/"><i class="material-icons">home</i>Home</a></li>
    <li><a href="/profile"><i class="material-icons">person_outline</i>Profile</a></li>
    <li><a href="/topcontributors"><i class="material-icons">star_border</i>Top Contributors</a></li>
    <li><a href="/about"><i class="material-icons">information</i>About</a></li>
    <li><a href='/logout' style="cursor: pointer;color:rgba(0, 0, 0, 0.87);"><i class="material-icons">undo</i>Logout</a></li>
  </ul><?php }?>
        <!--     -->
          <!-- Side nav  -->
  <ul id="slide-out1" class="side-nav">
  <a style= "float:right; margin-right:10px;" href="#"><i style ="margin-top: 10px;" class=" material-icons">close</i></a>
    <form name = "signup" action = "signup.php" method = "POST" style = "margin-top:50px;">
    <h4 style = "margin-left:15px;margin-bottom:-5px;">Sign up</h4>
    <center>
    <span class="input input--jiro">
          <input name = "name" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="name" id="input-11" required>
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
          <input name = "password" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="password" id="input-11" required>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Password</span>
          </label>
      </span>
      <span class="input input--jiro">
          <input name = "cpassword" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="password" id="input-11" required>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Confirm Password</span>
          </label>
      </span>
      <p style="margin-left: 5px;"><input name = "checkbox" style = "font-size:12px;border:none;" type="checkbox" required>&nbsp;&nbsp;you agree to semcrack's Terms of Service and Privacy Policy.</p>
      <br>
      <button style = "border-radius:3px;width:92%;">Sign up</button><br><br>
      <p style = "font-size:12px;">Alredy have an account? Please go to <a style="color:#62a8ea;font-size:16px;cursor:pointer;" >Log in</a></p>
      <span id = "error1" style="color: red;font-size: 15px;"></span>
    </center>
  </form>
  </ul>
        <!--     -->
         <!-- Side nav  -->
  <ul id="slide-out2" class="side-nav">
  <a style= "float:right; margin-right:10px;" href="#"><i style ="margin-top: 10px;" class=" material-icons">close</i></a>
    <form name = "reset" action = "resetlink.php" method = "POST" style = "margin-top:200px;">
    <h4 style = "margin-left:15px;">Forgot your password?

</h4>
    <center>
    <span class="input input--jiro">
          <input name = "email" style = "font-size:12px;border:none;" class="input__field input__field--jiro" type="email" id="input-11" required>
          <label style = "font-size:12px; padding-bottom:20px;" class="input__label input__label--jiro" for="input-11">
            <span class="input__label-content input__label-content--jiro">Email</span>
          </label>
      </span>
      <br><br>
      <button style = "border-radius:3px;width:92%;">Reset Password</button><br><br>
      <br>
      <span id = "error2" style="color: red;font-size: 15px;"></span>
    </center>
  </form>
  </ul>
        <!--     -->
  <div style = "float:right; padding:10px">
  <?php if (isset($_SESSION['usr_id'])){?>
    <a id = 'photo' href="#" data-toggle="popover" data-placement="bottom" data-content="<div style ='float:left;width:100px;'><img style='width:100px; border-radius:50%;' src ='/assets/img/usr/<?php echo $_SESSION['usr_id'];?>.jpg' onError = this.onerror=null;this.src='/assets/img/usr/sample.png'; ><a href='/'><button class='button-small' style='margin-top:25px;'>Home</button></a></div><div style='float:left;padding-left:30px;'><h7><b><?php echo $_SESSION['usr_name'];?></b></h7><br><h7><?php echo $_SESSION['usr_email']?></h7><br><br><a href='/profile'><button class='button-small' style='margin-left:px;'>My Profile</button></a></div></a><br><a href='/logout'><button style='margin-top:30px;float:right;' class='button-small'>Sign out</button></a>" data-html="true"><img class="circle" style="width:50px;border-radius: 50%;" src="/assets/img/usr/<?php echo $_SESSION['usr_id']; ?>.jpg" onError="this.onerror=null;this.src='/assets/img/usr/sample.png';"></a>
    <a data-activates="slide-out5" class="button-collapse5" id = 'photom' href="#" ><img class="circle" style="width:50px;border-radius: 50%;" src="/assets/img/usr/<?php echo $_SESSION['usr_id']; ?>.jpg" onError="this.onerror=null;this.src='/assets/img/usr/sample.png';"></a>
    <?php } else{?>
      <a style= "float:right; margin-right:10px;" href="#" data-activates="slide-out" class="button-collapse"><i style = "font-size:35px;" class="large material-icons">menu</i></a>
    <?php }?>
  </div>
  <a href = "/"><img class = "logo" style = "margin-top:10px;float:left; margin-left:10px;width: 100px;" src = "/assets/logo.png"/></a>
</nav>
 <script>
$(document).ready(function(){
    $('[data-toggle="popover"]').popover(); 
});
</script>
<style>
    .popover{
      padding-top: 20px;
      height: 200px;
      font-size: 15px;
      box-shadow: 0 3px 15px 0 rgba(0,0,0,0.2), 0 0 0 1px rgba(0,0,0,0.08);
      border:none;
    }
    @media screen and (min-width: 640px){
      #photom{
        display: none;
      }
    }
    @media screen and (max-width: 640px){
      #photo{
        display: none;
      }
    }
 </style>
 <script>
 $(".button-collapse").sideNav();
     $('.button-collapse').sideNav({
      menuWidth: 360, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
     $(".button-collapse1").sideNav();
     $('.button-collapse1').sideNav({
      menuWidth: 360, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
     $(".button-collapse2").sideNav();
     $('.button-collapse2').sideNav({
      menuWidth: 360, // Default is 300
      edge: 'right', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    }
  );
     $(".button-collapse5").sideNav();
     $('.button-collapse5').sideNav({
      menuWidth: 300, // Default is 300
      edge: 'left', // Choose the horizontal origin
      closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
      draggable: true // Choose whether you can drag to open on touch screens
    });
   </script>
  <!-- /container -->
    <script src="/js/classie.js"></script>
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