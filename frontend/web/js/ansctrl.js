var answer = angular.module("answer", ["mgo-angular-wizard"])
answer.controller("answerCtrl", function($scope,$http,$sce) {
	$scope.csrfToken = $('meta[name="csrf-token"]').attr("content");
	$scope.paperid = 0;
	$scope.subjects = [];
	$scope.postdata = {};
	$scope.trustAsHtml = $sce.trustAsHtml;

	$scope.getPaper = function(paperid){
		$http({
	        method: 'POST',
	        url: 'index.php?r=studentpaper/examdata',
	        headers: {
	        	"Content-Type": "application/x-www-form-urlencoded",
	        	"X-CSRF-Token": $scope.csrfToken
	        },
	        data: $.param({
	        	paperid: paperid
	        }),
	        }).then(function successCallback(response) {
	        	//console.log(response.data)
	        	$scope.subjects = response.data
	        	angular.forEach($scope.subjects,function(value,key){
	        		$scope.postdata[key] = {}
	        		$scope.postdata[key]['sub_id'] = value.id
	        		$scope.postdata[key]['total_score'] = value.maxval
	        		if(0 == value.type ){
	        			$http({
					        method: 'POST',
					        url: 'index.php?r=studentpaper/selection',
					        headers: {
					        	"Content-Type": "application/x-www-form-urlencoded",
					        	"X-CSRF-Token": $scope.csrfToken
					        },
					        data: $.param({
					        	subid: value.id
					        }),
					        }).then(function successCallback(response) {
					        	$scope.subjects[key].choice = response.data
					      	}, function errorCallback(response) {
					    });
	        		}
	        		else{
	        			$scope.subjects[key].choice = '';
	        		}
	        	})
	      	}, function errorCallback(response) {
	    });
	}

	$scope.getContent = function(obj){
		return obj.value + " " + obj.text;
	}

	$scope.dif = function(difstr){
		$scope.arr = ['简单','交易','普通','较难','难'];
		//console.log($scope.arr[difstr])
		return $scope.arr[difstr];
	}

	$scope.getsel = function(str){
		$http({
	        method: 'POST',
	        url: 'index.php?r=studentpaper/selection',
	        headers: {
	        	"Content-Type": "application/x-www-form-urlencoded",
	        	"X-CSRF-Token": $scope.csrfToken
	        },
	        data: $.param({
	        	subid: str
	        }),
	        }).then(function successCallback(response) {
	        	let selections = response.data
	        	//console.log(selections)
	      	}, function errorCallback(response) {
	    });

	}

	$scope.getParameterByName = function(name, url) {
	    if (!url) url = window.location.href;
	    name = name.replace(/[\[\]]/g, "\\$&");
	    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
	        results = regex.exec(url);
	    if (!results) return null;
	    if (!results[2]) return '';
	    return decodeURIComponent(results[2].replace(/\+/g, " "));
	}

	$scope.getCheck = function(){
		$scope.tempdata = angular.toJson($scope.postdata)
		
		$http({
	        method: 'POST',
	        url: 'index.php?r=studentpaper/setanswer',
	        headers: {
	        	"Content-Type": "application/x-www-form-urlencoded",
	        	"X-CSRF-Token": $scope.csrfToken
	        },
	        data: $.param({
	        	data: $scope.tempdata,
	        	paperid: $scope.paperid,
	        }),
	        }).then(function successCallback(response) {
	        	alert("交卷完成"); 
				window.history.back(-1); 
	      	}, function errorCallback(response) {
	    });
	}

	$scope.paperid = $scope.getParameterByName('paperid',window.location.href)
	
	//console.log($scope.paperid)
	$scope.getPaper($scope.paperid);
})