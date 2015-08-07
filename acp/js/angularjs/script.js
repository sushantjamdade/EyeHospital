//Login Module Starts Here

var Login = angular.module("LoginModule", [])
Login.controller("LoginController", function ($scope, $http, jsonFilter) {
	
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	$scope.submitData = function (ULogin) {
		var config = {
			params: {
				ULogin: ULogin
			}
		};
		
		$http.post("loginproc.php", null, config)
		.success(function (data, status, headers, config) {
			
			console.log(data);
			$scope.getCallJSONResult = logResult(data, status, headers, config);
			if(data == "Success") {
				window.location.href = 'welcome.php';
			}
		})
		
		.error(function (data, status, headers, config) {
			$scope.getCallJSONResult = logResult(data, status, headers, config);
		});
	};
});

//Login Module Ends Here

//Change Password Module Starts Here

var ChangePwd = angular.module("ChangePwdModule", [])
ChangePwd.controller("ChangePwdController", function ($scope, $http, jsonFilter) {
	
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	$scope.submitData = function (UChangePwd) {
		var config = {
			params: {
				UChangePwd: UChangePwd
			}
		};
		
		$http.post("changepwd_proc.php", null, config)
		.success(function (data, status, headers, config) {			
			console.log(data);
			$scope.getChangePwdResult = logResult(data, status, headers, config);
			if(data == "Success") {
				window.location.href = 'changepassword.php';
			}
		})
		
		.error(function (data, status, headers, config) {
			$scope.getChangePwdResult = logResult(data, status, headers, config);
		});
	};
});

//Change Password Module Ends Here

//hospital add form Module Starts Here

var hospit = angular.module("HospitalModule", [])
hospit.controller("HospitalController", function ($scope, $http, jsonFilter) {
	
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	$scope.submitData = function (UHospital) {
		var config = {
			params: {
				UHospital: UHospital
			}
		};
		
		$http.post("", null, config)
		.success(function (data, status, headers, config) {			
			console.log(data);
			$scope.getChangePwdResult = logResult(data, status, headers, config);
			if(data == "Success") {
				window.location.href = '';
			}
		})
		
		.error(function (data, status, headers, config) {
			$scope.getChangePwdResult = logResult(data, status, headers, config);
		});
	};
});

//Add hopital Module Ends Here

