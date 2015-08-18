//Login Module Starts Here

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
	
	$scope.add_form=true;
	$scope.list=true;
	$scope.add_but=true;
	$scope.add_hospitalbut=true;
	
	//$scope.url = 'hospital_proc.php';
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	
	
	$scope.add_hospital=function () {
		$scope.add_form=true;
	    $scope.list=true;
	    $scope.add_but=true;
		
		
	}
	
	$scope.submitData = function () {
		$scope.update_hos=false;
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			
		}
		else{
		
	       $http.post('adddb_hospital.php', 
                    {
                        'id'       : $scope.id,
                        'hname'    : $scope.hname, 
                          'address'    :   $scope.address ,
                          'city'    :     $scope.city,
                           'State1'   :    $scope.State1,
                            'pin'  :   $scope.pin,
                            'emailid'  :   $scope.emailid,
                             'phno' :   $scope.phno 
                       
                    }
                  )
                .success(function (data, status, headers, config) { 
				// alert(data);
                   alert("Data has been Added Successfully");                
                 window.location.href="hospital.php";
                   
                })
                .error(function(data, status, headers, config){

                });
		}
		
		
		
		
	};
	
	
	
	
	//List of hospital
		$scope.get_hospital = function(){
			$scope.list=false;
	       $scope.add_form=false;
    $http.get("load_hospital.php").success(function(data)
    {
		
        //$scope.product_detail = data;   
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        
 
    });
    
		}
		
		
		
//edit part of hospital
//13.8.15
	$scope.edit_hospital = function(index) { 
	
			$scope.update_hos=true;
			$scope.list=true;
	       $scope.add_form=true;
			$scope.add_but=false;
      
$http.post('editdb_hospital.php', { 'id' :index}) 
.success(function (data, status, headers, config) { 
alert(data[0]["hname"]);
$scope.id = data[0]["id"];
$scope.hname = data[0]["hname"];
$scope.address = data[0]["address"];
$scope.city = data[0]["city"];
$scope.State1 = data[0]["State1"];
$scope.pin = data[0]["pin"];
$scope.emailid = data[0]["emailid"];
$scope.phno = data[0]["phno"];
})
 
.error(function(data, status, headers, config){
 
});
}
	
	// code for update of hospital
	
	 $scope.update_hospital = function() {
 var y = confirm("DO you want update ?");
     if(y){
        $http.post('updatedb_hospital.php', 
                    {
                        'id'       : $scope.id,
                        'hname'    : $scope.hname, 
                          'address'    :   $scope.address ,
                          'city'    :     $scope.city,
                           'State1'   :    $scope.State1,
                            'pin'  :   $scope.pin,
                            'emailid'  :   $scope.emailid,
                             'phno' :   $scope.phno 
                       
                    }
                  )
                .success(function (data, status, headers, config) { 
                    alert("Data has been Updated Successfully");                
                   window.location.href="hospital.php";
                   
                })
                .error(function(data, status, headers, config){

                });
	 }
	 else{
		 
		  window.location.href="hospital.php";
	 }
	
			
			
	 
    }
	
	/** function to delete hospital from list of hospital referencing php **/
 
    $scope.delete_hospital = function(index) {  
     var x = confirm("DO you want to delete the record ?");
     if(x){
      $http.post('deletedb_hospital.php', 
            {
                'id'     : index
            }
        )      
        .success(function (data, status, headers, config) {               
             
             alert("You have deleted Successfully");
			   window.location.href="hospital.php"; 
        })
 
        .error(function(data, status, headers, config){
           
        });
      }else{
            
			 window.location.href="hospital.php";
			
      }
    }
	
	
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
design.controller("DesignController", function ($scope, $http) {
	
	 $scope.add_design=true;
	 
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	
	// add designation code
	$scope.submitData = function () {
		
		
		$scope.update_design=false;
		
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			        
                  window.location.href="design.php";       
		}
		else{
		
	       $http.post('adddb_designation.php', 
                    {
                        
                        'name'    : $scope.name, 
                         'address'    :   $scope.address 
                         
                       
                    }
                  )
                .success(function (data, status, headers, config) { 
				
                   alert("Data has been Added Successfully");  
              window.location.href="design.php";				   
                 
                   
                })
                .error(function(data, status, headers, config){

                });
				           
                   
		}
	};
	
	     //List of Designation
	$scope.get_designation = function(){
			
	      
    $http.get("load_designation.php").success(function(data)
    {
		
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        
 
    });
    
		}
		
		
//edit part of designation
//14.8.15
	$scope.edit_design = function(index) { 
	
			$scope.update_design=true;
		   $scope.add_design=false;
      
$http.post('editdb_designation.php', { 'id' :index}) 
.success(function (data, status, headers, config) { 
alert(data[0]["name"]);
$scope.id = data[0]["id"];
$scope.name = data[0]["name"];
$scope.address = data[0]["description"];

})
 
.error(function(data, status, headers, config){
 
});
}
	
	// code for update of designation
	
	 $scope.update_designation = function() {
 var y = confirm("DO you want update ?");
     if(y){
        $http.post('updatedb_designation.php', 
                    {
                        'id'       : $scope.id,
                        'name'    : $scope.name, 
                          'address'    :   $scope.address ,
                          
                       
                    }
                  )
                .success(function (data, status, headers, config) { 
                    alert("Data has been Updated Successfully");                
                  window.location.href="design.php"; 
                   
                })
                .error(function(data, status, headers, config){

                });
	 }
	 else{
		 
	 }
	
			
			
	 
    }
	
	
	
	
	/** function to delete designation from list of designation referencing php **/
 
    $scope.delete_design = function(index) {  
     var x = confirm("DO you want to delete the record ?");
     if(x){
      $http.post('deletedb_designation.php', 
            {
                'id'     : index
            }
        )      
        .success(function (data, status, headers, config) {               
             
             alert("You have deleted Successfully");
			  window.location.href="design.php"; 
        })
 
        .error(function(data, status, headers, config){
           
        });
      }else{
            
			 window.location.href="design.php"; 
			
      }
    }
 
	
	/*************************/
	
	
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

// Designation Module Ends Here




//created by:pallavi
//Branch add form Module Starts Here

var branch = angular.module("BranchModule", [])
branch.controller("BranchController", function ($scope, $http ) {
	     
			$scope.list=true;
	       $scope.add_form=true;
			$scope.add_but=false;
			$scope.add_branchbut=true;
	
	var logResult = function (data, status, headers, config) {
		return data;
	};
	$scope.add_branch=function () {
		$scope.add_form=true;
	    $scope.list=true;
	    $scope.add_but=true;
		
		
	}
	
	$scope.submitData = function () {
		$scope.update_br=false;
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			
		}
		else{
		
	       $http.post('adddb_branch.php', 
                    {
                        'id'       : $scope.id,
                        'name'    : $scope.name, 
                          'address'    :   $scope.address ,
                          'city'    :     $scope.city,
                           'State1'   :    $scope.State1,
                            'pin'  :   $scope.pin,
                            'emailid'  :   $scope.emailid,
                             'phno' :   $scope.phno 
                       
                    }
                  )
                .success(function (data, status, headers, config) { 
				// alert(data);
                   alert("Data has been Added Successfully");                
                 window.location.href="branch.php";
                   
                })
                .error(function(data, status, headers, config){

                });
		}
		
		
		
		
	};
	
	
	
	
	//List of branch
		$scope.get_branch = function(){
		$scope.list=false;
	      $scope.add_form=false;
    $http.get("load_branch.php").success(function(data)
    {
		
        
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        
 
    });
    
		}
		
		//edit part of branch
//14.8.15
	$scope.edit_branch = function(index) { 
	
			 $scope.update_br=true;
			$scope.list=true;
	       $scope.add_form=true;
			$scope.add_but=false;
      
$http.post('editdb_branch.php', { 'id' :index}) 
.success(function (data, status, headers, config) { 
alert(data[0]["name"]);
$scope.id = data[0]["id"];
$scope.name = data[0]["name"];
$scope.address = data[0]["address"];
$scope.city = data[0]["city"];
$scope.State1 = data[0]["State1"];
$scope.pin = data[0]["pin"];
$scope.emailid = data[0]["emailid"];
$scope.phno = data[0]["phno"];
})
 
.error(function(data, status, headers, config){
 
});
}
	
	// code for update of branch
	
	 $scope.update_branch = function() {
		 
 var y = confirm("DO you want update ?");
     if(y){
        $http.post('updatedb_branch.php', 
                    {
                        'id'       : $scope.id,
                        'name'    : $scope.name, 
                          'address'    :   $scope.address ,
                          'city'    :     $scope.city,
                           'State1'   :    $scope.State1,
                            'pin'  :   $scope.pin,
                            'emailid'  :   $scope.emailid,
                             'phno' :   $scope.phno 
                       
                    }
                  )
                .success(function (data, status, headers, config) { 
                    alert("Data has been Updated Successfully");                
                 window.location.href="branch.php";   
                   
                })
                .error(function(data, status, headers, config){

                });
	 }
	 else{
		 
	 }
	
			
	 
    }
	/** function to delete branch from list of branch referencing php **/
 
    $scope.delete_branch = function(index) {  
     var x = confirm("DO you want to delete the record ?");
     if(x){
      $http.post('deletedb_branch.php', 
            {
                'id'     : index
            }
        )      
        .success(function (data, status, headers, config) {               
             
             alert("You have deleted Successfully");
			  window.location.href="branch.php"; 
        })
 
        .error(function(data, status, headers, config){
           
        });
      }else{
            
			 window.location.href="branch.php"; 
			
      }
    }
	
	
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
	
	
	
	  $scope.add_spec=true;
	var logResult = function (data, status, headers, config) {
		return data;
	};
	
	
	// add the specialization data
		$scope.submitData = function () {
		$scope.update_spec=false;
		
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			        
                  window.location.href="specialization.php";       
		}
		else{
		
	       $http.post('adddb_specilization.php', 
                    {
                        'id'       : $scope.id,
                        'name'    : $scope.name, 
                         'address'    :   $scope.address 
                         
                       
                    }
                  )
                .success(function (data, status, headers, config) { 
				// alert(data);
                   alert("Data has been Added Successfully");  
              window.location.href="specialization.php";				   
                 
                   
                })
                .error(function(data, status, headers, config){

                });
				           
                       
		}
		
		
		
		
	};
	
	//List of specialization
		$scope.get_special = function(){
			
	      
    $http.get("load_specialization.php").success(function(data)
    {
		
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        
 
    });
    
		}
	
	
//edit part of specialization

//14.8.15
$scope.edit_special = function(index) { 
	
			 $scope.update_spec=true;
			 $scope.add_spec=false;
      
$http.post('editdb_specialization.php', { 'id' :index}) 
.success(function (data, status, headers, config) { 
alert(data[0]["name"]);
$scope.id = data[0]["id"];
$scope.name = data[0]["name"];
$scope.address = data[0]["description"];

})
 
.error(function(data, status, headers, config){
 
});
}


// update code for specialization
 $scope.update_special = function() {
 var y = confirm("DO you want update ?");
     if(y){
        $http.post('updatedb_specialization.php', 
                    {
                        'id'       : $scope.id,
                        'name'    : $scope.name, 
                          'address'    :   $scope.address ,
                          
                       
                    }
                  )
                .success(function (data, status, headers, config) { 
                    alert("Data has been Updated Successfully");  
                   				
                 // $scope.get_special();
				 window.location.href="specialization.php";
				 
				  
                   
                })
                .error(function(data, status, headers, config){

                });
				
				 
				 
	 }
	 else{
		 
		        
		 
	 }
 
    }
	/** function to delete specialization from list of specialization referencing php **/
 
    $scope.delete_special = function(index) {  
     var x = confirm("DO you want to delete record ?");
     if(x){
      $http.post('deletedb_specialization.php', 
            {
                'id'     : index
            }
        )      
        .success(function (data, status, headers, config) {               
             
             alert("You have deleted record Successfully");
			 window.location.href="specialization.php";
        })
 
        .error(function(data, status, headers, config){
           
        });
      }else{
            
			
      }
    }
	
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

// Specialization Module Ends Here





// Surgeryform starts Here

//created by:pallavi
//13-AUG-15

var listApp = angular.module('listpp', []);    
 
    listApp.controller('PhoneListCtrl', function ($scope, $http) {
	
	
	      $scope.add_sur = true;
		  
		$scope.surgery_submit = function() {
			$scope.update_prod = false;
        $http.post('surgerydb.php?action=add_surgery', 
            {
                'name'     : $scope.name, 
                'address'     : $scope.address, 
                'fees'    : $scope.fees
                
            }
        )
        .success(function (data, status, headers, config) {
          alert(JSON.stringify(data));
         window.location.href="surgery.php";
 
        })
 
        .error(function(data, status, headers, config){
           
        });
		
    }
 
 //function to check the uniqueness of the surgery name
	
	$scope.changeSurgery=function(name){
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
 
 
 //list of Surgery
 
  $scope.get_surgery = function(){
    $http.get("surgerydb.php?action=get_surgery").success(function(data)
    {
        //$scope.product_detail = data;   
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
 
    });
    }
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
    
    
	//edit part
	$scope.edit_surgery = function(index) { 
	
			$scope.update_prod = true;
			$scope.add_sur = false;
      
$http.post('surgerydb.php?action=edit_surgery', { 'id' :index}) 
.success(function (data, status, headers, config) { 
alert(data[0]["name"]);
$scope.id = data[0]["id"];
$scope.name = data[0]["name"];
$scope.address = data[0]["address"];
$scope.fees = data[0]["fees"];

 
})
 
.error(function(data, status, headers, config){
 
});
}


 /** function to update surgery details after edit from list of surgery referencing php **/

    $scope.update_surgery = function() {
 var y = confirm("DO you want update ?");
     if(y){
        $http.post('surgerydb.php?action=update_surgery', 
                    {
                        'id'            : $scope.id,
                        'name'     : $scope.name, 
                        'address'     : $scope.address, 
                        'fees'    : $scope.fees
                       
                    }
                  )
                .success(function (data, status, headers, config) {                 
                 
                   alert("Data has been Updated Successfully");
				   window.location.href="surgery.php";
                })
                .error(function(data, status, headers, config){

                });
	 }
	 else{
		 
	 }
    }

   
	
	/** function to delete surgery from list of surgery referencing php **/
 
    $scope.delete_surgery = function(index) {  
     var x = confirm("DO you want to delete surgery name ?");
     if(x){
      $http.post('surgerydb.php?action=delete_surgery', 
            {
                'id'     : index
            }
        )      
        .success(function (data, status, headers, config) {               
            
             alert("You have deleted Successfully");
			 window.location.href="surgery.php";
        })
 
        .error(function(data, status, headers, config){
           
        });
      }else{
            
			
      }
    }
 
 
});

//***

// Complaint Master starts Here

//created by:Sushant
//17-AUG-15

var appComplaint = angular.module('appComplaint', []);    
 
appComplaint.controller('ctrlComplaint', function ($scope, $http) {

$scope.add_Complaint=true;	

$scope.submitData = function () {
		$scope.update_hos=false;
		var answer = confirm("Do you want to Submit?")
		if (!answer) {
			
		}
		else{
		
	       $http.post('addComplaint.php', 
                    {
                        'complaint':$scope.complaint,
                        'description':$scope.description 
                       
                    }
                  )
                .success(function (data, status, headers, config) { 
				 //alert(jscon.stringify(data));
                  alert("Data has been Added Successfully");                
                 window.location.href="complaint.php";
                   
                })
                .error(function(data, status, headers, config){

                });
		}
	};
	
	
	//List of Complaint
 
  $scope.get_surgery = function(){
    $http.get("surgerydb.php?action=get_surgery").success(function(data)
    {
        //$scope.product_detail = data;   
        $scope.pagedItems = data;    
        $scope.currentPage = 1; //current page
        $scope.entryLimit = 5; //max no of items to display in a page
        $scope.filteredItems = $scope.pagedItems.length; //Initially for no filter  
        $scope.totalItems = $scope.pagedItems.length;
    });
    }
    $scope.setPage = function(pageNo) {
        $scope.currentPage = pageNo;
    };
 
});


