<?php
    session_start();
    if(isset($_SESSION['userid'])) {
        include 'resources/connect.php';
        $tableName = "employee";
        $tableName1 = "station";
        $tableName2 = "variant";
        $id = $_SESSION['userid'];
        $op = $_SESSION['usergroup'];
        $station = $_SESSION['station'];
        $sql = "SELECT * FROM $tableName WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        // $sql1 = "SELECT * FROM $tableName1";
        // $result1 = $conn->query($sql1);
        $sql2 = "SELECT * FROM $tableName2 WHERE variantno IN (SELECT variant FROM $tableName1 WHERE stationname ='$station') ";
        $result2 = $conn->query($sql2);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Operator</title>

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
                <div class="col-sm-12" style="background-color: #009bcc;height: 50px">
                    
                </div>
            </div>
            
            <form action="setVariant.php" method="POST" id="opForm">
                <div class="row" style="margin-top: 20px">

                    <div class="col-sm-12" style="margin-left: 60px">
                         <div class="d-flex justify-content-center" style="background-color: #009bcc;border-radius: 20px;width: 90%;margin-top: 10px">
                            <div class="form-group " style="width: 100%;margin-left: 10px;padding: 10px">
                                <label for="line" style="color: white">Select Variant:</label>
                                <select class="form-control" id="variant" name="varSel" style="background-color: transparent;border: 0px solid white;color: white;border-bottom-width: 2px;">
                                    <option value="" disabled selected="true">Select Variant</option> 
                                    <?php
                                        while ($row1=$result2->fetch_assoc()) {
                                            echo '<option style="color:black;">'.$row1['variantname'].'</option>';
                                        }
                                     ?>
                                </select>
                                <div class="invalid-feedback" style="font-weight: bold;">Enter Variant.</div>
                            </div>

                            <div class="form-group " style="width: 100%;margin-left: 50px;padding: 10px">
                                <label for="station" style="color: white">Select Serial:</label>
                                <select class="form-control" id="serial" name="serialSel" style="background-color: transparent;border: 0px solid white;color: white;border-bottom-width: 2px;">
                                    <option value="" disabled selected="true">Select Serial</option> 
                                </select>
                                <div class="invalid-feedback" style="font-weight: bold;">Enter Serial.</div>
                            </div> 
                          
                        </div>
                          
                    </div>
                    
                        
                    
                </div>
                <div class="row">
                    <div class="input-group mb-3 col-sm-12 d-flex justify-content-center" style=";margin-top: 20px;">
                        <input class="btn btn-danger" onclick="validateAndSubmit();" type="button" value="Raise Andon" style="padding: 10px;border-radius: 50px">
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


        	$('#variant').on('change',function(){
        		$variant=$(this).val();
        		if ($variant) {
        			$.ajax({
        				type:'POST',
        				url:'fetchVariantData.php',
        				data:'variant='+$variant,
        				
        				success:function(html)
        				{
        					//console.log($variant);
        					console.log(html);
        					$('#serial').html(html);

        				}

        			});
        		}
        		else{
        			$('#serial').html('<option value="">Invalid</option>');
        		}
        	})



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
            window.location.assign("logout.php");}

        function validate(variant1, serial1) {
          var flag = 1;

          if(variant1 === "" && variant1.length == 0) {
            flag = 0;
            $("#variant").addClass("is-invalid");
            return flag;
          } else {
            flag = 1;
            $("#variant").removeClass("is-invalid");
          }

          if(serial1 === "" && serial1.length == 0) {
            flag = 0;
            $("#serial").addClass("is-invalid");
            return flag;
          } else {
            flag = 1;
            $("#serial").removeClass("is-invalid");
          }
            console.log(flag);
          return flag;

        }

        function validateAndSubmit() {
          
          var variant1 = document.getElementById('variant').value
          var serial1 = document.getElementById('serial').value
          var form = document.getElementById('opForm')
          if(validate( variant1, serial1) == 1) {
            form.submit();
          }
        }




    </script>

</body>

</html>

<?php
    } else {
        header("Location: login.php");
    }
?>