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
    <link rel="stylesheet" href="../../style2.css">
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
            include '../../sidebar.php';
        ?>
        <!-- Page Content  -->
        <div id="content">
            <?php
                include '../../header.php';
            ?>
            <div class="row">
                <div class="col-sm-12">
                    <div class="maintxt" style="height: 200px;">
                        <h4 class="centered" style="text-align: center;color: white;width: 100%;padding: 0px;font-weight: bold">Andon Management System</h4>
                    </div>
                </div>
            </div>

            <div class="row" style="justify-content: center;align-content: center; margin-top: 10px;">
                <h2>Add/Delete Users</h2>
            </div>
            <div class="row" style="margin-right: 20px; margin-left: 20px;">
                <div class="col-md-1"></div>
                <div class="col-md-5 formContainerAdmin">
                    <h4 style="text-align: center;">Add User</h4>
                    <form action="signaccount.php" method="post">
                        <div class="form-group">
                            <div class="row">
                                <label for="name" style="font-weight: bold;">Name:</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name"/>
                                <div class="invalid-feedback">Invalid Name</div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <label for="designation" style="font-weight: bold;">Designation:</label>
                                <input type="text" class="form-control" id="designation" name="designation" placeholder="Enter Designation"/>
                                <div class="invalid-feedback">Invalid Designation</div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <label for="email" style="font-weight: bold;">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email"/>
                                <div class="invalid-feedback">Invalid Email</div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <label for="password" style="font-weight: bold;">Password:</label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password"/>
                                <div class="invalid-feedback">Invalid Pasword</div>
                            </div>
                            <div class="row" style="margin-top: 5px;">
                                <label for="usergroup" style="font-weight: bold;">Select Usergroup:</label>
                                <select class="form-control" id="usergroup" name="usergroup">
                                    <option value="" selected="true" disabled="true">Select</option>
                                    <option value="operator">Operator</option>
                                    <option value="floor manager">Floor Manager</option>
                                    <option value="admin">Admin</option>
                                </select>
                                <div class="invalid-feedback">Please Select an Usergroup</div>
                            </div>
                            <div class="row" style="margin-top: 10px; justify-content: center;">
                                <button class="btn btn-primary" type="submit">Add</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-5 formContainerAdmin">
                    <h4 style="text-align: center;">Delete User</h4>
                    <form action="deleteaccount.php" method="post">
                        <div class="form-group">
                            <div class="row" style="margin-top: 5px;">
                                <label for="email" style="font-weight: bold;">Email:</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email"/>
                                <div class="invalid-feedback">Invalid Email</div>
                            </div>
                            <div class="row" style="margin-top: 10px; justify-content: center;">
                                <button class="btn btn-primary" type="submit">Delete</button>
                            </div>
                        </div>
                    </form>
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
            window.location.assign("../../logout.php");
        }
    </script>

</body>

</html>

<?php
    } else {
        header("Location: login.php");
    }
?>