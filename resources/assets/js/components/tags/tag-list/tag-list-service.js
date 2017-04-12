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