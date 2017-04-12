angular.module('stream.post_list', [])

.factory('PostList', function($http) {

    return {
        
        // paginate posts
        getPosts : function() {
            return $http.get('/api/v1/post');
        }

    }

});