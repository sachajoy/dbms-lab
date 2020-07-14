var app = angular.module('newpass', []);

app.controller('newpass' , function ($scope, $http) {
    /* FUNCTION TO CHECK FOR USER */
    $scope.changePassword = function () {
        // console.log($scope.user)
        if($scope.user.newpass === $scope.user.reenter){
            // console.log("same");
            $scope.noMatch = 0;
            $http.post("../php/new_password.php", $scope.user).then(function (res) {
                console.log(res.data);
                if (res.data){
                    location.replace(res.data);
                }
            });
        } else{
            $scope.noMatch = 1;
        }
    }
});