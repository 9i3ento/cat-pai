var app = angular.module('myApp', []);
app.controller('DeviceCtrl', function($scope, $http) {
   $http.get("data.php")
   .then(function (response) {$scope.names = response.data.records;});
});
