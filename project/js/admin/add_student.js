// INTILIAZETION OF THE APPLICATION
var app = angular.module('add_atudent', []);

// CONTROLLER OF THE DASHBOARD
app.controller('add_atudent' , function ($scope, $http) {

     $http.get("../../php/fetch_common_details.php").then(function(res){
         console.log(res.data);
             // $scope.userDetails = localStorage.getItem('user_details');
             $scope.details = res.data;
             console.log($scope.details);
    });


    /*FUNTCTION TO ADD THE STUDENT DATABASE - PASS THE DATA OF STUDENT FORM THE FROM */
    $scope.addStudent = function () {
        //VARIABLE TO SHOW THE ERROR MESSAGE and SUCCESS MESSAGE ON FORM SUBMISSION
        $scope.success = 0;
        $scope.unsuccess = 0;
        if ($scope.stu.lname == undefined || $scope.stu.lname == null){
            $scope.stu.lname = "";
        }

        console.log($scope.stu);
        $http.post("../../php/admin/add_student.php", $scope.stu).then(function (res) {
            console.log(res.data);
            if (res.data == 1) {
                // alert("s");
                $scope.success = res.data;
                $scope.stu = null;
            }
            else{
                // alert("error");
                $scope.errorMsg = res.data;
                $scope.unsuccess = 1;
            }

        })
    }

});