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
  
  background: url('../images/machine.jpg');
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
        <div class="overlay" style="width: 100%">
          <div class="row" style="padding: 0px 15px 0px 15px;">
            <div class="col-sm-4" style="background-color: #eee;"></div>
            <div class="col-sm-4 " style="background-color: #eee">
              <img src="../images/logo.png" class="img-rounded" style="height: 50px;width: 100%"> 

            </div>
            <div class="col-sm-4" style="background-color: #eee"></div>
          </div>
          <form action="compareOTP.php" method="POST" id="loginForm">
             <div class="row" style="width: 100%;margin-top: 20px">
              <div class="col-sm-1"></div>
              <div class="col-sm-10 center" >
                <div class="form-group">
                  <label for="username" style="color: white;font-weight: bold;">Enter OTP:</label>
                  <input type="text" id="otp" autocomplete="off" class="form-control round" placeholder="Check your Mail for OTP" name="otp">
                  <div class="invalid-feedback" style="font-weight: bold;">Check your email for OTP</div>
                </div>
              </div>
              <div class="col-sm-1"></div>
            </div>

            <div class="row" >
              <div class="col-sm-2"></div>
              <div class="col-sm-8 center" >
                <div class="input-group mb-3" style="justify-content: center; margin: auto;">
                  <input class="round btn btn-light" type="button" value="Submit" onclick="alert1();">
                </div>
              </div>
              <div class="col-sm-2"></div>
            </div>

            <div class="row" >
              <div class="col-sm-2"></div>
              <div class="col-sm-8  center" >
                <div class="input-group mb-3" style="justify-content: center; margin: auto;" >
                  <a href="#" style="color: white;text-align: center;">Resend OTP</a>
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
    
    // function validateAndSubmit() {
    //   var usergroup = document.getElementById('usergroup').value
    //   var username = document.getElementById('username').value
    //   var password = document.getElementById('password').value
    //   var form = document.getElementById('loginForm')
    //   if(validate(usergroup, username, password) == 1) {
    //     form.submit();
    //   }
    // }
    let fm= document.getElementById('loginForm');

    function alert1()
    {
      var otp=document.getElementById('otp').value;
      if(otp==="" && otp.length==0)
      {
        $("#otp").addClass("is-invalid");
      }
      else
      {
        $("#otp").removeClass("is-invalid");
        fm.submit();
      }
      
      
    }

  </script>
</body>
</html>