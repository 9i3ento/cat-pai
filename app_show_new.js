var app = angular.module('new_device_app', []);
app.controller('new_device_ctrl', function($scope, $http) {
   $http.get("device_data_new_device.php")
   .then(function (response) {$scope.names = response.data.records;});
});
