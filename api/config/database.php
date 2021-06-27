<?php

return [

  /*
  |--------------------------------------------------------------------------
  | Default Database Connection Name
  |--------------------------------------------------------------------------
  |
  | Here you may specify which of the database connections below you wish
  | to use as your default connection for all database work. Of course
  | you may use many connections at once using the Database library.
  |
  */

  'default' => env('DB_CONNECTION', 'mysql'),

  /*
  |--------------------------------------------------------------------------
  | Database Connections
  |--------------------------------------------------------------------------
  |
  | Here are each of the database connections setup for your application.
  | Of course, examples of configuring each database platform that is
  | supported by Laravel is shown below to make development simple.
  |
  |
  | All database work in Laravel is done through the PHP PDO facilities
  | so make sure you have the driver for your particular database of
  | choice installed on your machine before you begin development.
  |
  */

  'connections' => [

    'testing_sqlite_in_memory' => [
      'driver' => 'sqlite',
      'database' => ':memory:',
      'prefix' => '',
    ],

    // ============================

    'sqlite' => [
      'driver' => 'sqlite',
      'database' => env('DB_DATABASE', database_path('database.sqlite')),
      'prefix' => '',
    ],

    'mysql' => [
      'driver' => 'mysql',
      'host' => env('DB_HOST', '127.0.0.1'),
      'port' => env('DB_PORT', '3306'),
      'database' => env('DB_DATABASE', 'forge'),
      'username' => env('DB_USERNAME', 'forge'),
      'password' => env('DB_PASSWORD', ''),
      'charset' => 'utf8mb4',
      'collation' => 'utf8mb4_unicode_ci',
      'prefix' => '',
      'strict' => true,
      'engine' => null,
    ],

    'pgsql' => [
      'driver' => 'pgsql',
      'host' => env('DB_HOST', '127.0.0.1'),
      'port' => env('DB_PORT', '5432'),
      'database' => env('DB_DATABASE', 'forge'),
      'username' => env('DB_USERNAME', 'forge'),
      'password' => env('DB_PASSWORD', ''),
      'charset' => 'utf8',
      'prefix' => '',
      'schema' => 'public',
      'sslmode' => 'prefer',
    ],

    env('TEST_DB_CONNECTION_NAME', 'pgtest') => [
      'driver' => 'pgsql',
      'host' => env('TEST_DB_HOST', '127.0.0.1'),
      'port' => env('TEST_DB_PORT', '5432'),
      'database' => env('TEST_DB_DATABASE', 'forge'),
      'username' => env('TEST_DB_USERNAME', 'forge'),
      'password' => env('TEST_DB_PASSWORD', ''),
      'charset' => 'utf8',
      'prefix' => '',
      'schema' => 'public',
      'sslmode' => 'prefer',
    ],

    'clickhouse' => [
      'driver' => 'clickhouse',
      'host' => env('CLICKHOUSE_HOST', '10.0.75.1'),
      'database' => env('CLICKHOUSE_DATABASE', 'default'),
      'port' => env('CLICKHOUSE_PORT', 8123),
      'username' => env('CLICKHOUSE_USER', 'default'),
      'password' => env('CLICKHOUSE_PASSWORD', ''),
      'options' => [
        'timeout' => 10,
        'protocol' => 'https'
      ]
    ],


  ],

  /*
  |--------------------------------------------------------------------------
  | Migration Repository Table
  |--------------------------------------------------------------------------
  |
  | This table keeps track of all the migrations that have already run for
  | your application. Using this information, we can determine which of
  | the migrations on disk haven't actually been run in the database.
  |
  */

  'migrations' => 'migrations',

  /*
  |--------------------------------------------------------------------------
  | Redis Databases
  |--------------------------------------------------------------------------
  |
  | Redis is an open source, fast, and advanced key-value store that also
  | provides a richer set of commands than a typical key-value systems
  | such as APC or Memcached. Laravel makes it easy to dig right in.
  |
  */

  'redis' => [

    'client' => 'predis',

    'default' => [
        'driver'=>'redis',
      'host' => env('REDIS_HOST', '127.0.0.1'),
      'password' => env('REDIS_PASSWORD', null),
      'port' => env('REDIS_PORT', 6379),
      'database' => env('REDIS_DATABASE', 0),
    ],

  ],

];
