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
        $variant = "variant";
        $line = "line";
        $sql2 = "SELECT * FROM $variant";
        $stationSql1 = "SELECT * FROM $station";
        $stationSql = "SELECT * FROM $station";
        $variantSql = "SELECT * FROM $variant";
        $lineSql = "SELECT * FROM $line";
       
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
           <!--  <div class="row">
                <div class="col-sm-12">
                    <div class="maintxt" style="height: 200px;">
                        <h4 class="centered" style="text-align: center;color: white;width: 100%;padding: 0px;font-weight: bold">Andon Management System</h4>
                    </div>
                </div>
            </div> -->

            <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="add-tab" data-toggle="tab" href="#Add" role="tab" aria-controls="home" aria-selected="true">Add variant</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="delete-tab" data-toggle="tab" href="#Delete" role="tab" aria-controls="profile" aria-selected="false">Delete Variant</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="edit-tab" data-toggle="tab" href="#Edit" role="tab" aria-controls="profile" aria-selected="false">Edit Variant</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" id="edit-variant-tab" data-toggle="tab" href="#Edit-variant" role="tab" aria-controls="profile" aria-selected="false">Assign  Variant to Line</a>
  </li>
</ul>

<div class="tab-content">
<div class="tab-pane active" id="Add" role="tabpanel" aria-labelledby="add-tab">

            <div class="row" style="margin-right: 20px;margin-top: 50px; margin-left: 20px;justify-content: center;align-content: center">
                <div class="col-md-1"></div>
                <input type="hidden" id="countOfAnswer" value="0">
                <div class="col-md-4 formContainerAdmin">
                    <h4 style="text-align: center;">Add Variant</h4>
                    <form id="addQuestionForm" action="addVariant.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <div class="row">
                                <label for="variantname" style="font-weight: bold;">Variant Name:</label>
                                <input type="text" class="form-control" id="variantname" name="addvariantname" placeholder="Enter Variant"/>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                             <div class="row" style="margin-top: 5px;">
                               <label for="lineVar" style="font-weight: bold;">Select Line No:</label>
                                <select class="form-control" id="lineVar" name="lineVar">
                                    <option value="" selected="true" disabled="true">Select Line</option>
                                    <?php 
                                        $lineResult = $conn->query($lineSql);
                                        while ($row=$lineResult->fetch_assoc()) {
                                            echo '<option value="'.$row['lineno'].'">'.$row['linename'].'</option>';
                                        }
                                    ?>
                                    
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>

                            <!-- <div class="row">
                               <label for="stationVar" style="font-weight: bold;">Select Station Name:</label>
                                <select class="form-control" id="stationVar" name="stationVar">
                                    <option value="" disabled selected="true">Select Station</option> 
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                             
                            <div class="row">
                                <label for="fileToUpload" style="font-weight: bold;">Add Pdf/Ppt:</label>
                                <input type="file" required class="form-control" id="fileToUpload" name="fileToUpload"/>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                             <div class="row">
                                <label for="question" style="font-weight: bold;">Question:</label>
                                <input type="text" class="form-control" id="question" name="question" placeholder="Enter Question"/>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div> -->
                            <div class="row" style="margin-top: 10px; justify-content: center;">
                                <button class="btn btn-primary" type="submit" >Add</button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
</div>

<div class="tab-pane" id="Delete" role="tabpanel" aria-labelledby="delete-tab">
<div class="row" style="margin-right: 20px; margin-top: 50px;margin-left: 20px;justify-content: center;align-content: center">
                <div class="col-md-1"></div>

                <div class="col-md-5 formContainerAdmin">
                    <h4 style="text-align: center;">Delete Variant</h4>
                    <form action="deleteVariant.php" method="post">
                        <div class="form-group">
                            <div class="row" style="margin-top: 5px;">
                               <label for="lineVar" style="font-weight: bold;">Select Line No:</label>
                                <select class="form-control" id="lineVarDel" name="lineVarDel">
                                    <option value="" selected="true" disabled="true">Select Line</option>
                                    <?php 
                                        $lineResult = $conn->query($lineSql);
                                        while ($row=$lineResult->fetch_assoc()) {
                                            echo '<option value="'.$row['lineno'].'">'.$row['linename'].'</option>';
                                        }
                                    ?>
                                    
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>

                        <!--     <div class="row">
                               <label for="stationVarDel" style="font-weight: bold;">Select Station Name:</label>
                                <select class="form-control" id="stationVarDel" name="stationVarDel">
                                    <option value="" disabled selected="true">Select Station</option> 
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div> -->
                           <div class="row" style="margin-top: 5px;">
                                <label for="deleteVar" style="font-weight: bold;">Select Variant Name:</label>
                                <select class="form-control" id="deleteVar" name="deleteVar">
                                    <option value="" disabled selected="true">Select Variant</option> 
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
  <div class="row" style="margin-right: 20px; margin-top: 50px;margin-left: 20px;justify-content: center;align-content: center">
                <div class="col-md-1"></div>
                <div class="col-md-5 formContainerAdmin">
                    <h4 style="text-align: center;">Edit Variant</h4>
                    <form action="editVariant.php" method="post">
                        <div class="form-group">
                             <div class="row" style="margin-top: 5px;">
                               <label for="lineVarEdit" style="font-weight: bold;">Select Line No:</label>
                                <select class="form-control" id="lineVarEdit" name="lineVarEdit">
                                    <option value="" selected="true" disabled="true">Select Line</option>
                                    <?php 
                                        $lineResult = $conn->query($lineSql);
                                        while ($row=$lineResult->fetch_assoc()) {
                                            echo '<option value="'.$row['lineno'].'">'.$row['linename'].'</option>';
                                        }
                                    ?>
                                    
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <label for="variantEdit" style="font-weight: bold;">Select Variant Name:</label>
                                <select class="form-control" id="variantEdit" name="variantEdit">
                                    <option value="" disabled selected="true">Select Variant</option> 
                                </select>
                                <div class="invalid-feedback">Invalid Input</div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <label for="newVariant" style="font-weight: bold;"> New Variant Name:</label>
                                <input type="text" class="form-control" id="newVariant" name="newVariant" placeholder="Enter Variant Name"/>
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

<div class="tab-pane" id="Edit-variant" role="tabpanel" aria-labelledby="edit-variant-tab">
<div class="row" style="margin-right: 20px;margin-top: 50px; margin-left: 20px;justify-content: center;align-content: center">
                <div class="col-md-1"></div>
               
                <div class="col-md-5 formContainerAdmin">
                    <h4 style="text-align: center;">Assign Variant to Line</h4>
                    <form action="editStationVariant.php" method="post" >
                        <div class="form-group">
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
                            <div class="row" style="margin-top: 5px;">
                                <label for="variantno" style="font-weight: bold;">Select Variant Name:</label>
                               <select class="form-control" id="variantno" name="variantno">
                                    <option value="" selected="true" disabled="true">Select</option>
                                   <?php 
                                        $variantResult = $conn->query($variantSql);
                                        while ($row=$variantResult->fetch_assoc()) {
                                            echo '<option value="'.$row['variantno'].'">'.$row['variantname']."#".$row['serial'].'</option>';
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





</div>

            <div style="height: 100px;"></div>
        </div>
        </div>
    </div>
    <footer style="background-color: #2596be;height: 50px;">
        <section style="background-color: grey; height: 30px;"></section>
    </footer>


    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js">
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
        $('#lineVar').on('change',function(){
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
                            $('#stationVar').html(html);

                        }

                    });
                }
                else{
                    $('#stationVar').html('<option value="">Invalid</option>');
                }
        });
        $('#lineVarDel').on('change',function(){
                $line=$(this).val();
                console.log($line);
                if ($line) {
                    $.ajax({
                        type:'POST',
                        url:'fetchVariantData.php',
                        data:'line='+$line,
                        
                        success:function(html)
                        {
                            //console.log($line);
                            console.log(html);
                            $('#deleteVar').html(html);

                        }

                    });
                }
                else{
                    $('#deleteVar').html('<option value="">Invalid</option>');
                }
        });
        // $('#stationVarDel').on('change',function(){
        //         $station=$(this).val();
        //         console.log($station);
        //         if ($station) {
        //             $.ajax({
        //                 type:'POST',
        //                 url:'fetchVariantData.php',
        //                 data:'station='+$station,
                        
        //                 success:function(html)
        //                 {
        //                     //console.log($line);
        //                     console.log(html);
        //                     $('#deleteVar').html(html);

        //                 }

        //             });
        //         }
        //         else{
        //             $('#deleteVar').html('<option value="">Invalid</option>');
        //         }
        // });
        $('#lineVarEdit').on('change',function(){
                $line=$(this).val();
                console.log($line);
                if ($line) {
                    $.ajax({
                        type:'POST',
                        url:'fetchVariantData.php',
                        data:'line='+$line,
                        
                        success:function(html)
                        {
                            //console.log($line);
                            console.log(html);
                            $('#variantEdit').html(html);

                        }

                    });
                }
                else{
                    $('#variantEdit').html('<option value="">Invalid</option>');
                }
        });
        $('#logoutButton').on('click', logout);

        function logout() {
            window.location.assign("../../login/logout.php");
        }
         function addTextBox() {
            var countOfAnswer = document.getElementById('countOfAnswer').value;
            countOfAnswer++;
            // alert(countOfAnswer);
            var string = '<div class="row" id="answerRow'+countOfAnswer+'"><label for="answer'+countOfAnswer+'" style="font-weight: bold;">Answers:</label><input type="text" class="form-control" id="answer'+countOfAnswer+'" name="answer'+countOfAnswer+'" placeholder="Enter Answer"/><div class="invalid-feedback">Invalid Input</div></div>';
            var div = document.getElementById("answerTextBox");
            div.insertAdjacentHTML( 'beforeend', string );
            document.getElementById('countOfAnswer').value = countOfAnswer;
        }

        function deleteTextBox() {
            var countOfAnswer = document.getElementById('countOfAnswer').value;
            if(countOfAnswer>=1){
                var row = "answerRow" + countOfAnswer;
                document.getElementById(row).remove();
                countOfAnswer--;
                document.getElementById('countOfAnswer').value = countOfAnswer;
            }
        }

        // function submitAdd() {
        //     var form = document.getElementById('addQuestionForm');
        //     var countOfAnswer = document.getElementById('countOfAnswer').value;
        //     var compulsoryAnswer = document.getElementById("compulsoryAnswer").value;
        //     var answer = compulsoryAnswer + "; ";
        //     for (var i = 1; i <= countOfAnswer; i++) {
        //         var answerRow = "answer" + i;
        //         console.log(answerRow)
        //         if(i==countOfAnswer){
        //             answer +=  document.getElementById(answerRow).value;
        //         } else {
        //             answer +=  document.getElementById(answerRow).value + "; ";
        //         }
        //     }
        //     document.getElementById("sendAnswers").value = answer;
        //     console.log(answer);
        //     form.submit();
        // }

    </script>

</body>

</html>

<?php
    } else {
        header("Location: ../index.php");
    }
?>