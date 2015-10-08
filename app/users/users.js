'use strict';
var rateMyBrew = angular.module('myApp.users', ['ngRoute','ngFileUpload'])


.config(['$routeProvider', function($routeProvider) {
  $routeProvider.when('/users', {
    templateUrl: 'users/list.html',
    controller: 'UserslistCtrl'
  });
  $routeProvider.when('/userview/:userId', {
    templateUrl: 'users/details.html',
    controller: 'UsersDetailsCtrl'
  });

}])

rateMyBrew.controller('UserslistCtrl', ['$scope', '$http',function($scope, $http) {
 $http.get('api/users').success(function(data) {
	   		$scope.users = data; //all user data
	   	});

}]);



rateMyBrew.controller('UsersDetailsCtrl', ['$scope', 'Upload', '$http', '$routeParams', function($scope, Upload, $http, $routeParams ) {
	 $scope.userId = $routeParams.userId;
	 var userid = $routeParams.userId;
	 
	 $http.get('api/userview/'+userid).success(function(data){
      	$scope.userdatas = data; //all user data
	  		
    });
    
  $scope.onFileSelect = function($files) {
  alert('test');
    //$files: an array of files selected, each file has name, size, and type.
    for (var i = 0; i < $files.length; i++) {
      var file = $files[i];
      Upload.upload({
          url: 'api/upload.php', 
		  method: 'POST',
		  file: file,
		  sendFieldsAs: 'form',
		  fields: {
			  tags: [ 'dark', 'moon' ]
			  },        progress: function(e){}
      }).then(function(data, status, headers, config) {
        // file is uploaded successfully
        console.log(data);
      }); 
    }
  }
    
	
	$scope.update = function(user) {
	 		$http({
	 			method: 'POST',
	 			url: 'api/edit_user',
	 			data: "id=" + user.id+ "&username=" + user.username+ "&password=" + user.password+ "&first_name=" + user.first_name+ "&surname=" + user.surname+ "&coffee_tea_pref=" + user.coffee_tea_pref+ "&coffee_sugar=" + user.coffee_sugar+ "&coffee_milk=" + user.coffee_milk+ "&coffeee_color=" + user.coffeee_color+ "&tea_sugar=" + user.tea_sugar+ "&tea_milk=" + user.tea_milk+ "&tea_color=" + user.tea_color+ "&coffee_bought_count=" + user.coffee_bought_count+ "&coffee_made_count=" + user.coffee_made_count+ "&average_brew_rating=" + user.average_brew_rating+ "&email=" + user.email+ "&gender=" + user.gender,
	 			headers: {'Content-Type': 'application/x-www-form-urlencoded'}
			}).then(function successCallback(response) {
					 
    		});

  }
	 
			 				
      
	

}]);