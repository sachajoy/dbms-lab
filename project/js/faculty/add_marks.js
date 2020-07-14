// INTILIAZETION OF THE APPLICATION
var app = angular.module('add_marks', []);

console.log()
// CONTROLLER OF THE   ADD MARKS
app.controller('add_marks' , function ($scope, $http, $filter) {
    $scope.colletData = function(){
        $http.post("../../php/faculty/fetch_faculty_subject.php",JSON.parse( localStorage.getItem('user_details'))).then(function (res) {
            console.log(res.data);
            $scope.list = res.data;
            // $scope.studentListFetched = 1;
        });
    };
    $scope.colletData();
    $scope.selected_subject = function(){
        console.log($scope.list);
        $http.post("../../php/faculty/fetch_students.php",$scope.list.selected_subject).then(function (res) {
            console.log(res.data);
            $scope.list.student = res.data;
            // $scope.studentListFetched = 1;
        });
    };

    // $scope.test = function () {
    //     console.log($scope.list);
    // }

    $scope.addMarks = function () {
        $scope.list.date = $filter('date')($scope.list.date, "yyyy-MM-dd");
        console.log($scope.list);
        $http.post("../../php/faculty/add_marks.php", $scope.list).then(function (res) {
            console.log(res.data);
            if (res.data == 1)
            {
                $scope.unsuccess = 0;
                $scope.success = 1;
                $scope.list = null;
                $scope.colletData();

            }else
            {
                $scope.errorMsg = res.data;
                $scope.unsuccess = 1;
                $scope.success = 0;
            }
        })
    }

});