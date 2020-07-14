// INTILIAZETION OF THE APPLICATION
var app = angular.module('delete_student', []);

// CONTROLLER OF THE DASHBOARD
app.controller('delete_student' , function ($scope, $http) {
    $scope.colleteData = function () {
        $http.get('../../php/admin/fetch_student.php').then(function (res) {
            console.log(res.data);
            $scope.student = res.data;
        });
    }
    $scope.colleteData();
    $scope.delete_student = function (id) {
        if (confirm("delete the student")){
            $http.post('../../php/admin/delete_student.php', id).then(function (res) {
                console.log(res.data);
                $scope.colleteData();
            });
        }
    }

});