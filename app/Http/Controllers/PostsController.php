<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag as Tag;
use App\Models\Post as Post;
use App\Models\Photo as Photo;

class PostsController extends Controller {

	public function show($id)
	{
		$post = Post::orderBy('id', 'DESC')->with('tags')->where('id', '=', $id)->with('author')->take(7)->get();	
		return view('pages.detail')->with('post', $post);
	}

}