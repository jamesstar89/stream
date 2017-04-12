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