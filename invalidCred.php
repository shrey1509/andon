<!DOCTYPE html>
<html>
<head>
  <title>Andon System</title>
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

  <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-sm-4"></div>
      <div class="col-sm-4 background shad " style="padding: 0px;">
        <div class="overlay" style="width: 100%">
          <div class="row" style="padding: 0px 15px 0px 15px;">
            <div class="col-sm-4" style="background-color: #eee;"></div>
            <div class="col-sm-4 " style="background-color: #eee">
              <img src="logo.png" class="img-rounded" style="height: 50px;width: 100%"> 

            </div>
            <div class="col-sm-4" style="background-color: #eee"></div>
          </div>
          <div class="row" >
            <div class="col-sm-2"></div>
            <div class="col-sm-8  center" >
              <div class="card card-body bg-light" style="margin-top: 20px;">Invalid Credentials. <a href="login.html">Login Again.</a></div>
              <div class="input-group mb-3" style="justify-content: center; margin: auto;" >
                <a href="#" style="color: white;text-align: center;">Forgot Password</a>
              </div>
            </div>
            <div class="col-sm-2"></div>
          </div>

          <div class="row" >
            <div class="col-sm-2"></div>
            <div class="col-sm-8 center" >
              <div class="input-group mb-3" style="justify-content: center; margin: auto;">
                <a href="#" style="color: white;text-align: center;">Sign Up</a>
              </div>
            </div>
            <div class="col-sm-2"></div>
          </div>
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

</body>
</html>