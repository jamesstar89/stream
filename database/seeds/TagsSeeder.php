<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class TagsSeeder extends Seeder
{
	public function run()
	{
	    DB::table('tags')->delete();
	    DB::table('tags')->insert(array(
    		array(
					'name'=>'puffstream',
					'user_id'=>1,
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'name'=>'stream',
					'user_id'=>1,
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					)
		));
	}
}