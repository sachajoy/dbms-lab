// INTILIAZETION OF THE APPLICATION
var app = angular.module('view_student', []);

// CONTROLLER OF THE   ADD MARKS
app.controller('view_student' , function ($scope, $http) {
    $scope.getStudentlist = function () {
        $http.get("../../php/fetch_common_details.php").then(function (res) {
            // console.log(res.data);
            $scope.list = res.data;
        })
    };
    $scope.getStudentlist();
    $scope.view_attendance = function () {
        // console.log($scope.list);

        $http.post("php/fetch_attendance.php", $scope.list).then(function (res) {
            // console.log(res.data);
            // $scope.list.attendance = [];
            $scope.showAttendance = 1;
            $scope.showMarks = 0;
            // console.log($scope.list);
            $scope.list.attendance = res.data;
            // console.log($scope.list);
        });
    };
    $scope.view_marks = function () {
        // console.log($scope.list);
        // $scope.list.marks = [];
        $http.post("php/fetch_marks.php", $scope.list).then(function (res) {
            // console.log(res.data);
            $scope.showMarks = 1;
            $scope.showAttendance = 0;
            // console.log($scope.list);
            $scope.list.totalMarks = 0;
            $scope.list.total  = 0;
            $scope.list.marks = res.data;
            // for(var i =0; i < $scope.list.marks.length;i++){
            //     $scope.list.totalMarks += $scope.list.marks[i].marks;
            //     $scope.list.total += $scope.list.marks[i].outof;
            //
            // }
            // console.log($scope.list);
        });
    };
});