<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Post as Post;
use App\Models\Tag as Tag;

class StreamController extends Controller {

	public function index()
	{
		$posts = Post::orderBy('id', 'DESC')->get();		
		return view('pages.stream')->with('posts', $posts);
	}

}