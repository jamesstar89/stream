<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('foo', function () {
    $status = array(
        	"total" =>	2,
			"userTotals" => 4
        	);
		return response()->json(['name' => 'James', 'state' => 'CA12311']);
});
