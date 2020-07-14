// INTILIAZETION OF THE APPLICATION
var app = angular.module('add_faculty', []);

// CONTROLLER OF THE DASHBOARD
app.controller('add_faculty' , function ($scope, $http, $filter) {

    $http.get("../../php/fetch_common_details.php").then(function(res){
        console.log(res.data);
            $scope.details = res.data;
        });


    /*FUNTCTION TO ADD THE STUDENT DATABASE - PASS THE DATA OF STUDENT FORM THE FROM */
    $scope.addStudent = function () {
        //VARIABLE TO SHOW THE ERROR MESSAGE and SUCCESS MESSAGE ON FORM SUBMISSION
        $scope.success = 0;
        $scope.unsuccess = 0;
        if ($scope.faculty.lname == undefined || $scope.faculty.lname == null){
            $scope.faculty.lname = "";
        }
        $scope.faculty.dob = $filter('date')($scope.faculty.dob, "yyyy-MM-dd");
        // console.log($scope.faculty);
        $http.post("../../php/admin/add_faculty.php", $scope.faculty).then(function (res) {
            console.log(res.data);
            if (res.data == 1) {
                // alert("s");
                $scope.success = res.data;
                $scope.faculty = null;
            }
            else{
                // alert("error");
                $scope.errorMsg = res.data;
                $scope.unsuccess = 1;
            }

        })
    }

});