<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TaggablesSeeder extends Seeder
{
	public function run()
	{
	    DB::table('taggables')->delete();
	    DB::table('taggables')->insert(array(
    		array(
					'tag_id'=> 1,
					'taggable_id' => 1,
					'taggable_type' => 'App\Models\Tag',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'tag_id'=> 1,
					'taggable_id' => 1,
					'taggable_type' => 'App\Models\Post',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'tag_id'=> 2,
					'taggable_id' => 2,
					'taggable_type' => 'App\Models\Tag',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'tag_id'=> 2,
					'taggable_id' => 2,
					'taggable_type' => 'App\Models\Post',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'tag_id'=> 2,
					'taggable_id' => 3,
					'taggable_type' => 'App\Models\Post',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
		));
	}
}