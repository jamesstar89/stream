app.config(function($stateProvider, $urlRouterProvider, $interpolateProvider) {

    $interpolateProvider.startSymbol('<%');
    $interpolateProvider.endSymbol('%>');

    $stateProvider
        // home
        .state('i', {
          url: "/i",
          views: {
            "HomeView": {
              templateUrl: "/assets/views/posts/post-list/post-list.html",
              controller: "post_listCtrl"
            },
            "RedirectView": {
              template: "You have come to the wrong URL - <a href='/'>click here to go home</a>.",
              controller: function($scope) {
                $scope.redirect = {
                    home: true	
                }
              }
            }
          }
        })
        // post detail
        .state('detail', {
          url: "/detail",
          views: {
            "DetailView": {
              templateUrl: "/assets/views/posts/post-details/post-details.html",
              controller: "post_detailsCtrl"
            },
            "RedirectView": {
              template: "You have come to the wrong URL - <a href='/'>click here to go home</a>.",
              controller: function($scope) {
                	$scope.redirect = {
                    detail: true	
                  }
              }
            }
          }
        })
        // tag <name> list
        .state('list', {
          url: "/list",
          views: {
            "ListView": {
              templateUrl: "/assets/views/tags/tag-list/tag-list.html",
              controller: "tag_listCtrl"
            },
            "RedirectView": {
              template: "You have come to the wrong URL - <a href='/'>click here to go home</a>.",
              controller: function($scope) {
                	$scope.redirect = {
                    tag: true	
                  }
              }
            }
          }
        })
        // tag like <name> list
        .state('name', {
          url: "/name",
          views: {
            "ListView": {
              templateUrl: "/assets/views/tags/tag-list/tag-list.html",
              controller: "tag_listCtrl"
            },
            "RedirectView": {
              template: "You have come to the wrong URL - <a href='/'>click here to go home</a>.",
              controller: function($scope) {
                	$scope.redirect = {
                    tag: true	
                  }
              }
            }
          }
        })
        .state('discover', {
          url: "/discover",
          views: {
            "HomeView": {
              templateUrl: "/assets/views/posts/post-list/post-list.html",
              controller: "post_listCtrl"
            },
            "ListView": {
              templateUrl: "/assets/views/tags/tag-list/tag-list.html",
              controller: "tag_listCtrl"
            },
            "DetailView": {
              templateUrl: "/assets/views/posts/post-details/post-details.html",
              controller: "post_detailsCtrl"
            },
            "OverlayView": {
              templateUrl: "/assets/views/forms/discover/discover.html",
              controller: "discoverCtrl"
            }
          }
        })
        .state("add", {
          url: "/add",
          views: {
            "HomeView": {
              templateUrl: "/assets/views/posts/post-list/post-list.html",
              controller: "post_listCtrl"
            },
            "ListView": {
              templateUrl: "/assets/views/tags/tag-list/tag-list.html",
              controller: "tag_listCtrl"
            },
            "DetailView": {
              templateUrl: "/assets/views/posts/post-details/post-details.html",
              controller: "post_detailsCtrl"
            },
            "OverlayView": {
              templateUrl: "/assets/views/forms/post-add/post-add.html",
              controller: "post_addCtrl"
            }
          }
        })
        .state("edit", {
          url: "/edit",
          views: {
            "HomeView": {
              templateUrl: "/assets/views/posts/post-list/post-list.html",
              controller: "post_listCtrl"
            },
            "ListView": {
              templateUrl: "/assets/views/tags/tag-list/tag-list.html",
              controller: "tag_listCtrl"
            },
            "DetailView": {
              templateUrl: "/assets/views/posts/post-details/post-details.html",
              controller: "post_detailsCtrl"
            },
            "OverlayView": {
              templateUrl: "/assets/views/forms/post-edit/post-edit.html",
              controller: "post_editCtrl"
            }
          }
        });
        
    $urlRouterProvider.otherwise("i");

});