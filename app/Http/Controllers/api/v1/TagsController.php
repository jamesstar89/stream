<?php

namespace App\http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Post;

class TagsController extends Controller {

	public function show($id)
	{
		$tag = Tag::where("id","=",$id)->orderBy('id', 'DESC')->with('posts')->get();
        return \Response::json($tag);
	}

	public function recentTags()
	{
		$tag = Tag::orderBy('id', 'DESC')->take(7)->get();
        return \Response::json($tag);
	}

}