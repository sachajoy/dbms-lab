<?php
session_start();
if (isset($_SESSION)){
    if ($_SESSION['type_id'] != 2){
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

    <title>Student Details</title>

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
    <script src="../../js/faculty/pageloder.js"></script>
    <script src="../../js/angular.min.js"></script>
    <script src="../../js/view_student.js"></script>

</head>

<body id="page-top" ng-app="view_student" ng-controller="view_student">

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
                <h1 class="h3 mb-4 text-gray-800">View Student Details</h1>
                <form class="user">
                    <div class="form-group row">
                        <div class="col-sm-4 mb-3 mb-sm-0">
                            <select class="form-control" ng-model="list.selected_student" required>
                                <option ng-repeat="stu in list.student" ng-value="stu">{{stu.rollno}} - {{stu.fname | uppercase}} {{stu.lname | uppercase}}</option>
                            </select>
                        </div>
<!--                        <div class="col-sm-4 mb-3 mb-sm-0">-->
<!--                            <button class="btn btn-success btn-user" type="submit" ng-click="getDetails()"> View Student </button>-->
<!--                        </div>-->
                    </div>
                </form>
                <table class="table table-bordered table-hover">
                    <tr>
                        <th>Roll No : </th>
                        <td>{{list.selected_student.rollno}}</td>
                        <th>Branch: </th>
                        <td>{{list.selected_student.branch}}</td>
                    </tr>
                    <tr>
                        <th>First Name : </th>
                        <td>{{list.selected_student.fname | uppercase}}</td>
                        <th>Last Name : </th>
                        <td>{{list.selected_student.lname | uppercase}}</td>
                    </tr>
                    <tr>
                        <th>Father Name : </th>
                        <td>{{list.selected_student.father_name | uppercase}}</td>
                        <th>Mother Name: </th>
                        <td>{{list.selected_student.mother_name | uppercase}}</td>
                    </tr>
                    <tr>
                        <th>Mobile Number: </th>
                        <td>+91 {{list.selected_student.mobno}}</td>
                        <th>Email ID: </th>
                        <td>{{list.selected_student.email_id}}</td>
                    </tr>
                    <tr>
                        <th>Address 1 : </th>
                        <td>{{list.selected_student.add1 | uppercase}}</td>
                        <th>Address 2: </th>
                        <td>{{list.selected_student.add2 | uppercase}}</td>
                    </tr>
                    <tr>
                        <th>City : </th>
                        <td>{{list.selected_student.city | uppercase}}</td>
                        <th>State: </th>
                        <td>{{list.selected_student.state | uppercase}}</td>
                    </tr>
                </table>
                <select class="col-4" ng-model="list.selected_subject" required>
                    <option ng-repeat="sub in list.subject" ng-value="sub">{{sub.name}}</option>
                </select>
                <button class="btn btn-primary btn-user" ng-click="view_attendance()">View Attendance</button>
                <button class="btn btn-primary btn-user" ng-click="view_marks()">View Marks</button>
                <table class="table table-bordered table-hover" ng-show="showAttendance">
                    <tr>
                        <th>Date :</th>
                        <th>Present / Absent:</th>
                    </tr>
                    <tr ng-repeat="att in list.attendance">
                        <td>{{att.date | date : "dd MMMM yyyy"}}</td>
                        <td>
                            <span ng-if="att.att == 1" style="color: green;">Present</span>
                            <span ng-if="att.att == 0" style="color: red;">Abseent</span>
                        </td>
                    </tr>
                </table>
                <table class="table table-bordered table-hover" ng-show="showMarks">
                    <tr>
                        <th>Date :</th>
                        <th>Marks :</th>
                        <th>Out Of :</th>
                    </tr>
                    <tr ng-repeat="marks in list.marks">
                        <td>{{marks.date | date : "dd MMMM yyyy"}}</td>
                        <td>{{marks.marks}}</td>
                        <td>{{marks.outof}}</td>
                    </tr>
<!--                    <tr>-->
<!--                        <td>Total : </td>-->
<!--                        <td>{{ list.totalMarks }}</td>-->
<!--                        <td>{{ list.total }}</td>-->
<!--                    </tr>-->
                </table>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- End of Main Content -->
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
