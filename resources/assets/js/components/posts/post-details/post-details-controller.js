angular.module('stream.post_detailsc', [])

.controller('post_detailsCtrl', function($scope, $rootScope, $sce, PostDetails) {

	$scope.postId = getPostId();
	$scope.trustAsHtml = $sce.trustAsHtml;

	// reset overlay
	$('.stream.overlay').hide();
	$('body').removeClass('hide-interface');

	// save previous state
	$rootScope.previousState = "detail";

	$scope.page.loaded = false;

	function getPostId() {
		var href = location.href;
		var post = href.split("post")[1];
		var hash = post.split("#")[0]
		var id = hash.split("/")[1];
		return id;
	}

	function saveDetails(data) {
		$rootScope.details = data;
	}

    PostDetails.get($scope.postId)
        .success(function(data) {
        	// save to local scope
            $scope.details = data;
            $scope.page.loaded = true;
            $(".ng-panel").css("height","auto");
            // save to rootScope
            saveDetails(data);
        });

});