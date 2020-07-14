var app = angular.module('login', []);

app.controller('login' , function ($scope, $http) {
    /* FUNCTION TO CHECK FOR USER */
    $scope.checkUser = function () {
       $http.post("php/login.php", $scope.user).then(function (res) {
           console.log(res.data);
           if (res.data.success == 1){
               localStorage.setItem('user_details', JSON.stringify(res.data));
               if (res.data.login_count == 2)
                   window.location.href = res.data.newpass_path;
               else
                   window.location.href = res.data.path_to_open;

           }else
               alert("Username oR password INvalid");
       });
    }
});