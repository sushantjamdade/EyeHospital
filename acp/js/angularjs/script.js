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

//created by:pallavi
//08-Aug-15
//hospital add form Module Starts Here

var hospit = angular.module("HospitalModule", [])
hospit.controller("HospitalController", function ($scope, $http, jsonFilter) {
	
	$scope.url = 'hospital_proc.php';
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	$scope.submitData = function (UHospital) {
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			alert ("Hi");
		}
		else{
			
		var config = {
			params: {
				UHospital: UHospital
			}
		};
		
		$http.post($scope.url, null, config)
		.success(function (data, status, headers, config) {	
            //data = jsonFilter(data);
			$scope.getHospitalResult = logResult(data, status, headers, config);
			
		})
		
		.error(function (data, status, headers, config) {
			$scope.getHospitalResult = logResult(data, status, headers, config);
		});
		}
	};
	
	
	$scope.cancelData=function()
	{
		var agree=confirm("Do you want to Cancel?");
		
		if(agree)
		{
			alert("hi");
		}
		else
		{
			alert("hello");
			
		}
		
	};
	
});

// hospital Module Ends Here


//created by:pallavi
//Designation add form Module Starts Here

var design = angular.module("DesignModule", [])
design.controller("DesignController", function ($scope, $http, jsonFilter) {
	
	$scope.url='design_proc.php';
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	$scope.submitData = function (UDesign) {
		
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			alert ("Hi");
		}
		else{
			
		var config = {
			params: {
				UDesign: UDesign
			}
		};
		
		$http.post($scope.url, null, config)
		.success(function (data, status, headers, config) {	
           // data = jsonFilter(data);
			$scope.getDesignResult = logResult(data, status, headers, config);
			
		})
		
		.error(function (data, status, headers, config) {
			$scope.getDesignResult = logResult(data, status, headers, config);
		});
		}
	};
	
	
	$scope.cancelData=function()
	{
		var agree=confirm("Do you want to Cancel?");
		
		if(agree)
		{
			alert("hi");
		}
		else
		{
			alert("hello");
			
		}
		
	};
	
});

//Add Designation Module Ends Here




//created by:pallavi
//Branch add form Module Starts Here

var branch = angular.module("BranchModule", [])
branch.controller("BranchController", function ($scope, $http, jsonFilter) {
	
	$scope.url='branch_proc.php';
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	$scope.submitData = function (UBranch) {
		
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			alert ("Hi");
		}
		else{
			
		var config = {
			params: {
				UBranch: UBranch
			}
		};
		
		$http.post($scope.url, null, config)
		.success(function (data, status, headers, config) {	
           // data = jsonFilter(data);
			$scope.getBranchResult = logResult(data, status, headers, config);
			
		})
		
		.error(function (data, status, headers, config) {
			$scope.getBranchResult = logResult(data, status, headers, config);
		});
		}
	};
	
	
	$scope.cancelData=function()
	{
		var agree=confirm("Do you want to Cancel?");
		
		if(agree)
		{
			alert("hi");
		}
		else
		{
			alert("hello");
			
		}
		
	};
	
});

// Branch Module Ends Here


//created by:pallavi
//Specialization form Module Starts Here

var specialization = angular.module("SpecializationModule", [])
specialization.controller("SpecializationController", function ($scope, $http, jsonFilter) {
	
	$scope.url='special_proc.php';
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	$scope.submitData = function (USpecialization) {
		
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			alert ("Hi");
		}
		else{
			
		var config = {
			params: {
				USpecialization: USpecialization
			}
		};
		
		$http.post($scope.url, null, config)
		.success(function (data, status, headers, config) {	
           // data = jsonFilter(data);
			$scope.getSpecialResult = logResult(data, status, headers, config);
			
		})
		
		.error(function (data, status, headers, config) {
			$scope.getSpecialResult = logResult(data, status, headers, config);
		});
		}
	};
	
	
	$scope.cancelData=function()
	{
		var agree=confirm("Do you want to Cancel?");
		
		if(agree)
		{
			alert("hi");
		}
		else
		{
			alert("hello");
			
		}
		
	};
	
});

//Add Specialization Module Ends Here




//created by:pallavi
//Surgeryform Module Starts Here

var specialization = angular.module("SurgeryModule", [])
specialization.controller("SurgeryController", function ($scope, $http, jsonFilter) {
	
	$scope.url='surgery_proc.php';
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	$scope.submitData = function (USurgery) {
		
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			alert ("Hi");
		}
		else{
			
		var config = {
			params: {
				USurgery: USurgery
			}
		};
		
		$http.post($scope.url, null, config)
		.success(function (data, status, headers, config) {	
           // data = jsonFilter(data);
			$scope.getSurgeryResult = logResult(data, status, headers, config);
			
		})
		
		.error(function (data, status, headers, config) {
			$scope.getSurgeryResult = logResult(data, status, headers, config);
		});
		}
	};
	
	
	$scope.cancelData=function()
	{
		var agree=confirm("Do you want to Cancel?");
		
		if(agree)
		{
			alert("hi");
		}
		else
		{
			alert("hello");
			
		}
		
	};
	
});

//Add Surgeryform Module Ends Here