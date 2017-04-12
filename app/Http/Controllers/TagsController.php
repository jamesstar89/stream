<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag as Tag;
use \DB;

class TagsController extends Controller {

	public function show($id)
	{
		$tags = Tag::where("id","=",$id)->orderBy('id', 'DESC')->with('posts')->get();		
		return view('pages.tags')->with('tags', $tags);
	}

	public function update($id)
	{
		$tagName = strtolower(\Request::input('tagname'));
		// look up tagname
		$findTag = Tag::where("name","=",$tagName)->first();

		if($findTag != null) {
			if($findTag->count() > 0) {
				if($findTag->id != $id) {
					// different tags
					// update id in taggable
					// delete tag from tag table
					DB::table('tags')->where('id',$id)->delete();
					DB::table('taggables')->where('tag_id',$id)->update(['tag_id' => $findTag->id]);
				}
			}
		} else {
			// update tag
			$tag = Tag::find($id);
			$tag->name = $tagName;
			$tag->save();
		}

		// store
		return redirect('/tag/e/edit/');
		
	}
	
	public function editTags() {
		$tags = Tag::orderBy('id', 'DESC')->with('posts')->get();	
		return view('edit.tags')->with('tags', $tags);
	}
	
	public function tagName($name)
	{
		$Tag = Tag::where('name','like','%'.$name.'%')
			->orderBy('id','DESC')
			->take(5)
			->with('posts')
			->get(array('id', 'name', 'user_id'));
			
		return view('pages.tags')->with('tags', $Tag);
 
	}

}