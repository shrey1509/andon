<?php
    session_start();
    if(isset($_SESSION['userid'])) {
        include 'resources/connect.php';
        $tableName = "employee";
        $tableName2 = "variant";
        $id = $_SESSION['userid'];
        $op = $_SESSION['usergroup'];
        $line = $_SESSION['line'];
        $station = $_SESSION['station'];
        $variant = $_SESSION['variant'];
        $serial = $_SESSION['serial'];
        $sql = "SELECT * FROM $tableName WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $min = $_SESSION['min'];
        $sec = $_SESSION['sec'];
            
        
        
        
        // $sql2 = "SELECT DISTINCT variant FROM $tableName2";
        // $result2 = $conn->query($sql2);
        // $sql3 = "SELECT DISTINCT variant FROM $tableName2";
        // $result3 = $conn->query($sql3);
        // $sql4 = "SELECT DISTINCT variant FROM $tableName2";
        // $result4 = $conn->query($sql4);
        // $sql5 = "SELECT DISTINCT variant FROM $tableName2";
        // $result5 = $conn->query($sql5);
        // $sql6 = "SELECT DISTINCT variant FROM $tableName2";
        // $result6 = $conn->query($sql6);
        // $sql7 = "SELECT DISTINCT variant FROM $tableName2";
        // $result7 = $conn->query($sql7);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Notify</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body style="margin: 0px">

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php
            include 'sidebar.php';
        ?>
        <!-- Page Content  -->
        <div id="content">
            <?php
                include 'header.php';
            ?>
         
            <div class="row">
                <div class="col-sm-12">
                    <div class="maintxt" style="height: 200px;">
                        <h4 class="centered" style="text-align: center;color: white;width: 100%;padding: 0px;font-weight: bold">Andon Management System</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4" style="background-color: #009bcc;height: 50px">
                    <h5 style="padding: 10px;color: white;margin-left: 50px">   Line: <?php echo $line;?>   </h5>
                </div>
                <div class="col-sm-4" style="background-color: #009bcc;height: 50px">
                    <h5 style="padding: 10px;color: white;margin-left: 50px">      Station: <?php echo $station;?></h5>
                </div>
                <div class="col-sm-4" style="background-color: #009bcc;height: 50px">
                    <h5 style="padding: 10px;color: white;margin-left: 50px">      Variant: <?php echo $variant." #".$serial;?></h5>
                </div>
            </div>

            <form action="notifyStaff.php" method="POST" id="opForm">
                <div class="row" style="margin-top: 50px;margin-left: 50px">
                    <div class="col-sm-4" style="height: 50px">
                        <div>
                            <h5 style="border-radius: 20px;background-color: #009bcc;color: white;width: 200px;text-align: center;padding: 5px">Supply chain</h5>
                            <select class="form-control" id="scSel" name="sc" style="width: 200px;border-radius: 20px">
                                <option value="">Select Reason</option>
                                <option>sc1</option>
                                <option>sc2</option>
                                <option>sc3</option>
                              
                            </select>

                        </div>

                    </div>
                    <div class="col-sm-4" style="height: 50px">
                        <div>
                            <h5 style="border-radius: 20px;background-color: #009bcc;color: white;width: 200px;text-align: center;padding: 5px">Maintainence</h5>
                            <select class="form-control" id="mSel" name="m" style="width: 200px;border-radius: 20px">
                                <option value="">Select Reason</option>
                                <option>m1</option>
                                <option>m2</option>
                                <option>m3</option>
                              
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-4" style="height: 50px">
                        <div>
                            <h5 style="border-radius: 20px;background-color: #009bcc;color: white;width: 200px;text-align: center;padding: 5px">Production</h5>
                            <select class="form-control" id="pSel" name="p" style="width: 200px;border-radius: 20px">
                                <option value="">Select Reason</option> 
                                <option>p1</option>
                                <option>p2</option>
                                <option>p3</option>
                                
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row" style="margin-top: 75px;margin-left: 50px">
                    <div class="col-sm-4" style="height: 50px">
                        <div>
                            <h5 style="border-radius: 20px;background-color: #009bcc;color: white;width: 200px;text-align: center;padding: 5px">Store</h5>
                            <select class="form-control" id="sSel" name="s" style="width: 200px;border-radius: 20px">
                                <option value="">Select Reason</option>
                                <option>s1</option>
                                <option>s2</option>
                                <option>s3</option>
                                
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-4" style="height: 50px">
                        <div>
                            <h5 style="border-radius: 20px;background-color: #009bcc;color: white;width: 200px;text-align: center;padding: 5px">Quality</h5>
                            <select class="form-control" id="qSel" name="q" style="width: 200px;border-radius: 20px">
                                <option value="">Select Reason</option>
                                <option>q1</option>
                                <option>q2</option>
                                <option>q3</option>
                                
                            </select>
                        </div>

                    </div>
                    <div class="col-sm-4" style="height: 50px">
                        <div>
                            <h5 style="border-radius: 20px;background-color: #009bcc;color: white;width: 200px;text-align: center;padding: 5px">Methods</h5>
                            <select class="form-control" id="mtSel" name="mt" style="width: 200px;border-radius: 20px">
                                <option value="">Select Reason</option>
                                <option>mt1</option>
                                <option>mt2</option>
                                <option>mt3</option>
                             
                            </select>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="input-group mb-3 col-sm-12 d-flex justify-content-center" style=";margin-top: 75px;">
                        <input class="btn btn-danger" type="button" onclick="validateAndSubmit();" value="Notify Andon" style="padding: 10px;border-radius: 50px">
                    </div>
                </div>
            </form>

            

            
         
            

        </div>
    </div>

    <footer style="background-color: #2596be;height: 50px;">
        <section style="background-color: grey; height: 30px;"></section>
    </footer>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {


            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
        $('#logoutButton').on('click', logout);

        function logout() {
            window.location.assign("logout.php");
        }

        function validate(scSel,mSel,pSel,sSel,qSel,mtSel) {
          var flag = 0;

          if(scSel === "" && mSel === "" && pSel === "" && sSel === "" && qSel === "" && mtSel === "") {
            alert("Select at least one andon to raise!");
            
            
          } else {
            flag = 1;
            
          }

          
            console.log(flag);
          return flag;

        }

        function validateAndSubmit() {
          var scSel = document.getElementById('scSel').value
          var mSel = document.getElementById('mSel').value
          var pSel = document.getElementById('pSel').value
          var sSel = document.getElementById('sSel').value
          var qSel = document.getElementById('qSel').value
          var mtSel = document.getElementById('mtSel').value
          var form = document.getElementById('opForm')
          if(validate(scSel,mSel,pSel,sSel,qSel,mtSel) == 1) {

            form.submit();
          }
        }

        window.onload = () => {
          let hour = document.getElementById("hour").innerHTML;
          let minute = document.getElementById("minute").innerHTML;
          let seconds = document.getElementById("seconds").innerHTML;
          let totalSeconds = document.getElementById("seconds").innerHTML;;
          let intervalId = null;

          document.getElementById("clk").style.display = 'block';

        intervalId = setInterval(startTimer, 1000);
          function startTimer() {
            ++totalSeconds;
            hour = Math.floor(totalSeconds / 3600);
            minute = Math.floor((totalSeconds - hour * 3600) / 60);
            seconds = totalSeconds - (hour * 3600 + minute * 60);

            document.getElementById("hour").innerHTML = hour;
            document.getElementById("minute").innerHTML = minute;
            document.getElementById("seconds").innerHTML = seconds;
          }

          

          // document.getElementById('Displaytimetaken').addEventListener('click', () => {
          //   document.getElementById("timetaken").innerHTML = minute + "minutes" + seconds + "seconds";
          //   reset();
          // });

          // function reset() {
          //   totalSeconds = 0;
          //   document.getElementById("hour").innerHTML = '0';
          //   document.getElementById("minute").innerHTML = '0';
          //   document.getElementById("seconds").innerHTML = '0';
          // }

        }




    </script>

</body>

</html>

<?php
    } else {
        header("Location: login.php");
    }
?>