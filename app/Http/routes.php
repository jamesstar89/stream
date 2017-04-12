<?php

// @ROUTES
//

/////////////////////////////////////////
//
// Public routes
//
/////////////////////////////////////////

// Root
Route::get('/', function() {
    return Redirect::to("stream");
});

// Stream
Route::get('stream', 'StreamController@index');

// Post
Route::get('post/{id}', 'PostsController@show');

// Tag like name
Route::get('tag/s/{name}', 'TagsController@tagName');

// Tag by id
Route::get('tag/{id}', 'TagsController@show');

// Tag edit
Route::get('tag/e/edit', 'TagsController@editTags');

// Search by post or photo
Route::post('search', 'SearchController@index');

// Pages
Route::group(array('prefix' => 'page'), function() {
	Route::get('pricing', 'PagesController@pricing');
	Route::get('funding', 'PagesController@funding');
});

// Login
Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');
Route::resource('signin', 'AuthController');

/////////////////////////////////////////
//
// Private routes
//
/////////////////////////////////////////

// Routes accessible after authentication
Route::group(array('middleware'=>'auth'), function() {
	// API - Post
	Route::group(['prefix' => 'api/v1'], function() {
		Route::resource('post', '\\App\\Http\\Controllers\\api\\v1\\PostsController');
        Route::post('upload', '\\App\\Http\\Controllers\\api\\v1\\PostsController@upload');
        Route::post('editimages', '\\App\\Http\\Controllers\\api\\v1\\PostsController@editimages');
	});
});

// User route accessible after authentication and admin login
Route::group(['middleware' => ['auth', 'App\Http\Middleware\AdminMiddleware']], function()
{
	Route::resource('tag', 'TagsController');
	Route::resource('user', 'UsersController');
});

/////////////////////////////////////////
//
// API endpoints
//
/////////////////////////////////////////

Route::group(['prefix' => 'api/v1'], function() {
	Route::resource('post', '\\App\\Http\\Controllers\\api\\v1\\PostsController', ['only' => ['index', 'show']]);
	Route::resource('tag', '\\App\\Http\\Controllers\\api\\v1\\TagsController', ['only' => ['show']]);
	Route::get('recentTags', '\\App\\Http\\Controllers\\api\\v1\\TagsController@recentTags');
	Route::resource('tagssearch', '\\App\\Http\\Controllers\\api\\v1\\TagsSearchController', ['only' => ['index']]);
	Route::resource('status', '\\App\\Http\\Controllers\\api\\v1\\StatusController', ['only' => ['index']]);
});

// Artisan commands
Route::get('/stream/reset/{key?}',  array('as' => 'resetdb', function($key = null) {
    if($key == "reset123") {
		try {
			// delete tables here
			echo "reset migration";
			Artisan::call("migrate:reset", array('--force' => true));
			echo "<br />start migration";
			Artisan::call("migrate", array("--path"=>"database/migrations", "--force" => true));
			echo "<br />init db seeding";
			Artisan::call('db:seed', array('--force' => true));
			echo "<br />done";
	    } catch (Exception $e) {
			Response::make($e->getMessage(), 500);
	    }
  } else {
    App::abort(404);
  }
}));

// Catch all route 
// this allows angularjs to route all
// routes that are not home or api and
// will be redirected back to home 
Route::any('{path?}', function() {
    return Redirect::to("stream");
})->where("path", ".+");