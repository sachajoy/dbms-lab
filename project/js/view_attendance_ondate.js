// INTILIAZETION OF THE APPLICATION
var app = angular.module('view_attendance_ondate', []);

// CONTROLLER OF THE   ADD MARKS
app.controller('view_attendance_ondate' , function ($scope, $http, $filter) {
    $scope.getStudentlist = function () {
        $http.get("php/fetch_common_details.php").then(function (res) {
            // console.log(res.data);
            $scope.list = res.data;
        })
    };
    $scope.getStudentlist();
    $scope.view_attendance = function () {
        // console.log("view att")
        $scope.list.date = $filter('date')($scope.list.date , 'yyyy-MM-dd');
        $http.post("php/view_attendance_ondate.php", $scope.list).then(function (res) {
            console.log(res.data);
            $scope.list.attendance = res.data;
            $scope.showAttendance = 1;
        });
    }

});