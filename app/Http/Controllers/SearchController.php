<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post as Post;
use App\Models\Tag as Tag;

class SearchController extends Controller {

	public function index()
	{
		$Query = \Request::input('query');;
		$posts = Post::where('title','like','%'.$Query.'%')
			->orWhere('body','like','%'.$Query.'%')
			->orderBy('id','DESC')
			->take(5)
			->with('tags')
			->get(array('id', 'title', 'body', 'user_id'));
        return view('pages.search')->with('posts', $posts);
	}

}