<?php

namespace App\http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Tag;
use App\Models\Post;
use App\Models\Photo;
use Auth;
use Image;
use File;
use \DB;

class PostsController extends Controller {

	public function index()
	{
		$posts = Post::orderBy('id', 'DESC')->with('photos')->with('tags')->with('author')->take(7)->get();
        return \Response::json($posts);
	}
	
	public function store()
	{	
		$data = \Request::json()->all();
		$result = "";
		$saveid = "";
		if($data["streamname"] === "0" && $data["streamid"] === "0") {	
			$result = false;
		} else {		
			$result = true;
			// no stream id
			if($data["streamid"] === "0") {
				// create new tag
				$tag = new Tag;
				$tag->name = $data["streamname"];
				$tag->user_id = $data["userId"];
				$tag->save();
				$tag->tags()->sync([$tag->id]);
				$saveid = $tag->id;
			}
			// pass right tag id
			if($data["streamid"] != "0") {
				$saveid = $data["streamid"];
			}
			// create new post
			$post = new Post;
			$post->title = $data["title"];
			$post->body = $data["body"];
			$post->user_id = $data["userId"];
			$post->save();
			$post->tags()->sync([$saveid]);
		} 
        // redirect
        return \Response::json(array("success"=>$result));
	}
    
    // store + upload files
    public function upload() {
		$result = ""; 
		$saveid = "";
        // get all input fields
        $streamName = \Input::get('streamname');
        $streamID = \Input::get('streamid');
        $title = \Input::get('title');
        $body = \Input::get('body');
        $userID = \Input::get('userId');
        $files = \Input::file('files');       
        // do a server validation check for stream name and stream id
		if($streamName === "0" && $streamID === "0") {	
			$result = false;
		} else {
			// no stream id
			if($streamID === "0") {
				// create new tag
				$tag = new Tag;
				$tag->name = $streamName;
				$tag->user_id = $userID;
				$tag->save();
				$tag->tags()->sync([$tag->id]);
				$saveid = $tag->id;
			}
			// pass right tag id
			if($streamID != "0") {
				$saveid = $streamID;
			}
			// create new post
			$post = new Post;
			$post->title = $title;
			$post->body = $body;
			$post->user_id = $userID;
			$post->save();
			$post->tags()->sync([$saveid]);
            // photo upload
            foreach($files as $file) {
                $photo = new Photo;
                $fileName = "media/photos/large/" . uniqid() . "_" . $file->getClientOriginalName();
                $makeFile = Image::make($file);
                $makeFile->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $makeFile->save($fileName);
                $photo->url = "/".$fileName;
                $photo->save();
                $photo->tags()->sync([$saveid]);
                $photo->posts()->sync([$post->id]);
            }
            $result = true;
        }
        // redirect
        return \Response::json(array("success"=>$result));
    }
	
	public function show($id)
	{
		$posts = Post::with('photos')->with('tags')->where('id', '=', $id)->with('author')->get();
        return \Response::json($posts);
	}
	
	public function update($id) {    
		$data = \Request::json()->all();	
		$result = "false";	
		$post = Post::find($id);
		$post->title = $data["title"];
        $post->body = $data["body"];	
		if(Auth::id() === $data["userId"]) {
			$post->save();
			$result = "true";
		}	
		return \Response::json(array("success"=>$result));
	}
    
    public function editimages() {
		$result = "false";
        $post = Post::find(\Input::get('id'));
		$post->title = \Input::get('title');
        $post->body = \Input::get('body');
        $files = \Input::file('files');
        $filesToDelete = json_decode(\Input::get('filesToDelete'));
        // add random string to file name
		if((string)Auth::id() === (string)\Input::get('userId')) {
			$post->save();
			// delete photos
			if(count($filesToDelete) > 0) {
				foreach($filesToDelete as $file_id) {
					$photoToDelete = Photo::find($file_id);
					if(count($photoToDelete) > 0) {
					    File::delete(public_path()."/".$photoToDelete->url);
					    $photoToDelete->delete();
		                DB::table('taggables')->where('taggable_id', $file_id)->where('taggable_type','App\Models\Photo')->delete();
		                DB::table('postables')->where('postable_id', $file_id)->where('postable_type','App\Models\Photo')->delete();
					}				
				}
			}
			if(count($files) > 0) {
	            // photo upload
	            foreach($files as $file) {
	                $photo = new Photo;
	                $fileName = "media/photos/large/" . uniqid() . "_" . $file->getClientOriginalName();
	                $makeFile = Image::make($file);
	                $makeFile->resize(600, null, function ($constraint) {
	                    $constraint->aspectRatio();
	                });
	                $makeFile->save($fileName);
	                $photo->url = "/".$fileName;
	                $photo->save();
	                $photo->tags()->sync([$post->getTagID($post->id)->tag_id]);
	                $photo->posts()->sync([$post->id]);
	            } 
        	}
			$result = "true";
		}
		return \Response::json(array("success"=>$result));   
    }

}