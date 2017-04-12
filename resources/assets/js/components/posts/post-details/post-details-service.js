angular.module('stream.post_details', [])

.factory('PostDetails', function($http) {

    return {
    	// get a single post by id
    	get: function(id) {
    		return $http.get('/api/v1/post/'+id);
    	}

    }

});