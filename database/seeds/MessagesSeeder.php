<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class MessagesSeeder extends Seeder
{
	public function run()
	{
	    DB::table('messages')->delete();
	    DB::table('messages')->insert(array(
    		array(
				'scene' => '{"text": "Rainbow\'s are pretty..."}',
				'view' => '{"html": "<div class=\"view-1\">${text}</div>"}',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
				),
    		array(
				'scene' => '{"text": "There are 3 cars..."}',
				'view' => '{"html": "<div class=\"view-2\">${text}</div>"}',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
				),
    		array(
				'scene' => '{"text": "The sky is blue..."}',
				'view' => '{"html": "<div class=\"view-3\">${text}</div>"}',
				'created_at'=>date('Y-m-d H:m:s'),
				'updated_at'=>date('Y-m-d H:m:s')
				)
		));
	}
}