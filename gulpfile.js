var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

 // naming conventions: libs, app, addons

elixir(function (mix) {
	mix
		.sass([
		  	// './bower_components/bootstrap-sass/assets/stylesheets/_bootstrap.scss',
            './bower_components/rrssb/scss/rrssb.scss',
            './bower_components/angular-material/angular-material.scss',
		  	'libs.scss',
			], 'public/assets/css/libs.css')
		.sass([
		 	'app.scss',
		 	'./resources/assets/js/components/**/*.scss'
			], 	'public/assets/css/app.css')
		.sass([
		 	'addons.scss'
			], 'public/assets/css/addons.css')
		.scripts([
			'./bower_components/jquery/dist/jquery.js',
			'./bower_components/bootstrap-sass/assets/javascripts/bootstrap.js',
			'./bower_components/angular/angular.js',
			'./bower_components/angular-resource/angular-resource.js',
			'./bower_components/angular-route/angular-route.js',
			'./bower_components/angular-ui-router/release/angular-ui-router.min.js',
            './bower_components/ng-file-upload-shim/ng-file-upload-shim.js',
            './bower_components/ng-file-upload/ng-file-upload.js',
			'./bower_components/angular-bootstrap/ui-bootstrap-tpls.js',
            './bower_components/lightbox2/dist/js/lightbox.js',
            './bower_components/rrssb/js/rrssb.js',
            './bower_components/angular-aria/angular-aria.js',
            './bower_components/angular-animate/angular-animate.js',
            './bower_components/angular-material/angular-material.js'
		], 	'public/assets/js/libs.js')
		.scripts([
			'app.js',
			'components/**/*.js'
		], 	'public/assets/js/app.js')
		.scripts([
			'route.js'
		], 	'public/assets/js/route.js')
		.scripts([
			'addons.js'
		], 	'public/assets/js/addons.js')
		.copy(
			'./resources/assets/js/components/**/*.html',
			'public/assets/views'
		)
		.copy(
			'./bower_components/rrssb/icons/*.svg',
			'public/assets/icons'
		)
	});