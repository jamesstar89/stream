angular.module('stream.post_listc', [])

.controller('post_listCtrl', function($scope, $rootScope, PostList) {
	
  	// reset overlay
	$('.stream.overlay').hide();
	$('body').removeClass('hide-interface');
	      
 	// save previous state
	$rootScope.previousState = "i";
    
    $scope.page.loaded = false;
        
    PostList.getPosts()
        .success(function(data) {
            $scope.posts = data;
            $scope.page.loaded = true;
            $(".ng-panel").css("height","auto");
        });
	
});