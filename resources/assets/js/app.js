// app
var app = angular.module('stream', [
    'stream.main',
    'stream.mains',
    'stream.maind',
    'stream.discover',
    'stream.post_detailsc',
    'stream.post_details',
    'stream.post_detailsd',
    'stream.post_addc',
    'stream.post-adds',
    'stream.post_editc',
    'stream.post-edits',
    'stream.post_listc',
    'stream.post_list',
    'stream.tag_listc',
    'stream.tag_list',
    'ngResource',
    'ui.router',
    'ngFileUpload',
    'ui.bootstrap',
    'ngMaterial'
]);

// rootscope variables
app.run(function ($rootScope) {
    $rootScope.previousState = "";
    $rootScope.newTag = "";
});