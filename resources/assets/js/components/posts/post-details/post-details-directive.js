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