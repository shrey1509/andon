<?php
    session_start();
    if(isset($_SESSION['userid'])) {
        include 'resources/connect.php';
        $tableName = "employee";
        $id = $_SESSION['userid'];
        $sql = "SELECT * FROM $tableName WHERE id = $id";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Floor Manager</title>

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
        <nav id="sidebar">
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
                        <button class="btn btn-secondary btn-lg" type="submit" style="background-color: white;color: black;border-radius: 20px;border-color: white;width: 90%"><span class="align-left" style="display: inline-flex;align-items: left" ><i class="fas fa-user" style="vertical-align: left"></i></span><span>Members</span>  </button>
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
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light custcol">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-bars"></i>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                    </div>
                    <button type="button" id="logoutButton" class="btn navbar-right round">Logout</button>
                </div>
            </nav>
            <div class="row">
                <div class="col-sm-12">
                    <div class="maintxt" style="height: 200px;">
                        <h4 class="centered" style="text-align: center;color: white;width: 100%;padding: 0px;font-weight: bold">Andon Management System</h4>
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
    </script>

</body>

</html>

<?php
    } else {
        header("Location: login.html");
    }
?>