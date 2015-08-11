angular.module('EmployeeModule', ['ui.bootstrap']);
var EmployeeController = function ($scope) {
    $scope.open = function($event) {
        $event.preventDefault();
        $event.stopPropagation();

        $scope.opened = true;
      };

      $scope.dateOptions = {
        'year-format': "'yy'",
        'starting-day': 1
      };

      $scope.formats = ['dd/MM/yyyy', 'yyyy/MM/dd', 'shortDate'];
      $scope.format = $scope.formats[0];

     

     
};