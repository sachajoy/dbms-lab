<?php
session_start();
if (isset($_SESSION)){
    if ($_SESSION['type_id'] != 1){
        echo "<script type=\"text/javascript\">location.href = '../../';</script>";
    }
    //        echo "vaild";
//    header("Location : ../../");
}
else
    echo "<script type=\"text/javascript\">location.href = '../../';</script>";
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Faculty</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Bootstrap core JavaScript-->
    <script src="../../vendor/jquery/jquery.min.js"></script>
    <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../../js/sb-admin-2.min.js"></script>
    <script src="../../js/admin/pageLoader.js"></script>
    <script src="../../js/angular.min.js"></script>
    <script src="../../js/admin/add_faculty.js"></script>

</head>

<body id="page-top" ng-app="add_faculty" ng-controller="add_faculty">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <div id="sidebar"></div>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <div id="navbar"></div>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Add Faculty</h1>

                <!--FROM TO ENTER THE STUDENT DATA-->
                <div class="col-md-8">
                    <form class="user" name="add_faculty" ng-submit="addStudent()" STYLE="padding-bottom: 70px;">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="regno" minlength="9" maxlength="9" type="number" class="form-control form-control-user" id="regno" placeholder="Registration Number" ng-model="faculty.regno" required>
                                <span ng-show="add_faculty.regno.$invalid && add_faculty.regno.$touched" style="color : red;">invaild</span>
                            </div>
                            <div class="col-sm-6">
                                <input name="Date of birth" type="date" class="form-control form-control-user" id="dob" placeholder="Date Of Birth" ng-model="faculty.dob" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="fname" placeholder="First Name" ng-model="faculty.fname" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="lname" placeholder="Last Name" ng-model="faculty.lname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="mobno" class="form-control form-control-user" id="mobno" placeholder="Mobile Number" ng-model="faculty.mobno" required pattern="^[6-9]\d{9}$">
                                <span ng-show="add_faculty.mobno.$invalid && add_faculty.mobno.$touched" style="color: red;"> Invalid Mobile Number</span>
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control form-control-user" id="email_id" placeholder="Email Id" ng-model="faculty.email_id" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="add1" placeholder="Address line 1" ng-model="faculty.add1" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="city" placeholder="City" ng-model="faculty.city" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="state" placeholder="State" ng-model="faculty.state" required>
                            </div>
                        </div>
                        <button class="btn btn-success btn-user" style="float: right;" type="submit">
                            Add Faculty
                        </button>
                    </form>
                    <div class="alert alert-success alert-dismissible" ng-show="success"><strong>SUCCESFUL !</strong> Student Name : {{faculty.fname}} <strong>CREATED</strong></div>
                    <div class="alert alert-danger alert-dismissible" ng-show="unsuccess"><strong>{{errorMsg}}</strong></div>

                </div>
            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->

        <!-- Footer -->
        <div id="footer"></div>
        <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<span id="scrollTop"></span>

<!-- Logout Modal-->
<span id="logoutModal"></span>



</body>

</html>
