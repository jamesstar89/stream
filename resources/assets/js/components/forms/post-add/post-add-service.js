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