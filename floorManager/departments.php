<?php
    session_start();
    if(isset($_SESSION['userid'])) {
        include '../resources/connect.php';
        $tableName = "employee";
        $id = $_SESSION['userid'];
        $op = $_SESSION['usergroup'];
        $sql = "SELECT * FROM $tableName WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        // print_r($result2);

        $tableName2 = "line";
        $sql2 = "SELECT * FROM $tableName2";
        $result2 = $conn->query($sql2);

        $tableNameStation = "station";
        $stationSql = "SELECT * FROM $tableNameStation";
        $resultStation = $conn->query($stationSql);
        $sc = 'Supply Chain';
        $m = 'Maintainence';
        $p = 'Production';
        $st = 'Store';
        $q = 'Quality';
        $mt = 'Methods';
        $scCount=0;
        $mCount=0;
        $pCount=0;
        $stCount=0;
        $qCount=0;
        $mtCount=0;

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="refresh" content="15">

    <title>Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/style2.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style type="text/css">
        .formContainerAdmin{
            border: 2px solid black;
            border-radius: 10%; 
            /*height: 200px; */
            margin: 10px;
            padding: 30px;
        }

        #wrapper {
              width: 100%; 
              height: 270px; 
              overflow-x: scroll;
              white-space:no-wrap;
              margin: auto;
          }
          .table {
              display:table;
          }
          .tr {
              display:table-row;
          }
          .td {
              display:table-cell;
          }
          .circleGreen {
              background-color: green;
              margin:5px;
              width:55px;
              height:55px;
              border-radius: 50%;
              border:2px solid black;
          }

          .circleRed {
              background-color: red;
              margin:5px;
              width:55px;
              height:55px;
              border-radius: 50%;
              border:2px solid black;
          }
          .circleDept {
              background-color: blue;
              margin-top:50px;
              margin-bottom: 20px;
              margin-left: 20px;
              width:120px;
              height:120px;
              border-radius: 50%;
              position: relative;
              border:2px solid black;
          }
          .circleSolved {
              background-color: green;
              margin-left:75px;
              margin-top: 65px;
              width:55px;
              height:55px;
              border-radius: 50%;
              border:2px solid black;
              position: absolute;
          }
          .circleUnsolved {
              background-color: red;
              margin-left:75px;

              width:55px;
              height:55px;
              border:2px solid black;
              border-radius: 50%;
              position: absolute;
          }
    </style>
</head>
<body style="margin: 0px">

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php
            include '../includables/sidebar.php';
        ?>
        <!-- Page Content  -->
        <div id="content" style="overflow: hidden">
            <?php
                include '../includables/header.php';
            ?>

            <div class="row">
                <div class="col-sm-12">
                    <div class="maintxt" style="height: 200px;">
                        <h4 class="centered" style="text-align: center;color: white;width: 100%;padding: 0px;font-weight: bold">Andon Management System</h4>
                    </div>
                </div>
            </div>


        <div class="row" style="margin: 20px;margin-top: 40px">
            <div class="col-sm-2" style="border: 1px solid grey;text-align: center;">
              <?php 
                      
                      while ($issueRow=$resultStation->fetch_assoc()) {
                        
                        if ($issueRow['issuePresent']>0) {
                          if (strpos($issueRow['department'],$sc ) !== false) {
                              $scCount+=$issueRow['issuePresent'];
                              
                          }
                          if (strpos($issueRow['department'],$m ) !== false) {
                              $mCount+=$issueRow['issuePresent'];
                              
                          }
                          if (strpos($issueRow['department'],$p ) !== false) {
                              $pCount+=$issueRow['issuePresent'];
                              
                          }
                          if (strpos($issueRow['department'],$st ) !== false) {
                              $stCount+=$issueRow['issuePresent'];
                              
                          }
                          if (strpos($issueRow['department'],$q ) !== false) {
                              $qCount+=$issueRow['issuePresent'];
                              
                          }
                          if (strpos($issueRow['department'],$mt ) !== false) {
                              $mtCount+=$issueRow['issuePresent'];
                              
                          }
                          
                        }


                       } 
                      

              ?>
                <h4>
                    Supply Chain
                </h4>
                <div class="circleDept">
                    
                    <div class="circleSolved"><h4 style="margin: 12px;color: white">0</h4></div>

                    <div class="circleUnsolved"><h4 style="margin: 12px;color: white"><?php echo $scCount; ?></h4></div>
                     <h1 style="margin: 30px;color: white"><?php echo $scCount; ?></h1>
                </div>
                
            </div>
            <div class="col-sm-2" style="border: 1px solid grey;text-align: center;">
                <h4>
                    Maintainence
                </h4>
                <div class="circleDept">
                    
                    <div class="circleSolved"><h4 style="margin: 12px;color: white">0</h4></div>

                    <div class="circleUnsolved"><h4 style="margin: 12px;color: white"><?php echo $mCount; ?></h4></div>
                     <h1 style="margin: 30px;color: white"><?php echo $mCount; ?></h1>
                </div>
            </div>
            <div class="col-sm-2" style="border: 1px solid grey;text-align: center;">
                <h4>
                    Production
                </h4>
                <div class="circleDept">
                    
                    <div class="circleSolved"><h4 style="margin: 12px;color: white">0</h4></div>

                    <div class="circleUnsolved"><h4 style="margin: 12px;color: white"><?php echo $pCount; ?></h4></div>
                     <h1 style="margin: 30px;color: white"><?php echo $pCount; ?></h1>
                </div>
            </div>
            <div class="col-sm-2" style="border: 1px solid grey;text-align: center;">
                <h4>
                    Store
                </h4>
                <div class="circleDept" >
                    
                    <div class="circleSolved"><h4 style="margin: 12px;color: white">0</h4></div>

                    <div class="circleUnsolved"><h4 style="margin: 12px;color: white"><?php echo $stCount; ?></h4></div>
                     <h1 style="margin: 30px;color: white"><?php echo $stCount; ?></h1>
                </div>
            </div>
            <div class="col-sm-2" style="border: 1px solid grey;text-align: center;"> 
                <h4>
                    Quality
                </h4>
                <div class="circleDept">
                    
                    <div class="circleSolved"><h4 style="margin: 12px;color: white">0</h4></div>

                    <div class="circleUnsolved"><h4 style="margin: 12px;color: white"><?php echo $qCount; ?></h4></div>
                     <h1 style="margin: 30px;color: white"><?php echo $qCount; ?></h1>
                </div>
            </div>
            <div class="col-sm-2" style="border: 1px solid grey;text-align: center;">
                <h4>
                    Methods
                </h4>
                <div class="circleDept">
                    
                    <div class="circleSolved"><h4 style="margin: 12px;color: white">0</h4></div>

                    <div class="circleUnsolved"><h4 style="margin: 12px;color: white"><?php echo $mtCount; ?></h4></div>
                     <h1 style="margin: 30px;color: white"><?php echo $mtCount; ?></h1>
                </div>
            </div>
            <div class="input-group mb-3 col-sm-12 d-flex justify-content-center" style=";margin-top: 20px;">
                    <a href="floorManager.php"  class="btn btn-danger btn-lg active" role="button" type="button" aria-pressed="true"  style="border-radius: 20px;">Go to Stations</a>
            </div>
            
        </div>
           
            <div style="height: 100px;"></div>
        </div>
    </div>
    <footer style="background-color: #2596be;height: 50px;">
        <section style="background-color: grey; height: 30px;"></section>
    </footer>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
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
            window.location.assign("../login/logout.php");
        }
    </script>

</body>

</html>

<?php
    } else {
        header("Location: login.php");
    }
?>