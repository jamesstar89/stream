<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model {
	
	protected $table = 'photos';
    
	public function tags()
    {
        return $this->morphToMany('App\\Models\\Tag', 'taggable');
    }
    
	public function posts()
    {
        return $this->morphToMany('App\\Models\\Post', 'postable');
    }

}
