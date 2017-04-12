<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \DB;

class Post extends Model {
	
	protected $table = 'posts';

	public function author() {
		return $this->hasOne('App\\Models\\User', 'id', 'user_id')->select('id', 'author_prefix');
	}
    
	public function photos()
    {
        return $this->morphedByMany('App\\Models\\Photo', 'postable');
    }

	public function tags()
    {
        return $this->morphToMany('App\\Models\\Tag', 'taggable');
    }
    
    // get tag id
	public function getTagID($postID)
    {
        return DB::table('taggables')->where('taggable_id', $postID)->where('taggable_type','App\Models\Post')->first();
    }
    
}