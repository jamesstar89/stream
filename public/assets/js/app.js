// app
var app = angular.module('stream', [
    'stream.main',
    'stream.mains',
    'stream.maind',
    'stream.discover',
    'stream.post_detailsc',
    'stream.post_details',
    'stream.post_detailsd',
    'stream.post_addc',
    'stream.post-adds',
    'stream.post_editc',
    'stream.post-edits',
    'stream.post_listc',
    'stream.post_list',
    'stream.tag_listc',
    'stream.tag_list',
    'ngResource',
    'ui.router',
    'ngFileUpload',
    'ui.bootstrap',
    'ngMaterial'
]);

// rootscope variables
app.run(function ($rootScope) {
    $rootScope.previousState = "";
    $rootScope.newTag = "";
});
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
angular.module('stream.maind', [])
  .directive("auth", function() {
    return {
      restrict: 'E',
      scope: {
        valid: '=valid',
        userId: '=identity',
        isAdmin: '=isadmin'
      },
      controller: function($scope, $rootScope) {
        // place directive scope into rootscope
        var valid = "", userId = "", isAdmin = "";
        // available on rootscope
        $rootScope.valid = valid = $scope.valid;
        $rootScope.userId = userId = $scope.userId;
        $rootScope.isAdmin = isAdmin = $scope.isAdmin;

        var sendAuth = {
          "valid" : valid,
          "userId" : userId,
          "isAdmin" : isAdmin
        }

        // available on callback
        $scope.$emit('setAuth', sendAuth);
      }
    }
  });
angular.module('stream.mains', [])

.factory('Main', function($http) {

    return {
        
        getStatus : function() {
            return $http.get('/api/v1/status');
        },

        getRecentTags : function() {
            return $http.get('/api/v1/recentTags');
        }

    }

});

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
angular.module('stream.tag_list', [])

.factory('TagList', function($rootScope, $http) {

    return {
        
        getTags : function(id) {
            return $http.get('/api/v1/tag/'+id);
        },
        
        getLikeName : function(tagname) {
            return $http.get('/api/v1/tagssearch?q='+tagname);
        }

    }

});
angular.module('stream.post_addc', [])

.controller('post_addCtrl', function($scope, $rootScope, $http, PostAdd, CSRF_TOKEN, $compile) {

	var userId = $rootScope.userId, tagResult = "";
	
  	if($rootScope.valid) {
		$('.stream.overlay').show();
		$('body').addClass('hide-interface');
		
		if($rootScope.newTag != "") {
			$("input[name='displaystream']").val($rootScope.newTag);
			$("input[name='streamname']").val($rootScope.newTag);
			$(".selected-stream").show();
		} else {
			// show get stream
			$(".get-stream").show();
		}
		
	} else {
		// empty template
		$(".overlay-wrapper").html("");
		$('.stream.overlay').hide();
	}
	
	var tokenEl = $(".post-add-form").find("input[name='_token']");
	var titleEl = $(".post-add-form").find("input[name='title']");
	var bodyEl = $(".post-add-form").find("textarea[name='body']");
	var streamNameEl = $(".post-add-form").find("input[name='streamname']");
	var streamIdEl = $(".post-add-form").find("input[name='streamid']");
    
    $(".entry").keyup(function() {
        // hide err notification
        $(".alert-danger").hide();
        // show ready to publish
        $scope.readyToPublish();
    });
	
	// pass token
	tokenEl.val(CSRF_TOKEN);
	
	$scope.selectCurrentStream = function(e) {
        $(".alert-danger").hide();
		$(".selected-stream").show();
		$("input[name='displaystream']").val($(e.target).data("tag"));
		$("input[name='streamid']").val($(e.target).data("id"));
		$(".tag-results-wrapper").hide();
		$(".get-stream").hide();
		$(".create-new-tag").hide();
        // show ready to publish
        $scope.readyToPublish();
	}
    
    $scope.selectStream = function(e) {
        // loop through to find stream
        $.each($(".tag-results").find("a"), function(i, e) {
            if($(e).text() === $("input[name='stream']").val()) {
                $(".alert-danger").hide();
                $(".selected-stream").show();
                $("input[name='displaystream']").val($(e).data("tag"));
                $("input[name='streamid']").val($(e).data("id"));
                $(".tag-results-wrapper").hide();
                $(".get-stream").hide();
                $(".create-new-tag").hide();
            }
        })
        $scope.checkErrs();
        $scope.readyToPublish();
    }
	
	$scope.createNewStream = function(e) {
		$(".selected-stream").show();
		$("input[name='displaystream']").val($(e.target).data("tag"));
		$("input[name='streamname']").val($(e.target).data("tag"));
		$(".tag-results-wrapper").hide();
		$(".get-stream").hide();
		$(".create-new-tag").hide();
        // show ready to publish
        $scope.readyToPublish();
	}
	
	$scope.changeStream = function() {
        $(".create-button").hide();
        $(".select-button").show();
		$(".selected-stream").hide();
		$("input[name='streamid']").val("0");
		$("input[name='streamname']").val("0");
		$(".get-stream").show();
		// empty all input values
		$(".get-stream input[name='stream']").val("");
        $scope.readyToPublish();
	}
	
	$scope.tagSearch = function() {
		if($scope.tagSearchData != "") {
			var term = $scope.tagSearchData.replace(/ /g,'');
			return $http.get('/api/v1/tagssearch?q='+term)
			.then(function(response) {
				tagResult = response.data.tags;
				if(tagResult.length === 0) {
					$(".create-new-tag").show();
                    $(".create-button").show();
                    $(".select-button").hide();
					$(".tag-results-wrapper").hide();
					$(".tag-results").html("");
				} else {
					tagResult = tagResult.map(function(item) {
						return "<div><a href=\"#\" ng-click=\"selectCurrentStream($event)\" data-id=\""+item.id+"\" data-tag=\""+item.name+"\" style=\"margin-top:2px;display:block\">"+item.name+"</a></div>";
					});
					var parseResult = tagResult.join("");
					var compiled = $compile(parseResult)($scope);
					$(".create-new-tag").hide();
                    $(".create-button").hide();
                    $(".select-button").show();
					$(".tag-results-wrapper").show();
                    $(".tag-results").show();
					$(".tag-results").html(compiled);
				}
			});
		} else {
			$(".tag-results-wrapper, .tag-results, .create-new-tag, .create-button").hide();
			$(".tag-results").html("");
		}	
	}
    
    $scope.publish = function() {
        if(!$scope.checkErrs()) {
            return false;
        }

        // make sure stream name is lowercase
        var streamName = streamNameEl.val().toLowerCase();

        // post data
        var post = {
            "_token": tokenEl.val(),
            "userId": userId,
            "title": titleEl.val(),
            "body": bodyEl.val(),
            "streamid": streamIdEl.val(),
            "streamname": streamName
        }
        // use upload method
        if($scope.files != undefined) {
            $(".text-preloader").show();
            post.files = $scope.files;
            PostAdd.upload(post)
            .success(function(data) {
                if(data.success === true) {
                    $scope.closeOverlay();
                }	
            });
        } else {
            // use standard post method
            PostAdd.add(post)
            .success(function(data) {
                if(data.success === true) {
                    $scope.closeOverlay();
                }	
            });    
        }
        $(".edit-button").prop("disabled", "disabled");
    }
    
    $scope.uploadFiles = function (files, errFiles) {
        $scope.files = files;
        $scope.errFiles = errFiles;
    };
    
    $scope.deleteFile = function(index) {
        $scope.files.splice(index, 1);
    }
    
    $scope.checkErrs = function() {
        var validate = true;
        // reset
        $(".alert-danger").find("ul").html("");
        // validates title and body
        if(titleEl.val() === "" || bodyEl.val() === "") {
            $(".alert-danger").show();
            $(".alert-danger").find("ul").append("<li>Add a title and body</li>");
            validate = false;
        }
        // validates stream name
        if(streamNameEl.val() === "0" && streamIdEl.val() === "0") {
            $(".alert-danger").show();
            $(".alert-danger").find("ul").append("<li>Find a stream name</li>");
            validate = false;   
        }
        return validate;
    }
    
    $scope.readyToPublish = function() {
        if(titleEl.val() != "" && bodyEl.val() != "" && (streamNameEl.val() != "0" || streamIdEl.val() != "0")) {
            $(".alert-info").show();
        } else {
            $(".alert-info").hide();
        }
    }

	// add image
	$scope.addImage = function() {
		$(".image-add-group").show();
		$(".post-add-group").hide();
	} 
	
	// go back
	$scope.finishPost = function() {
		$(".image-add-group").hide();
		$(".post-add-group").show();
	} 

	$scope.closeOverlay = function() {
		$('.stream.overlay').hide();
		$('body').removeClass('hide-interface');
		var href = location.href;
		var firstFrag = href.split("#")[0];
		location.href = firstFrag + "#/" + $rootScope.previousState;	
	}

});
angular.module('stream.post-adds', [])

.factory('PostAdd', function($http, Upload, $timeout) {

    return {
    	add: function(data) {
		    return $http({
                        method: 'POST',
                        url: '/api/v1/post', 
                        headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8' },
                        data: data
                    });  
    	},
    	upload: function(data) {
            return Upload.upload({
                        url: '/api/v1/upload',
                        data: data,
                    });
    	}
    }

});
angular.module('stream.post_editc', [])

.controller('post_editCtrl', function($scope, $rootScope, PostEdit, $compile) {

	/**

	- show post edit overlay if logged in user and
	  post author is the same otherwise remove template
	- CRUD edit / get and update / put

	*/

  	var userId = Number($(".identity-cache").text());
      
    $scope.imagesMax = 4;
    $scope.filesToDelete = [];
    $scope.files = [];

  	if($rootScope.valid && $rootScope.userId === userId) {
		$('.stream.overlay').show();
		$('body').addClass('hide-interface');
	} else {
		// empty template
		$(".overlay-wrapper").html("");
		$('.stream.overlay').show();
	}

	var postId = "", title = "", body = "";
	var titleEl = $(".post-edit-form").find("input[name='title']");
	var bodyEl = $(".post-edit-form").find("textarea[name='body']");
	var photoEl = $(".post-edit-form").find(".photo-list");

	function getPostId() {
		var href = location.href;
		var post = href.split("post")[1];
		var hash = post.split("#")[0]
		var id = hash.split("/")[1];
		return id;
	}
    
	if($rootScope["details"] != undefined) {
		postId = $rootScope.details[0].id;
		userId = $rootScope.details[0].user_id;
		title = $rootScope.details[0].title;
		body = $rootScope.details[0].body;
		photos = $rootScope["details"][0].photos;
	} else {
		postId = getPostId();
		userId = $(".identity-cache").text();
		title = $(".title-cache").text();
		body = $(".body-cache").text();
		photos = JSON.parse($(".photos-cache").text());
	}

	titleEl.val(title);
	bodyEl.text(body);
    for(var p = 0; p < photos.length; p++) {
    	var startFrag = "<div style='margin-bottom:5px;'>";
    	var endFrag = "<button class='btn btn-danger' style='height:38px;font-size:16px' ng-click='deleteSavedFile($event, "+photos[p].id+")'>Remove</button></div>";
		var photo = photos[p].url;
		var compiled = $compile(startFrag + "<img src='"+photo+"' style='width:100px;margin-right:12px' />" + endFrag)($scope);
		photoEl.append(compiled);
        $scope.imagesMax--;
    }

	$scope.editPost = function() {
		var post = {
			"id": postId,
			"userId": userId,
			"title": titleEl.val(),
			"body": bodyEl.val(),
		}
   
        if($scope.files != undefined) {
        	$(".text-preloader").show();
            post.files = $scope.files;
            post.filesToDelete = JSON.stringify($scope.filesToDelete);
            PostEdit.upload(post)
            .success(function(data) {
                if(data.success === "true") {
                    $scope.closeOverlay();
                }	
            });
        } else {
            // use standard post method
            post.filesToDelete = JSON.stringify($scope.filesToDelete);
            PostEdit.save(post)
            .success(function(data) {
                $scope.closeOverlay();
            });   
        }    
        $(".edit-button").prop("disabled", "disabled");
    };
	
    $scope.uploadFiles = function (files, errFiles) {
        $scope.files = files;
        $scope.errFiles = errFiles;
    };

    $scope.deleteSavedFile = function(event, index) {
    	$(event.target).parent().remove();
    	$scope.imagesMax++;
    	$scope.filesToDelete.push(index);
    };

    $scope.deleteFile = function(index) {
        $scope.files.splice(index, 1);
    }
    
	// add image
	$scope.updateImages = function() {
		$(".image-edit-group").show();
		$(".post-edit-group").hide();
	} 
	
	// done
	$scope.done = function() {
		$(".image-edit-group").hide();
		$(".image-add-group").hide();
		$(".post-edit-group").show();
	} 
	
	$scope.closeOverlay = function() {
		$('.stream.overlay').hide();
		$('body').removeClass('hide-interface');
		var href = location.href;
		var firstFrag = href.split("#")[0];
		location.href = firstFrag + "#/" + $rootScope.previousState;	
	}

});
angular.module('stream.post-edits', [])

.factory('PostEdit', function($http, Upload, $timeout) {

    return {
    	save: function(data) {

		    return $http({
		    	method: 'PUT',
		    	url: '/api/v1/post/'+data.id, 
		    	data: data,
		    	headers: { 'Content-Type': 'application/x-www-form-urlencoded; charset=utf-8' }
		    })
			.success(function(data, status, headers, config) {
				//
			})
			.error(function(data, status, headers, config) {
				//
			});
		     
    	},
    	upload: function(data) {
            return Upload.upload({
                        url: '/api/v1/editimages',
                        data: data,
                    });
    	}

    }

});
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
angular.module('stream.post_detailsd', [])
  .directive("editbutton", function($rootScope) {

  	/*

	- show post edit button if logged in user and
	  post author is the same otherwise hide button

	*/

  	var userId = Number($(".identity-cache").text());

  	if($rootScope.valid && $rootScope.userId === userId) {
	    return {
	      restrict: 'E',
	      template: '<button type="button" class="btn btn-primary" ng-show="auth===true" ui-sref="edit" ng-click="go(\'edit\')">Edit Post</button>'
		}
	} else {
		return {
			restrict: 'E'
		}
	}
  })
  .directive("optionalbuttons", function($rootScope) {
	// ng-click="go(\'suspendpost\')"
  	if($rootScope.valid && $rootScope.isAdmin === true) {
	    return {
	      restrict: 'E',
	      template: '<button type="button" class="btn btn-danger" ng-show="auth===true" ui-sref="edit">Suspend Post</button>'
		}
	} else {
		return {
			restrict: 'E'
		}
	}
  });
angular.module('stream.post_details', [])

.factory('PostDetails', function($http) {

    return {
    	// get a single post by id
    	get: function(id) {
    		return $http.get('/api/v1/post/'+id);
    	}

    }

});
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
angular.module('stream.post_list', [])

.factory('PostList', function($http) {

    return {
        
        // paginate posts
        getPosts : function() {
            return $http.get('/api/v1/post');
        }

    }

});
//# sourceMappingURL=app.js.map
