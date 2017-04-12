<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PostsSeeder extends Seeder
{
	public function run()
	{
	    DB::table('posts')->delete();
	    DB::table('posts')->insert(array(
    		array(
					'title'=>'About Puff Stream',
					'body' => 'Puff Stream has been established in one of three ways - a personal project, a publication and a development front for Stream Software.',
					'is_active'=>1,
					'user_id'=>1,
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'title'=>'About Stream',
					'body' => 'We’ve designed Stream to make writing anything fun and easy. Publish stuff on your own stream, or create multiple streams. It’s free, simple to customise and completely open source.<br /><br />Stream it. And see the web.<br /><br />Stream, FREE Open Source Software v2 – coming in 31st October 2016.',
					'is_active'=>1,
					'user_id'=>1,
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'title'=>'Use Gimp',
					'body' => 'Use Gimp to group a series of related products together, example, tee, shorts and shoes. Or maybe use it to try and explain something quite complicated, like a philosophical statement.',
					'is_active'=>1,
					'user_id'=>2,
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
		));
	}
}