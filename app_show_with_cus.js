var app = angular.module('with_cus_app', []);
app.controller('with_cus_ctrl', function($scope, $http) {
   $http.get("device_data_with_customer.php")
   .then(function (response) {$scope.names = response.data.records;});
});
