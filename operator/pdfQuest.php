<?php
    session_start();
    if(isset($_SESSION['userid'])) {
        include '../resources/connect.php';
        $tableName = "employee";
        $tableName1 = "variant";
        $tableName2 = "question";
        $tableName3 = "station";
        $id = $_SESSION['userid'];
        $op = $_SESSION['usergroup'];
        $line = $_SESSION['line'];
        $station = $_SESSION['station'];
        $variant = $_SESSION['variant'];
        $serial = $_SESSION['serial'];
        $sql = "SELECT * FROM $tableName WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
        $sql1 = "SELECT variantno FROM $tableName1 WHERE `serial` = '$serial'";
        $result1 = $conn->query($sql1);
        $variantrow = $result1->fetch_assoc();
        $variantNumber = $variantrow['variantno'];
        $sql2 = "SELECT * FROM $tableName3 WHERE `stationno` = $station";
        $result2 = $conn->query($sql2);
        $sql3 = "SELECT * FROM `$tableName2` WHERE `stationno` = '$station'";
        // $sql3 = "SELECT * FROM $tableName2 WHERE id IN (SELECT questid from $tableName1 WHERE `serial` = '$serial')";
        $result3 = $conn->query($sql3);
        if(!isset($_SESSION['variant'])){
            echo '<script> alert("Set Variant First!"); window.location.replace("selVariant.php");</script>';
        }
        if(!isset($_SESSION["questno"])) {
          $_SESSION["questno"]=0;
        } 
        echo '<script> console.log('.$_SESSION["questno"].');</script>';
        $questionsList = "";
        while ($row3=$result3->fetch_assoc()) {
                            $questionsList .=$row3['questionname'];    
                            $questionsList .=";";  
                        }
        $questions=explode(";", $questionsList);
        // print_r($questions);
        $qno = $_SESSION["questno"];
        // if(isset($_SESSION['min']) && isset($_SESSION['sec'])){
        //     $min = $_SESSION['min'];
        //     $sec = $_SESSION['sec'];
        // }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Questionnaire</title>

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
</head>
<body style="margin: 0px">

    <div class="wrapper">
        <!-- Sidebar  -->
        <?php
            include '../includables/sidebar.php';
        ?>
        <!-- Page Content  -->
        <div id="content">
            <?php
                include '../includables/header.php';
            ?>
         
            

            <div class="row">
                <div class="col-sm-4" style="background-color: #009bcc;">
                    <h5 style="color: white;margin-left: 50px">   Line: <?php echo $line;?>   </h5>
                </div>
                <div class="col-sm-4" style="background-color: #009bcc;">
                    <h5 style="color: white;margin-left: 50px">      Station: <?php echo $station;?></h5>
                </div>
                <div class="col-sm-4" style="background-color: #009bcc;">
                    <h5 style="color: white;margin-left: 50px">      Variant: <?php echo $variant;?></h5>
                </div>
            </div>
            <form action="storeResDetails.php" method="POST" id="resForm">
            <div class="row">
                <div class="col-sm-12" style="height: 50px;margin-bottom: 100px">

                    <div id="ra1" style="margin-bottom: 50px;margin-left: 50px;margin-top: 50px">
                        <div id="thanks">
                            <h2>Thanks For Answering!</h2>
                            <input class="btn btn-primary btn-lg active" type="button" onclick="submitForm();" value="Submit" name="res" style="border-radius: 20px;margin: 5px">
                        </div>
                        
                    <?php
                        $countOfQuestions = $result3->num_rows;
                        
        
                        // print_r($questionsList);

                            
                             // print_r($questions);
                            // $answersOver=explode(".", $row3['answers']);
                            for ($i=$_SESSION["questno"]; $i < $countOfQuestions; $i++) { 
                            echo '<input id="inp" type="hidden" value="'.$countOfQuestions.'">';
                            // echo '<script> console.log('.$questions[$_SESSION["questno"]].');</script>';
                            
                                ?>
                                <div id="<?php echo 'rad'.$i; ?>">

                                <h3 style="color:black;"><?php echo($questions[$i]); ?></h3><?php
                                echo '<script> console.log("rad'.$i.'");</script>';
                                echo '<script> console.log("'.$questions[$i].'");</script>'; 
                                echo '<input class="btn btn-primary btn-lg active" type="button" onclick="getquest('.$i.');" value="Yes" name="res" style="border-radius: 20px;margin: 5px">';
                                echo '<input class="btn btn-danger btn-lg active" type="button" onclick="switchandon('.$i.');" value="No" name="unres" style="border-radius: 20px;margin: 5px">';
                               echo '</div>';

                                
                               

                               
                        }
                        $_SESSION["questno"]++;
                        // $qno++;



                        ?>
                            
                    </div>

                    <embed style="border: solid black 20px;" src=
                    "<?php 
                        while ($row2=$result2->fetch_assoc()) {
                                    echo str_replace("%", "/",$row2['pdfPath']);  
                                    }
                    ?>" width="100%" height="1000px" />


                    <input type="hidden" name="min" id="min">
                    <input type="hidden" name="sec" id="sec">
                    
                  <!--   <div class="input-group mb-3 col-sm-12 d-flex justify-content-center" style=";margin-top: 20px;margin-bottom: 500px">
                    <input class="btn btn-danger btn-lg active" type="button" onclick="getTime();" value="Go to Andon" name="unres" style="border-radius: 20px;margin: 5px">
                     <input class="btn btn-primary btn-lg active" type="button" onclick="getTime1();" value="Task Resolved" name="res" style="border-radius: 20px;margin: 5px">
                    
                    </div>  -->
                
                </form>

                    <div style="height: 100px">
                        
                    </div>                  
                
                    
                </div>
            </div>
            
         
            
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

        var size= document.getElementById("inp").value;
        // var questno= document.getElementById("questno").value;
        var h1 = document.getElementsByTagName('h2')[0],
        seconds = <?php echo($_SESSION['secs']);?>, minutes = <?php echo($_SESSION['mins']);?>, hours = 0,
        t;

        function add() {
            seconds++;
            if (seconds >= 60) {
                seconds = 0;
                minutes++;
                if (minutes >= 60) {
                    minutes = 0;
                    hours++;
                }
            }
            
            h1.textContent = (hours ? (hours > 9 ? hours : "0" + hours) : "00") + ":" + (minutes ? (minutes > 9 ? minutes : "0" + minutes) : "00") + ":" + (seconds > 9 ? seconds : "0" + seconds);
          

             timer();
            }
            function timer() {
                t = setTimeout(add, 1000);
            }

        function submitForm(){
            $mins = minutes;
            $secs = seconds;
            $.ajax({
                        type:'POST',
                        url:'setTime.php',
                        data:{'mins':$mins,'secs':$secs},
                        success:function(html)
                        {
                            // window.location = "./issueUnresolved.php";
                        }

                    }); 
            let fm= document.getElementById('resForm');
            fm.submit();
        }
        
        $("#thanks").hide();

        for (var i =<?php echo($_SESSION['questno']++); ?>; i < size; i++) {
            $("#rad"+i).hide();
        }

        function sleep(ms) {
            return new Promise(resolve => setTimeout(resolve, ms));
        }

        async function getquest(i)
        {
            $ansYes = "Yes";
            await sleep(1000);
            if((size-1)>i)
            {
                $("#rad"+i).hide();
                i++;
                $("#rad"+i).show();
            }
            else if(i==size-1)
            {
                $("#rad"+i).hide();
                $("#thanks").show();
            }
            $.ajax({
                        type:'POST',
                        url:'setYes.php',
                        data:'ans='+$ansYes,
                        success:function(html)
                        {
                            // window.location = "./issueUnresolved.php";
                        }

                    });

        }

        async function switchandon(qno)
        {
            $qno = qno;
            $mins = minutes;
            $secs = seconds;
           
            $.ajax({
                        type:'POST',
                        url:'setTime.php',
                        data:{'mins':$mins,'secs':$secs},
                        success:function(html)
                        {
                            // window.location = "./issueUnresolved.php";
                        }

                    }); 
            $.ajax({
                        type:'POST',
                        url:'fetchQuestNo.php',
                        data:'questno='+$qno,
                        success:function(html)
                        {
                            window.location = "./issueUnresolved.php";
                        }

                    });
              

        }
        
        

        window.onload = () => {
        //   let hour = document.getElementById("hour").innerHTML;;
        //   let minute = document.getElementById("minute").innerHTML;
        //   let seconds = document.getElementById("seconds").innerHTML;
        //   let totalSeconds = document.getElementById("seconds").innerHTML;
        //   let intervalId = null;

          document.getElementById("clk").style.display = 'block';
          document.getElementById("ser").style.display = 'block';

        // intervalId = setInterval(startTimer, 1000);
        //   function startTimer() {
        //     ++totalSeconds;
        //     hour = Math.floor(totalSeconds / 3600);
        //     minute = Math.floor((totalSeconds - hour * 3600) / 60);
        //     seconds = totalSeconds - (hour * 3600 + minute * 60);

        //     document.getElementById("hour").innerHTML = hour;
        //     document.getElementById("minute").innerHTML = minute;
        //     document.getElementById("seconds").innerHTML = seconds;
        
            timer();
          }

          

          // document.getElementById('TimeTaken').addEventListener('click', () => {
          //   $.ajax({
          //               type:'POST',
          //               url:'issueUnresolved.php',
          //               data:'min='+minute+'sec'+seconds,

          //           });
          //   //reset();
          // });
          // function getTime()
          // {
          //   $min= $('#minute').val();
          //   $sec= $('#seconds').val();
          //   alert($min);
          //   alert($sec);

          //   $.ajax({
          //               type:'POST',
          //               url:'issueUnresolved.php',
          //               data:'min='+$min+'sec='+$sec,

          //           });
          // }

          // function reset() {
          //   totalSeconds = 0;
          //   document.getElementById("hour").innerHTML = '0';
          //   document.getElementById("minute").innerHTML = '0';
          //   document.getElementById("seconds").innerHTML = '0';
          // }

        // }
        // function getTime()
        //   {
        //     var min= document.getElementById("minute").innerHTML;
        //     var sec= document.getElementById("seconds").innerHTML;
        //     $.ajax({
        //                 type:'POST',
        //                 url:'setTime.php',
        //                 data: {min : document.getElementById('minute').innerHTML,
        //                     sec : document.getElementById('seconds').innerHTML,} ,

        //             });
        //   }

          // function getTime1()
          // {
          //   var min= document.getElementById("minute").innerHTML;
          //   var sec= document.getElementById("seconds").innerHTML;
          //   document.getElementById("min").value=min;
          //   document.getElementById("sec").value=sec;
            
          //   let fm= document.getElementById('resForm');
          //   fm.submit();
            
          // }

          // function getTime()
          // {
          //   var min= document.getElementById("minute").innerHTML;
          //   var sec= document.getElementById("seconds").innerHTML;
          //   document.getElementById("min").value=min;
          //   document.getElementById("sec").value=sec;
            
          //   let fm= document.getElementById('resForm');
          //   fm.action='storeUnresDetails.php'
          //   fm.submit();
            
          // }



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
        header("Location: ../index.php");
    }
?>