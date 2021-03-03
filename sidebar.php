<?php
if($op=="operator")
{
 echo '<nav id="sidebar">
            <div class="sidebar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="logo.png" style="height: 75px;width: 100%;background-color: white;margin-left: 15px;" align="center">
                </a>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <div class="card" style="background-color: #009bcc; width: 100% ">
                        <img class="card-img-top rounded-circle" src="logo.png" alt="Card image cap" style="height: 75px;width: 100px;background-color: #eee;margin: auto;border: solid black 3px;">
                        <div class="card-body" style="background-color: #eee;">
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px"><?php echo ucwords($row["name"]); ?></p>
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px"><?php echo ucwords($row["usergroup"]); ?></p>
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px"><?php echo ucwords($row["designation"]); ?></p>
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
                        <button class="btn btn-secondary btn-lg" type="submit" style="background-color: white;color: black;border-radius: 20px;border-color: white;width: 90%"><span class="align-left" style="display: inline-flex;align-items: left" ><i class="fas fa-tasks" style="vertical-align: left"></i></span><span> Instructions</span>  </button>
                    </div>
                </li>
                <li>
                   <div align="center" style="padding-top: 20px;">
                        <button class="btn btn-secondary btn-lg" type="submit" style="background-color: white;color: black;border-radius: 20px;border-color: white;width: 90%"><i class="fas fa-exclamation"></i> Andons</button>
                    </div>
                </li>
                <li>
                    <div align="center" style="padding-top: 20px">
                        <label for="t1" style="text-align: left;color: black">Sr.no</label>
                        <textarea class="form-control" id="t1" rows="1" style="border-radius: 20px;width: 90%"></textarea>
                    </div>
                </li>              
            </ul>
        </nav>';
}
else if($op=="floor manager")
{
	echo '<nav id="sidebar">
            <div class="sidebar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="logo.png" style="height: 75px;width: 100%;background-color: white;margin-left: 15px;" align="center">
                </a>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <div class="card" style="background-color: #009bcc; width: 100% ">
                        <img class="card-img-top rounded-circle" src="logo.png" alt="Card image cap" style="height: 75px;width: 100px;background-color: #eee;margin: auto;border: solid black 3px;">
                        <div class="card-body" style="background-color: #eee;">
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px"><?php echo ucwords($row["name"]); ?></p>
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px"><?php echo ucwords($row["usergroup"]); ?></p>
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px"><?php echo ucwords($row["designation"]); ?></p>
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
        </nav>';

}
else if($op=="admin")
{
	echo '<nav id="sidebar">
            <div class="sidebar-header">
                <a class="navbar-brand" href="#">
                    <img alt="Brand" src="logo.png" style="height: 75px;width: 100%;background-color: white;margin-left: 15px;" align="center">
                </a>
            </div>
            <ul class="list-unstyled components">
                <li>
                    <div class="card" style="background-color: #009bcc; width: 100% ">
                        <img class="card-img-top rounded-circle" src="logo.png" alt="Card image cap" style="height: 75px;width: 100px;background-color: #eee;margin: auto;border: solid black 3px;">
                        <div class="card-body" style="background-color: #eee;">
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px"><?php echo ucwords($row["name"]); ?></p>
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px"><?php echo ucwords($row["usergroup"]); ?></p>
                            <p class="card-text" style="color: black;padding: 0px;text-align: center;margin-bottom: 0px"><?php echo ucwords($row["designation"]); ?></p>
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
                   <div align="center" style="padding-top: 20px;">
                        <button class="btn btn-secondary btn-lg" type="submit" style="background-color: white;color: black;border-radius: 20px;border-color: white;width: 90%"><i class="fas fa-exclamation"></i> Add/Delete</button>
                    </div>
                </li>
                <li>
                    <div align="center" style="padding-top: 20px">
                        <label for="t1" style="text-align: left;color: black">Sr.no</label>
                        <textarea class="form-control" id="t1" rows="1" style="border-radius: 20px;width: 90%"></textarea>
                    </div>
                </li>              
            </ul>
        </nav>';
}

?>