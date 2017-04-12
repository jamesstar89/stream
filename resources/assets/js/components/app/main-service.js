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