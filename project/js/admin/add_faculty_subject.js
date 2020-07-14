var app = angular.module('add_faculty_subject', []);

app.controller('add_faculty_subject',function ($scope, $http) {
    $http.get('../../php/fetch_common_details.php').then(function (res) {
        console.log(res.data);
        $scope.details = res.data;
    });
    $scope.addFacultySubject = function () {
        // console.log("add sub")
        // console.log(JSON.stringify($scope.faculty_subject));
        $http.post('../../php/admin/add_faculty_subject.php', $scope.faculty_subject).then(function (res) {
            console.log(res.data);
            if (res.data == 1)
                alert("Subject Added");
            else
                alert("Alrady have this Subject");
            $scope.faculty_subject = null;
        });
    }
});