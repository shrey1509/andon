<?php
    session_start();
    if(isset($_SESSION['status'])) {
      if($_SESSION['status']==1)
      {
        echo '<script>alert("Email has been verified");</script>';
      }
      else if($_SESSION['status']==2)
      {
        echo '<script>alert("Password has been reset");</script>';
      }
      unset($_SESSION['status']);
    }
        
?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <style type="text/css">
    footer {
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
}
.background{
  
  background: url('machine.jpg');
  background-size: cover;
  
}
.overlay{
  width: 100%;
  background-color: rgba(37, 150, 190, 0.75);
}

.round {border-radius: 20px;}
.shad{
  box-shadow: 10px 10px 8px #888888;
  }
  
.center {
  margin: auto;
  width: 100%;
 
}
</style>

</head>
<body>

  <!-- Header -->
  <header style="background-color: grey;height: 50px;">
    <section style="background-color: #2596be; height: 30px;"></section>
  </header>

  <!-- Login Container -->
  <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 background shad " style="padding: 0px;">
        <div class="overlay" style="width: 100%;height: 100%">
          <div class="row" style="padding: 0px 15px 0px 15px;">
            <div class="col-sm-4" style="background-color: #eee;"></div>
            <div class="col-sm-4 " style="background-color: #eee">
              <img src="logo.png" class="img-rounded" style="height: 50px;width: 100%"> 

            </div>
            <div class="col-sm-4" style="background-color: #eee"></div>
          </div>
          <form action="checkLogin.php" method="POST" id="loginForm">
            <div class="row" style="margin-top: 20px;width:100%">
              <div class="col-sm-1"></div>
              <div class="col-sm-10 center">
                <div class="form-group">
                  <label for="usergroup" style="color: white;font-weight: bold">Choose Position:</label>
                  <select class="form-control round" id="usergroup" name="usergroup">
                    <option value="" disabled selected="true">Select Position</option>  
                    <option value="operator">Operator</option>
                    <option value="floor manager">Floor Manager</option>
                    <option value="admin">Admin</option>
                  </select>
                  <div class="invalid-feedback" style="font-weight: bold;">Choose user group to Log in.</div>
                </div> 
              </div>
              <div class="col-sm-1"></div>
            </div>

            <div class="row" style="width: 100%">
              <div class="col-sm-1"></div>
              <div class="col-sm-10 center" >
                <div class="form-group">
                  <label for="username" style="color: white;font-weight: bold;">Username:</label>
                  <input type="text" id="username" autocomplete="off" class="form-control round" placeholder="Username" name="username">
                  <div class="invalid-feedback" style="font-weight: bold;">Enter username to Log in.</div>
                </div>
              </div>
              <div class="col-sm-1"></div>
            </div>

            <div class="row" style="width: 100%">
              <div class="col-sm-1 col-md-1 "></div>
              <div class="col-sm-10 col-md-10 center " >
                <div class="form-group">
                  <label for="password" style="color: white;font-weight: bold;">Password:</label>
                  <input type="password" id="password" autocomplete="off" class="form-control round" placeholder="Password" name="password">
                  <div class="invalid-feedback" style="font-weight: bold;">Enter password to Log in.</div>
                </div>
              </div>
              <div class="col-sm-1 col-md-1 "></div>
            </div>

            <div class="row" >
              <div class="col-sm-2"></div>
              <div class="col-sm-8 center" >
                <div class="input-group mb-3" style="justify-content: center; margin: auto;">
                  <input class="round btn btn-light" type="button" value="Sign In" onclick="validateAndSubmit();">
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>

            <div class="row" >
              <div class="col-sm-2"></div>
              <div class="col-sm-8  center" >
                <div class="input-group mb-3" style="justify-content: center; margin: auto;" >
                  <a href="resetEmail.php" style="color: white;text-align: center;">Forgot Password</a>
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>

            <div class="row" >
              <div class="col-sm-2"></div>
              <div class="col-sm-8 center" >
                <div class="input-group mb-3" style="justify-content: center; margin: auto;">
                  <a href="checkMail.php" style="color: white;text-align: center;">Sign Up</a>
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-sm-4"></div>
    </div>
  </div>
  
  <!-- Footer -->
  <footer style="background-color: #2596be;height: 50px;">
    <section style="background-color: grey; height: 30px;"></section>
  </footer>


  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <script type="text/javascript">
    

    function validate(usergroup, username, password) {
      var flag = 1;

      if(usergroup === "" && usergroup.length == 0) {
        flag = 0;
        $("#usergroup").addClass("is-invalid");
        return flag;
      } else {
        flag = 1;
        $("#usergroup").removeClass("is-invalid");
      }

      if(username === "" && username.length == 0) {
        flag = 0;
        $("#username").addClass("is-invalid");
        return flag;
      } else {
        flag = 1;
        $("#username").removeClass("is-invalid");
      }

      if(password === "" && password.length == 0) {
        flag = 0;
        $("#password").addClass("is-invalid");
        return flag;
      } else {
        flag = 1;
        $("#password").removeClass("is-invalid");
      }      
      return flag;
    }
    
    function validateAndSubmit() {
      var usergroup = document.getElementById('usergroup').value
      var username = document.getElementById('username').value
      var password = document.getElementById('password').value
      var form = document.getElementById('loginForm')
      if(validate(usergroup, username, password) == 1) {
        form.submit();
      }
    }

  </script>
</body>
</html>