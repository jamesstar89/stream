angular.module('stream.main', [])

.controller('mainCtrl', function($scope, $rootScope, $location, Main) {

	$scope.$on('setAuth', function(event, getAuth) {
		$scope.auth = getAuth.valid;
		$scope.userId = getAuth.userId;
		$scope.isAdmin = getAuth.isAdmin;
	});

	$scope.go = function (path) {
	 	$location.path(path);
	};
	
	$scope.page = {
		loaded: false
	}
	
	// get status
	Main.getStatus()
        .success(function(data) {
			$(".totals .stream-total").text(data.total.tag);
			$(".totals .post-total").text(data.total.post);
			if(typeof data.userTotals === "object") {
				$(".user-totals .stream-total").text(data.userTotals.tag);
				$(".user-totals .post-total").text(data.userTotals.post);
				$(".user-totals-wrapper .username").text(data.userTotals.email);
			}
        });
		
	// get recent tags
	Main.getRecentTags()
		.success(function(data) {
			for(var i = 0; i < data.length; i++) {
				$(".recent-tags").append("<a href='/tag/"+data[i].id+"#/list' style='margin-right:7px;display:inline-block'>"+data[i].name+"</a>");
			}
		});
		
});