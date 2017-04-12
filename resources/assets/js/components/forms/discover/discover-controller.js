
angular.module('stream.discover', [])

.controller('discoverCtrl', function($scope, $rootScope, $http, $location) {

	$('.stream.overlay').show();
	$('body').addClass('hide-interface');
	
	var tagResult = "", tagName = "";
	
	$scope.createTag = function() {
		$rootScope.newTag = $scope.tagSearchData.replace(/ /g,'');
	}
	
	$scope.queryTagName = function() {
		return $scope.tagSearchData.replace(/ /g,'');
	}
	
	$scope.go = function() {		
		if(tagResult.length != 0) {
			// go
			tagName = $scope.queryTagName();
			location.href = "/tag/s/"+tagName+"#/name"
		} else {
			// create
			$scope.createTag();
			location.href = "#/add";
		}	
	}
	
	$scope.tagSearch = function() {
		if($scope.tagSearchData != "") {
			var term = $scope.tagSearchData.replace(/ /g,'');
			return $http.get('/api/v1/tagssearch?q='+term)
			.then(function(response) {
				tagResult = response.data.tags;
				var postResult = [];
				if(tagResult.length === 0) {
					$(".create-new-tag").show();
					$(".search-results, .tag-results, .post-results, .tag-header, .post-header").hide();
					$(".tag-results, .post-results").html("");
				} else {			
					tagResult = tagResult.map(function(item) {
						if(item.posts.length > 0) {
							Array.prototype.push.apply(postResult, item.posts);
						}
						return "<div><a href=\"/tag/"+item.id+"#/list\" style=\"margin-top:2px;display:block\">"+item.name+"</a></div>";
					});
					
					if(postResult.length > 0) {
						postResult = postResult.map(function(item) {
							var str = "<div><a href=\"/post/"+item.id+"/#/detail\" style=\"margin-top:10px;display:block;\">"+item.title+"</a></div>";
								str += "<div style=\"font-size:16px;\">"+item.body.substr(0, 250)+"...</div>";
							return str;
						});
						$(".post-results, .post-header").show();
						$(".post-results").html(postResult);
					}
					
					$(".create-new-tag").hide();
					$(".search-results, .tag-results, .tag-header").show();
					$(".tag-results").html(tagResult);
				}
			});
		} else {
			$(".search-results, .tag-results, .post-results, .tag-header, .post-header, .create-new-tag").hide();
			$(".tag-results, .post-results").html("");
		}
	}
	
	$scope.closeOverlay = function() {
		$('.stream.overlay').hide();
		$('body').removeClass('hide-interface');
		var href = location.href;
		var firstFrag = href.split("#")[0];
		location.href = firstFrag + "#/" + $rootScope.previousState;	
	}

});