<!doctype html>
<html>
  <head>
      <title>Stream</title>
      <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
      <link href="/css/app.css" rel="stylesheet" type="text/css">
  </head>
  <body>
    <div class="app-container">
      <nav class="navbar navbar-inverse">
        <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand" href="#">
              Stream
              <span class="badge">v0.0.1</span>
            </a>
          </div>
          <ul class="nav navbar-nav navbar-right">
            <li><a href="#">About</a></li>
            <li><a href="#">Contribute</a></li>
            <li><a href="#">Releases</a></li>
          </ul>
        </div>
      </nav>
      <div id="app" class="container">
        <div class="row">
          <div class="col-xs-3">
            <div class="manage-users-container form-group">
              <input type="button" class="btn btn-primary" value="Manage Users" />
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary" value="Enable Accounts" />
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary" value="Add a Model" />
            </div>
            <div class="form-group">
              <input type="button" class="btn btn-primary" value="Publish a Message" />
            </div>
          </div>
          <div class="col-xs-6">
            <!--
            <page>
            -->
            <h1>New Message</h1>
            <select class="form-control">
                <option>Select</option>
                <option>Color</option>
                <option>Post</option>
            </select>
            <hr/>
            <h1>Post</h1>
            <textarea class="form-control" placeholder="Write something..."></textarea>
            <br />
            <input type="text" class="form-control" placeholder="Stream name" />
            <br />
            <input type="button" class="btn btn-primary" value="Publish" />
            <br />
            <br />
            <loader></loader>
          </div>
        </div> 
      </div>
    </div>
  <script src="{{ elixir('js/app.js') }}"></script>
  </body>
</html>
