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