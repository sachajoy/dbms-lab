// INTILIAZETION OF THE APPLICATION
var app = angular.module('add_attendance', []);

// CONTROLLER OF THE   ADD MARKS
app.controller('add_attendance' , function ($scope, $http,$filter) {
    $scope.list = 0;
    $scope.colletData = function(){
        $http.get("../../php/faculty/fetch_faculty_subject.php").then(function (res) {
            console.log(res.data);
            $scope.list = res.data;
            $scope.studentListFetched  = 1;

        });
    };
    $scope.colletData();
    $scope.fetch_students = function(){
        console.log($scope.list);
        $http.post("../../php/faculty/fetch_students.php",$scope.list.selected_subject).then(function (res) {
            console.log(res.data);
            $scope.list.student = res.data;
            // $scope.studentListFetched = 1;
        });
    };
    $scope.addAttendance = function () {
        // $scope.list.date = ($scope.list.date.getMonth() + 1) + '/' + $scope.list.date.getDate() + '/' +  $scope.list.date.getFullYear();
        $scope.list.date = $filter('date')($scope.list.date, "yyyy-MM-dd");
        console.log($scope.list);
        $http.post("../../php/faculty/mark_attendance.php", $scope.list).then(function (res) {
            console.log(res.data);
            if (res.data == 1){
                $scope.success = 1;
                $scope.unsuccess = 0;
                $scope.list.date = null;
                $scope.list = null;
                $scope.colletData();
            } else {
                $scope.success = 0;
                $scope.unsuccess = 1;
                $scope.errorMsg = res.data;
                $scope.list.date = null;
            }
        })
    }


});