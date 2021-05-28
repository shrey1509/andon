<?php
    session_start();
    if(isset($_SESSION['userid'])) {
        include '../../resources/connect.php';
        $tableName = "employee";
        $id = $_SESSION['userid'];
        $op = $_SESSION['usergroup'];
        $sql = "SELECT * FROM $tableName WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();

        $station = "station";
        $line = "line";
        $variant = "variant";

        $stationSql = "SELECT * FROM $station";
        $lineSql = "SELECT * FROM $line";
        $variantSql = "SELECT * FROM $variant";
        // print_r($result2);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../css/style2.css">
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
    </style>
</head>
<body style="margin: 0px">

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php
            include '../../includables/sidebar.php';
        ?>
        <!-- Page Content  -->
        <div id="content">
            <?php
                include '../../includables/header.php';
            ?>
            <!-- <div class="row">
                <div class="col-sm-12">
                    <div class="maintxt" style="height: 200px;">
                        <h4 class="centered" style="text-align: center;color: white;width: 100%;padding: 0px;font-weight: bold">Andon Management System</h4>
                    </div>
                </div>
            </div> -->

            <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="add-tab" data-toggle="tab" href="#Add" role="tab" aria-controls="home" aria-selected="true">Add Station</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="delete-tab" data-toggle="tab" href="#Delete" role="tab" aria-controls="profile" aria-selected="false">Delete Station</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#Edit" role="tab" aria-controls="profile" aria-selected="false">Assign Station to Line</a>
  </li>
  <!-- <li class="nav-item">
    <a class="nav-link" id="edit-variant-tab" data-toggle="tab" href="#Edit-variant" role="tab" aria-controls="profile" aria-selected="false">Assign  Variant to Station</a>
  </li> -->
</ul>

<div class="tab-content">

<div class="tab-pane active" id="Add" role="tabpanel" aria-labelledby="add-tab">
<div class="row" style="margin-right: 20px; margin-top: 50px;margin-left: 20px;justify-content: center;align-content: center">
                <div class="col-md-1"></div>
                <div class="col-md-4 formContainerAdmin">
                    <h4 style="text-align: center;">Add Station</h4>
                    <form action="addStation.php" method="post">
                        <div class="form-group">
                            <div class="row">
                                <label for="station" style="font-weight: bold;">Station Name:</label>
                                <input type="text" class="form-control" id="station" name="stationname" placeholder="Enter Station Name"/>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                               <label for="linename" style="font-weight: bold;">Select Line Name:</label>
                                <select class="form-control" id="linename" name="linename">
                                    <option value="" selected="true" disabled="true">Select</option>
                                    <?php 
                                        $lineResult = $conn->query($lineSql);
                                        while ($row=$lineResult->fetch_assoc()) {
                                            echo '<option value="'.$row['lineno'].'">'.$row['linename'].'</option>';
                                        }
                                    ?>
                                    
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                         <!--     <div class="row" style="margin-top: 5px;">
                               <label for="variantname" style="font-weight: bold;">Select Variant Name:</label>
                                <select class="form-control" id="variantname" name="variantname">
                                    <option value="" selected="true" disabled="true">Select</option>
                                    <?php 
                                        $variantResult = $conn->query($variantSql);
                                        while ($row=$variantResult->fetch_assoc()) {
                                            echo '<option value="'.$row['variantno'].'">'.$row['variantname']."#".$row['serial'].'</option>';
                                        }
                                    ?>
                                    
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div> -->
                            <div class="row" style="margin-top: 10px; justify-content: center;">
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
   
</div>

<div class="tab-pane" id="Delete" role="tabpanel" aria-labelledby="delete-tab">
    <div class="row" style="margin-right: 20px;margin-top: 50px;margin-left: 20px;justify-content: center;align-content: center">
        <div class="col-md-1">
        </div>
        <div class="col-md-4 formContainerAdmin">
                    <h4 style="text-align: center;">Delete Station</h4>
                    <form action="deleteStation.php" method="post">
                        <div class="form-group">
                             <div class="row" style="margin-top: 5px;">
                               <label for="lineName" style="font-weight: bold;">Select Line No:</label>
                                <select class="form-control" id="lineName" name="lineName">
                                    <option value="" selected="true" disabled="true">Select</option>
                                    <?php 
                                        $lineResult = $conn->query($lineSql);
                                        while ($row=$lineResult->fetch_assoc()) {
                                            echo '<option value="'.$row['lineno'].'">'.$row['linename'].'</option>';
                                        }
                                    ?>
                                    
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                           <div class="row">
                               <label for="stationName" style="font-weight: bold;">Select Station Name:</label>
                                <select class="form-control" id="stationName" name="stationName">
                                    <option value="" disabled selected="true">Select Station</option> 
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                           
                            <div class="row" style="margin-top: 10px; justify-content: center;">
                                <button class="btn btn-primary" type="submit">Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
</div>

<div class="tab-pane" id="Edit" role="tabpanel" aria-labelledby="edit-tab">
   
        <div class="row" style="margin-right: 20px;margin-top: 50px; margin-left: 20px;justify-content: center;align-content: center">
                <div class="col-md-1"></div>
                <div class="col-md-4 formContainerAdmin">
                    <h4 style="text-align: center;">Assign Station to Line</h4>
                    <form action="editStationLine.php" method="post">
                        <div class="form-group">
                            <div class="row">
                               <label for="stationname" style="font-weight: bold;">Select Station Name to Edit:</label>
                                <select class="form-control" id="stationname" name="stationname">
                                    <option value="" selected="true" disabled="true">Select</option>
                                    <?php 
                                        $stationResult = $conn->query($stationSql);
                                        while ($row=$stationResult->fetch_assoc()) {
                                            echo '<option value="'.$row['stationno'].'">'.$row['stationname'].'</option>';
                                        }
                                    ?>
                                    
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                               <label for="lineno" style="font-weight: bold;">Select Line Name:</label>
                                <select class="form-control" id="lineno" name="lineno">
                                    <option value="" selected="true" disabled="true">Select</option>
                                    <?php 
                                        $lineResult = $conn->query($lineSql);
                                        while ($row=$lineResult->fetch_assoc()) {
                                            echo '<option value="'.$row['lineno'].'">'.$row['linename'].'</option>';
                                        }
                                    ?>
                                    
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                            <div class="row" style="margin-top: 10px; justify-content: center;">
                                <button class="btn btn-primary" type="submit">Edit</button>
                            </div>
                        </div>
                    </form>
                </div>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

         $('#lineName').on('change',function(){
                $line=$(this).val();
                console.log($line);
                if ($line) {
                    $.ajax({
                        type:'POST',
                        url:'fetchLineData.php',
                        data:'line='+$line,
                        
                        success:function(html)
                        {
                            //console.log($line);
                            console.log(html);
                            $('#stationName').html(html);

                        }

                    });
                }
                else{
                    $('#stationName').html('<option value="">Invalid</option>');
                }
        });
        $('#logoutButton').on('click', logout);

        function logout() {
            window.location.assign("../../login/logout.php");
        }
    </script>

</body>

</html>

<?php
    } else {
        header("Location: ../index.php");
    }
?>