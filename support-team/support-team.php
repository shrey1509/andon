<?php
   
    
       

    session_start();
    // if(isset($_SESSION['userid'])) {
    //     include '../../resources/connect.php';
    //      $tableName = "employee";
    //         $id = $_SESSION['userid'];
    //         $op = $_SESSION['usergroup'];
    //         $sql = "SELECT * FROM $tableName WHERE id = $id";
    //        $tableName1 = "linestation";
    //        $tableName2 = "variant";
       
    //  $result = $conn->query($sql);
    // $row = $result->fetch_assoc();
    // $result1 = $conn->query($sql1);
    //     $sql2 = "SELECT DISTINCT variant FROM $tableName2";
    //      $result2 = $conn->query($sql2);
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
    <link rel="stylesheet" href="../../css/support-team.css">
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
         //   include '../../includables/sidebar.php';
        ?>
        <!-- Page Content  -->
        <div id="content" style="overflow: hidden;">
            <?php
             //  include '../../includables/header.php';
            ?>
           
           <div class="container">

<form  action=" " class="form" method="GET" autocomplete="off">
   
    <section name="Add checksheet">
<div class="jumbotron jumbotron-fluid"
style="padding: 0px; margin-left: 0px; margin-top: 0px; background-color: #DBF0FF;">
   <div class="container">
          
    </div> 
                <br>
    <div class="row" >

      <div class="col-2">

<label  style="margin-left: 20px;">Team </label>
 <select id="teams" name="teamSel">
  <option value="">1</option>
  <option value="saab">2</option>
  <option value="mercedes">3</option>
  
</select> 
<br>
<!-- <label for="validationElement"  style="margin-left: 20px;" >Open Incidents </label>&nbsp;&nbsp;
<input style="margin-top: 3px;" type="radio" id="female" name="gender" value="male">&nbsp;&nbsp; -->

    </div>

   <div class="col-4">
<label for="validationElement" >Line </label>
&nbsp;&nbsp;
<!-- <input type="text" class="form-control" id="close-incident" name="close-incident" 
placeholder="" tabindex=" 1 " /> -->
<select class="form-control" id="line" name="lineSel">

                         <option value="" disabled selected="true">Select Line Number</option> 
                                    <?php
                                      while ($row1=$result1->fetch_assoc()) {
                                        echo '<option value="'.$row1['lineno'].'">'.$row1['linename'].'</option>';
                                      }
                                     ?>
                                </select>
<br>
<!-- <label for="validationElement"  >Close Incidents</label>&nbsp;&nbsp;
<input style=" margin-top: 3px;" type="radio" id="other" name="gender" value="male">&nbsp;&nbsp; -->
<label for="validationElement" >Station </label>&nbsp;&nbsp;

<select class="form-control" id="station" name="stationSel">
<option value="" disabled selected="true">Select Station Number</option> 
                                </select>
                                <div class="invalid-feedback" style="font-weight: bold;">Enter Station.</div>                          <br>  
 <label >Date</label>&nbsp;&nbsp;
     <label >From </label>&nbsp;&nbsp;
<input type="date" id="from_date" name="from_date"
placeholder=" " tabindex=" 1 " 1required>


    </div>

    <div class="col-6">
    <label for="validationElement"  >All Incidents </label>&nbsp;&nbsp;
<input type="radio" style="margin-top: 3px; " id="male" name="gender" value="male">&nbsp;&nbsp;
<label for="male">Open Incident</label>

<input type="radio" style="margin-top: 3px; " id="male" name="gender" value="male">&nbsp;&nbsp;
<label for="male">Close Incident</label><br>

  <br>
<label >To </label>&nbsp;&nbsp;
<input type="date"  id="to_date" name="to_date"
placeholder=" " tabindex=" 1 " 1required>
<button type="submit"  class="btn-btn-primary" id="filter" 
name="filter" value="filter">>></button>

    </div>








              
</div>
               

           
            </div>

           

        </section>
       

        <div class="col-lg">
     <section name="checksheet points">
 <table id='checklist_aut' class="table display-6">
<tr>
    <th>Incident no.</th>
  <th>Description</th>
       
    <th>Variant</th>
    <th>Serial no.</th>
    <th>Solution</th>
    <th>Others</th>

                        
 </tr>
  <?php 
       if(isset($_GET['from_date']) && isset($_GET['to_date'])) 
      {
        $from_date =$_GET['from_date'];
        $to_date =$_GET['to_date'];
        $conn = mysqli_connect("localhost","root","","andondb","3307");
        $query ="SELECT * FROM teams WHERE created_at BETWEEN '$from_date' AND '$to_date'";
        $query_run =mysqli_query($conn,$query);
          if(mysqli_num_rows($query_run)>0){
            foreach($query_run as $row) {?>
        

<tr class="form-group" >
    <td><input type="text" name="" value="<?php echo $row['incidentno'];?>" readonly></td>
     <td><input type="text" name="" value="<?php echo $row['description'];?>" readonly></td>
      <td><input type="text" name="" value="<?php echo $row['variant'];?>" readonly></td>
       <td><input type="text" name="" value="<?php echo $row['serial'];?>" readonly></td>
        <td><input type="text" name="solution" value="<?php echo $row['solution'];?>"></td>
         <td><input type="text" name="other" value="<?php echo $row['other'];?>"></td>
<td> <input type="button" name="submit" value="edit" id="<?php echo $row['incidentno'];?>" class="btn btn-success editbtn" >
    

</tr>
<?php }
 //     $Linename =$_POST['linename'];
       // $Station =$_POST['station'];
        
//$query = "update teams set id=$id,incidentno='".$incidentno."' ,description='".$description."',variant='".$variant."',serial='".$serial."',solution='".$solution."',other='".$other."' where incidentno='".$incidentsupdate."' ";
       // $query = "update teams set Linename='$linename',Station='station',Solution='$solution',Other='$other' where = id='incidentno' ";
 if(isset($_POST['submit'])) {
        $lineSel =$_POST['linename'];
        $stationSel =$_POST['station
        '];
        
        $solution =$_POST['solution'];
        $other =$_POST['other'];
        
        $query1 ="insert into `teams` (`linename`,`station`,`solution` ,`other` ) values ('$lineSel','$stationSel','$solution','$other')" ;
     //  ;
        //$query = "update teams set solution='".$solution."',other='".$other."' where ='".$incidentno."' AND id='" . $_GET['incidentno'] . "' ";
        $query_run1=mysqli_query($conn,$query1);
        if($query_run1){
          
          echo '<script >
            alert("data updated properly")
          </script>';
          }
       
      else{
      echo '<script>
            alert("data not updated properly")
          </script>';
}          
      }?>

          <!-- <td><button type="submit" style="width: 100px; height:40px; font-size: 18px;" class="btn-sm display-6 btn-primary">Save</button></td> -->
          
 <div class="modal fade" id="editmodal" role="dialog" tabindex="-1" aria-labelledBy="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
            <h5 class="modal-title" id="editmodal">Edit data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
                           </div>

       <form action="updatedata.php" method="POST">          <!-- Edit Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form role="form">
                    <div class="form-group">
                       <!-- <label for="inputIncidentNo">IncidentNo</label>
                        <input type="text" class="form-control" id="inputIncidentNo" placeholder="Enter IncidentNo"/>-->
<input type="hidden" name="incidentno" id="incidentno">
<label for="validationElement" >Line </label>
&nbsp;&nbsp;
<!-- <input type="text" class="form-control" id="close-incident" name="close-incident" 
placeholder="" tabindex=" 1 " /> -->
<select name="linename" id="linename">
  <option value="eal">EAL</option>
  <option value="tal">TAL</option>
  <option value="ale">ALE</option>
  <option value="yal">YAL</option>
</select> 

                    </div>
                    <div class="form-group">
                      <label for="validationElement" >Station </label>&nbsp;&nbsp;
<select name="station" id="station">
  <option value="S1">s1</option>
  <option value="S2">S2</option>
  <option value="S3">s3</option>
  <option value="S4">s4</option>
</select> 

                    </div>
                    <div class="form-group">
                        <label for="solution">Solution</label>
                        <input type="text" name="solution" class="form-control" id="solution" placeholder="Enter Solution"/>
                    </div>
                    <div class="form-group">
                        <label for="other">Other</label>
                        <input type="text" name="other" class="form-control"  id="other" placeholder="Enter Other"/> </div>
                </form>
            </div>
            
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata " class="btn btn-primary submitBtn" >SUBMIT</button>
            </div>
          </form>
        </div>
    </div>
</div>
 </div>
</tr>

  <?php 

              
          }
         
      }
        ?>           
 
                </table>

            </section>
            </div>
        <div style="text-align: center; ">

 
        </div>
    </form>
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

        function submitAdd() {
            var form = document.getElementById('addQuestionForm');
            var countOfAnswer = document.getElementById('countOfAnswer').value;
            var compulsoryAnswer = document.getElementById("compulsoryAnswer").value;
            var answer = compulsoryAnswer + "; ";
            for (var i = 1; i <= countOfAnswer; i++) {
                var answerRow = "answer" + i;
                console.log(answerRow)
                if(i==countOfAnswer){
                    answer +=  document.getElementById(answerRow).value;
                } else {
                    answer +=  document.getElementById(answerRow).value + "; ";
                }
            }
            document.getElementById("sendAnswers").value = answer;
            console.log(answer);
            form.submit();
        }

        $('#variantForDelete').on('change',function(){
                $variant=$(this).val();
                if ($variant) {
                    $.ajax({
                        type:'POST',
                        url:'fetchQuestions.php',
                        data:'variant='+$variant,
                        success:function(html)
                        {
                            //console.log($variant);
                            // console.log(html);
                            $('#questiondelete').html(html);

                        }

                    });
                }
                else{
                    $('#questiondelete').html('<option value="">Invalid</option>');
                }
            });
    </script>

</body>

</html>

<?php
    // } else {
    //     header("Location: ../index.php");
    // }
?>