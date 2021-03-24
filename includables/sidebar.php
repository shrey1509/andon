<?php
if(isset($_SESSION['min'])){
    $min = $_SESSION['min'];
}
else
{
    $min=0;
}
if(isset($_SESSION['sec'])){
    $sec = $_SESSION['sec'];
}
else
{
    $sec=0;
}
if($op=="operator")
{
  ?><nav id="sidebar">
            <div class="sidebar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="../images/logo.png" style="height: 75px;width: 100%;background-color: white;margin-left: 15px;" align="center">
                </a>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <div class="card" style="background-color: #009bcc; width: 100%;position: relative;">
                        <img class="card-img-top" src="<?php echo ucwords($row["photoPath"]); ?>" alt="Card image cap" style="height: 75px;width: 100px;background-color: #eee;margin: auto;border: solid black 5px;position: absolute;top: 5px;left: 78px;border-radius: 50%">
                        <div class="card-body" style="background-color: #eee;border-radius: 20px;margin: 10px;margin-top: 55px">
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px;font-weight: bold;font-size: medium;"><?php echo ucwords($row["name"]); ?></p>
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px;font-size: small;"><?php echo ucwords($row["usergroup"]); ?></p>
                        </div>
                    </div>
                </li>                
                <li>
                    <div align="center" style="padding-top: 20px">
                        <a href="selVariant.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style="background-color: white;color: black;border-radius: 20px;border-color: white;text-align:center;width: 90%" ><i class="fas fa-home"></i> Home</a>
                    </div>
                </li>
                <li>
                    <div align="center" style="padding-top: 20px">
                        <a href="pdfQuest.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style="background-color: white;color: black;border-radius: 20px;border-color: white;text-align:center;width: 95%" ><i class="fas fa-ruler-combined"></i> Assembly Instructions</a>
                    </div>
                </li>
                <li>
                    <div align="center" style="padding-top: 20px">
                        <a href="issueUnresolved.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style="background-color: white;color: black;border-radius: 20px;border-color: white;text-align:center;width: 90%" ><i class="fas fa-exclamation"></i> Andon</a>
                    </div>
                </li>
                
                <li>
                    <div align="center" style="padding-top: 20px">
                        <a href="success.php" class="btn btn-danger btn-lg active" role="button" aria-pressed="true" style="background-color: white;color: black;border-radius: 20px;border-color: white;text-align:center;width: 90%" ><i class="fas fa-user"></i> Members</a>
                    </div>
                </li>
                <li>
                    <div id="ser" style="display: none;">
                        <h5 style="color: black;padding: 10px;margin-left: 55px">      Serial: <?php echo " #".$serial;?></h5>
                    </div>
                </li>
                
                <li>
                    <div align="center" id="clk" style="padding-top: 20px;display: none">
                        <label for="t1" style="text-align: left;color: black">Time Taken:</label>
                        <div class="clock"  style="background-color: white;border-radius: 20px;width: 90%;">
                            <h4 style="color: black">
                                <span id="hour">0</span>
                                <span >:</span>
                                <span id="minute" name="min"><?php echo $min;?></span>
                                <span >:</span>
                                <span id="seconds" name="sec"><?php echo $sec;?></span>
                            </h4>
                            <h1 id="timetaken">
                             </h1>
                        </div>
                    </div>
                </li>              
            </ul>
        </nav>
        <?php
}

else if($op=="floor manager")
{
?>
	<nav id="sidebar">
            <div class="sidebar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="images/logo.png" style="height: 75px;width: 100%;background-color: white;margin-left: 15px;" align="center">
                </a>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <div class="card" style="background-color: #009bcc; width: 100%;position: relative;">
                        <img class="card-img-top" src="<?php echo ucwords($row["photoPath"]); ?>" alt="Card image cap" style="height: 75px;width: 100px;background-color: #eee;margin: auto;border: solid black 5px;position: absolute;top: 5px;left: 78px;border-radius: 50%">
                        <div class="card-body" style="background-color: #eee;border-radius: 20px;margin: 10px;margin-top: 55px">
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px;font-weight: bold;font-size: medium;"><?php echo ucwords($row["name"]); ?></p>
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px;font-size: small;"><?php echo ucwords($row["usergroup"]); ?></p>
                            
                        </div>
                    </div>
                </li>                
                <li>
                    <div align="center" style="padding-top: 20px">
                        <button class="btn btn-secondary btn-lg" type="submit"  style="background-color: white;color: black;border-radius: 20px;border-color: white;text-align:center;;width: 90%" ><i class="fas fa-home"></i> Home</button>
                    </div>
                </li>
                <li>
                    <div align="center" style="padding-top: 20px">
                        <button class="btn btn-secondary btn-lg" type="submit" style="background-color: white;color: black;border-radius: 20px;border-color: white;width: 90%"><span class="align-left" style="display: inline-flex;align-items: left" ><i class="fas fa-user" style="vertical-align: left"></i></span><span> Members</span>  </button>
                    </div>
                </li>
                <li>
                    <div align="center" style="padding-top: 20px">
                        <label for="t1" style="text-align: left;color: black">Sr.no</label>
                        <textarea class="form-control" id="t1" rows="1" style="border-radius: 20px;width: 90%"></textarea>
                    </div>
                </li>              
            </ul>
    </nav>
<?php
}
else if($op=="admin")
{
	?>
		<nav id="sidebar">
            <div class="sidebar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="../../images/logo.png" style="height: 75px;width: 100%;background-color: white;margin-left: 15px;" align="center">
                </a>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <div class="card" style="background-color: #009bcc; width: 100%;position: relative;">
                        <img class="card-img-top" src="<?php echo str_replace("../", "../../",$row['photoPath']); ?>" alt="Card image cap" style="height: 75px;width: 100px;background-color: #eee;margin: auto;border: solid black 5px;position: absolute;top: 5px;left: 78px;border-radius: 50%">
                        <div class="card-body" style="background-color: #eee;border-radius: 20px;margin: 10px;margin-top: 55px">
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px;font-weight: bold;font-size: medium;"><?php echo ucwords($row["name"]); ?></p>
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px;font-size: small;"><?php echo ucwords($row["usergroup"]); ?></p>
                            
                        </div>
                    </div>
                </li>                
                <li>
                    <div align="center" style="padding-top: 20px">
                        <a href="../users/users.php"  style="background-color: white;color: black;border-radius: 20px;border-color: white;text-align:center;;width: 90%" ><i class="fas fa-user"></i> Users</a>
                    </div>
                </li>
                <li>
                    <div align="center" style="padding-top: 20px">
                        <a href="../lines/line.php" style="background-color: white;color: black;border-radius: 20px;border-color: white;width: 90%"><span class="align-left" style="display: inline-flex;align-items: left" ><i class="fas fa-th" style="vertical-align: left"></i></span><span> Lines</span>  </a>
                    </div>
                </li>
                
                <li>
                    <div align="center" style="padding-top: 20px;">
                        <a href="../stations/station.php" style="background-color: white;color: black;border-radius: 20px;border-color: white;width: 90%"><i class="fas fa-angle-down"></i> Stations</a>
                    </div>
                </li>  

                <li>
                    <div align="center" style="padding-top: 20px;">
                        <a href="../variants/variant.php" style="background-color: white;color: black;border-radius: 20px;border-color: white;width: 90%"><i class="fas fa-exclamation"></i> Variants</a>
                    </div>
                </li> 
                <li>
                   <div align="center" style="padding-top: 20px;">
                        <a href="../questions/question.php" style="background-color: white;color: black;border-radius: 20px;border-color: white;width: 90%"><i class="fas fa-question"></i> Questions</a>
                    </div>
                </li>           
            </ul>
        </nav>
        <?php
}

?>