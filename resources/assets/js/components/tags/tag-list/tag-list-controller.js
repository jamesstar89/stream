angular.module('stream.tag_listc', [])

.controller('tag_listCtrl', function($scope, $rootScope, TagList, $state, $stateParams, $sce) {

	$scope.state = $state.current.name;
	$scope.trustAsHtml = $sce.trustAsHtml;
	
    $('.stream.overlay').hide();
    $('body').removeClass('hide-interface');

    var tagId = "", tagName = "";

	function getTagId() {
		var href = location.href;
		var post = href.split("tag")[1];
		var hash = post.split("#")[0]
		var id = hash.split("/")[1];
		return id;
	}
     
	if($scope.state === "list") {
		
		$rootScope.previousState = "list";
		
		tagId = getTagId();
		
		TagList.getTags(tagId)
			.success(function(data) {
				
				$scope.tags = data;
				$scope.page.loaded = true;
				$(".ng-panel").css("height","auto");
			});
		
	} else if($scope.state === "name") {	
		
		$rootScope.previousState = "name";
		
		var url = location.href;
		var start = url.indexOf("/s/") + 3;
		var end = url.indexOf("#");
		
		tagName = url.substring(start, end);
		
		TagList.getLikeName(tagName)
			.success(function(data) {
				var parse = data.tags;		
				$scope.tags = parse;
				$scope.page.loaded = true;
				$(".ng-panel").css("height","auto");
			});
		
	}
	
});