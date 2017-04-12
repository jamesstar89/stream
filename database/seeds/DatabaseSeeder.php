<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $this->call('UsersSeeder');
        $this->call('PostsSeeder');
        $this->call('TagsSeeder');
        $this->call('TaggablesSeeder');
        
        Model::reguard();
    }
}
