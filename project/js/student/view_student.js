// INTILIAZETION OF THE APPLICATION
var app = angular.module('view_student', []);

// CONTROLLER OF THE   ADD MARKS
app.controller('view_student' , function ($scope, $http) {
        $http.get("../../php/student/view_student.php").then(function (res) {
            console.log(res.data);
            $scope.list = res.data;
        });
    $http.get("../../php/student/fetch_subject.php").then(function (res) {
        console.log(res.data);
        $scope.list.subject = res.data;
        console.log($scope.list);
    });

    $scope.view_attendance = function () {
        // console.log($scope.list);

        $http.post("../../php/student/fetch_attendance.php", $scope.list).then(function (res) {
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
        $http.post("../../php/student/fetch_marks.php", $scope.list).then(function (res) {
            // console.log(res.data);
            $scope.showMarks = 1;
            $scope.showAttendance = 0;
            $scope.list.marks = res.data;
            console.log($scope.list);
        });
    };
});