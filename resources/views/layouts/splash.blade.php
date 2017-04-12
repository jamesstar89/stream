<!DOCTYPE html>
<html ng-app="stream" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Puff Stream</title>
    <link href="/assets/css/libs.css" rel="stylesheet" />
    <link href="/assets/css/app.css" rel="stylesheet" />
    <link href="/assets/css/addons.css" rel="stylesheet" />
  </head>
  <body ng-controller="mainCtrl">
    <nav class="navbar navbar-default" style="margin-bottom:12px;border:0;border-bottom:#ddd 1px solid">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <a class="navbar-brand" href="/">Puff Stream</a>
        </div>
      </div>
    </nav>
    <!-- desktop container -->
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                @yield('center')
            </div>    
        </div>
    </div>
    <script src="/assets/js/libs.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/addons.js"></script>
  </body>
</html>