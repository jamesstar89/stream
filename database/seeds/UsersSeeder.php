<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UsersSeeder extends Seeder
{
	public function run()
	{
	    DB::table('users')->delete();
	    DB::table('users')->insert(array(
    		array(
					'username'=>'admin@domain.com',
					'password' => Hash::make('password'),
					'author_prefix' => 'JS',
					'is_admin' => 1,
					'remember_token' => 'cdHoby5h1YjxjDziFXk6OHp6p7etk8l5sdLKWB9Lfwn1rxUSuasDv7RlatMR',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'username'=>'user1@domain.com',
					'password' => Hash::make('password'),
					'author_prefix' => 'MY',
					'is_admin' => 0,
					'remember_token' => 'cdHoby5h1YjxjDziFXk6OHp6p7etk8l5sdLKWB9Lfwn1rxUSuasDv7RlatMR',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
    		array(
					'username'=>'user2@@domain.com',
					'password' => Hash::make('password'),
					'author_prefix' => 'SS',
					'is_admin' => 0,
					'remember_token' => 'cdHoby5h1YjxjDziFXk6OHp6p7etk8l5sdLKWB9Lfwn1rxUSuasDv7RlatMR',
					'created_at'=>date('Y-m-d H:m:s'),
					'updated_at'=>date('Y-m-d H:m:s')
					),
		));
	}
}