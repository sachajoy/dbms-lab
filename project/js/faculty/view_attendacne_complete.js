// INTILIAZETION OF THE APPLICATION
var app = angular.module('view_marks', []);

// CONTROLLER OF THE   ADD MARKS
app.controller('view_marks' , function ($scope, $http, $filter) {
    $http.post("../../php/faculty/fetch_faculty_subject.php",JSON.parse( localStorage.getItem('user_details'))).then(function (res) {
        console.log(res.data);
        $scope.list = res.data;
    });
    $scope.fetch_students = function () {
        $http.post("../../php/faculty/view_attendance_complete.php",$scope.list.selected_subject).then(function (res) {
            console.log(res.data);
            $scope.list.student = res.data;
            console.log($scope.list)

        });
    }
});