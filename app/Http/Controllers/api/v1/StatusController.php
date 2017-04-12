<?php

namespace App\http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Post;
use Auth;

class StatusController extends Controller {

	public function index()
	{
		// return total streams and total posts
		$total = ["tag" => Tag::count(), "post" => Post::count()];
		
		$userTotals = [];
		// if user valid return user email, user total streams and user total posts
		if(Auth::check()) {
			$userTotals = ["email" => Auth::user()->username, "tag" => Tag::where("user_id","=",Auth::id())->count(), "post" =>  Post::where("user_id","=",Auth::id())->count()];	
		}
		
		// as return array
		$status = array(
        	"total" =>	$total,
			"userTotals" => $userTotals
        	);
		return \Response::json($status);
	}

}