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
	
	//$scope.url = 'hospital_proc.php';
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
		
		$http.post("hospital_proc.php", null, config)
		.success(function (data, status, headers, config) {	
            //data = jsonFilter(data);
			$scope.getHospitalResult = logResult(data, status, headers, config);
			{
				window.location.href="list_hospital.php";
			}
			
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
//List of Hospital Starts Here
//11.8.15
var hospitallist = angular.module("ListHospitalModule", [])
hospitallist.controller("ListHospitalController", function ($scope, $http) {
	
	$scope.get_product = function(){
    $http.get("db.php?action=get_product").success(function(data)
    {
		
        //$scope.product_detail = data;   
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        
 
    });
    }
	
});

//list of hospital ends here

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

var surgery = angular.module("SurgeryModule", [])
surgery.controller("SurgeryController", function ($scope, $http, jsonFilter) {
	
	$scope.url='surgery_proc.php';
	var logResult = function (data, status, headers, config) {
		return  data ;
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
	
	
	//function to check the uniqueness of the surgery name
	
	$scope.changeSurgery=function(USurgery){
		var config = {
        params: {
          USurgery: USurgery
        }
      };
		  $http.post("check_surgery.php",null,config).success(function (data, status, headers, config) {
			  
			  //data = jsonFilter(data);
        $scope.getChangeSurgery = logResult(data, status, headers, config);
    });
		
		
	};
	
});

//Add Surgeryform Module Ends Here



//created by:pallavi
//10-AUG-15
//add employee Module Starts Here

var employee = angular.module("EmployeeModule", [])
employee.controller("EmployeeController", function ($scope, $http, jsonFilter) {
	
	
	
	
	$scope.url='addemployee_proc.php';
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	$scope.submitData = function (UEmployee) {
		
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			alert ("Hi");
		}
		else{
			
		var config = {
			params: {
				UEmployee: UEmployee
			}
		};
		
		$http.post($scope.url, null, config)
		.success(function (data, status, headers, config) {	
           // data = jsonFilter(data);
			$scope.getEmployeeResult = logResult(data, status, headers, config);
			
			
		})
		
		.error(function (data, status, headers, config) {
			$scope.getEmployeeResult = logResult(data, status, headers, config);
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
	
	//dropdown for designation
	$scope.selectedDesignation = null;
    $scope.designAccounts = [];

    $http({
            method: 'GET',
            url: 'get_designation.php',
            data: { applicationId: 3 }
        }).success(function (result) {
        $scope.designAccounts = result;
    });
    
	
	//dropdown for Specialization
	$scope.selectedSpecial = null;
    $scope.specialAccounts = [];

    $http({
            method: 'GET',
            url: 'get_specialisation.php',
            data: { applicationId: 3 }
        }).success(function (result) {
        $scope.specialAccounts = result;
    });
	
});

//Add Employee Module Ends Here