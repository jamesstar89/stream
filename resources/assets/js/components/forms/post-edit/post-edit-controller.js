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