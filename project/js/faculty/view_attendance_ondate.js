// INTILIAZETION OF THE APPLICATION
var app = angular.module('add_marks', []);

console.log()
// CONTROLLER OF THE   ADD MARKS
app.controller('add_marks' , function ($scope, $http, $filter) {
        $http.post("../../php/faculty/fetch_faculty_subject.php",JSON.parse( localStorage.getItem('user_details'))).then(function (res) {
            console.log(res.data);
            $scope.list = res.data;
            // $scope.studentListFetched = 1;
        });

});