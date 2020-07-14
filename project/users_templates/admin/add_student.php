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

    <title>Add Student</title>

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
    <script src="../../js/admin/add_student.js"></script>

</head>

<body id="page-top" ng-app="add_atudent" ng-controller="add_atudent">

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
                <h1 class="h3 mb-4 text-gray-800">Add Student</h1>

                <!--FROM TO ENTER THE STUDENT DATA-->
                <div class="col-md-8">
                    <form class="user" name="add_student" ng-submit="addStudent()" STYLE="padding-bottom: 70px;">
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input name="rollno" minlength="9" maxlength="9" type="number" class="form-control form-control-user" id="rollno" placeholder="Roll Number" ng-model="stu.rollno" required>
                                <span ng-show="add_student.rollno.$invalid && add_student.rollno.$touched" style="color : red;">invaild</span>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-control" ng-model="stu.branch" required>
                                    <option ng-repeat="x in details.branch" ng-value="x.id">{{x.name}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="fname" placeholder="First Name" ng-model="stu.fname" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="lname" placeholder="Last Name" ng-model="stu.lname">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="father_name" placeholder="Father Name" ng-model="stu.father_name" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="mother_name" placeholder="Mother Name" ng-model="stu.mother_name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" name="mobno" class="form-control form-control-user" id="mobno" placeholder="Mobile Number" ng-model="stu.mobno" required pattern="^[6-9]\d{9}$">
                                <span ng-show="add_student.mobno.$invalid && add_student.mobno.$touched" style="color: red;"> Invalid Mobile Number</span>
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control form-control-user" id="email_id" placeholder="Email Id" ng-model="stu.email_id" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="add1" placeholder="Address line 1" ng-model="stu.add1" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="add2" placeholder="Address line 2" ng-model="stu.add2" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-6 mb-3 mb-sm-0">
                                <input type="text" class="form-control form-control-user" id="city" placeholder="City" ng-model="stu.city" required>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="form-control form-control-user" id="state" placeholder="State" ng-model="stu.state" required>
                            </div>
                        </div>
                        <button class="btn btn-success btn-user" style="float: right;" type="submit">
                            Add Student
                        </button>
                    </form>
                    <div class="alert alert-success alert-dismissible" ng-show="success"><strong>SUCCESFUL !</strong> Student Name : {{stu.fname}} <strong>CREATED</strong></div>
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
