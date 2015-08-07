//Login Module Starts Here
//Created by: ManyaSK
//Date: 06-August-2015

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
//Created by: ManyaSK
//Date: 06-August-2015

//Change Password Module Starts Here
//Created by: ManyaSK
//Date: 06-August-2015

var ChangePwd = angular.module("ChangePwdModule", [])
ChangePwd.controller("ChangePwdController", function ($scope, $http, jsonFilter) {
	
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	$scope.submitData = function (UChangePwd) {		
		var answer = confirm("Do you want to change password?")
		if (!answer) {
			//alert ("Hi");
		}
		else {
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
					$scope.contentLoaded = true;
				}
			})
			
			.error(function (data, status, headers, config) {
				$scope.getChangePwdResult = logResult(data, status, headers, config);
			});
		}		
	};
});

//Change Password Module Ends Here
//Created by: ManyaSK
//Date: 06-August-2015




