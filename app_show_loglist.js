var app = angular.module('log_list_app', []);
app.controller('log_list_ctrl', function($scope, $http) {
   $http.get("data_loglist.php")
   .then(function (response) {$scope.names = response.data.records;});
});
