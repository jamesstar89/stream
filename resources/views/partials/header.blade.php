<!DOCTYPE html>
<html ng-app="stream" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Puff Stream</title>
    <?php $port = ($_SERVER['SERVER_PORT'] != null) ? ":".$_SERVER['SERVER_PORT'] : ""; ?>
    <?php $baseURL = "http://".$_SERVER['SERVER_NAME'] . $port; ?>
    @if(isset($posts))
    @foreach($posts as $index=>$post)
    @if($index === 0)
    <meta property="og:title" content="{{$post->title}}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{$baseURL}}/post/{{$post->id}}/#/detail">
    <meta property="og:description" content="{{ PostHelper::shorten($post) }}">
    @if($post->photos->count() > 0)
    @foreach($post->photos as $index=>$photo)
    @if($index === 0)
    <meta property="og:image" content="{{$baseURL}}/{{ $photo->url }}">    
    @endif
    @endforeach
    @endif
    @endif
    @endforeach
    @endif
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="300">
    <meta property="og:image:height" content="300">
    <link href="/assets/css/libs.css" rel="stylesheet" />
    <link href="/assets/css/app.css" rel="stylesheet" />
    <link href="/assets/css/addons.css" rel="stylesheet" />
  </head>