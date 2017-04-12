<?php

  return  [
      'default' => 'mysql',

      'connections' => [

          'mysql' => array(
              'driver'   => 'mysql',
              'host'     => 'localhost',
              'port'     => '3306',
              'username' => env('DB_USERNAME'),
              'password' => env('DB_PASSWORD'),
              'database' => env('DB_DATABASE')
          ),

      ],
    
      'migrations' => 'migrations',

  ];
