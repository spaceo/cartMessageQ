<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Queue Driver
    |--------------------------------------------------------------------------
    |
    | Laravel's queue API supports an assortment of back-ends via a single
    | API, giving you convenient access to each back-end using the same
    | syntax for each one. Here you may set the default queue driver.
    |
    | Supported: "sync", "database", "beanstalkd", "sqs", "redis", "null"
    |
    */

    'default' => env('QUEUE_DRIVER', 'rabbitmq'),

    /*
    |--------------------------------------------------------------------------
    | Queue Connections
    |--------------------------------------------------------------------------
    |
    | Here you may configure the connection information for each server that
    | is used by your application. A default configuration has been added
    | for each back-end shipped with Laravel. You are free to add more.
    |
    */

    'connections' => [

        'sync' => [
            'driver' => 'sync',
        ],

        'database' => [
            'driver' => 'database',
            'table' => 'jobs',
            'queue' => 'default',
            'retry_after' => 90,
        ],

        'beanstalkd' => [
            'driver' => 'beanstalkd',
            'host' => 'localhost',
            'queue' => 'default',
            'retry_after' => 90,
        ],

        'sqs' => [
            'driver' => 'sqs',
            'key' => 'your-public-key',
            'secret' => 'your-secret-key',
            'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
            'queue' => 'your-queue-name',
            'region' => 'us-east-1',
        ],

        'redis' => [
            'driver' => 'redis',
            'connection' => 'default',
            'queue' => 'default',
            'retry_after' => 90,
        ],
        'rabbitmq' => [
          'driver' => 'rabbitmq',
          'factory_class' => \Enqueue\AmqpBunny\AmqpConnectionFactory::class,
        ],

//        'amqp' => array(
//          'driver' => 'amqp',
//          'host' => 'rabbitmq',
//          'port' => '5672',
//          'user' => 'guest',
//          'password' => 'guest',
//          'vhost' => '/',
//          'queue' => null,
//          'queue_flags' => ['durable' => true, 'routing_key' => null], //Durable queue (survives server crash)
//          'declare_queues' => true, //If we need to declare queues each time before sending a message. If not, you will have to declare them manually elsewhere
//          'message_properties' => ['delivery_mode' => 2], //Persistent messages (survives server crash)
//          'channel_id' => null,
//          'exchange_name' => null,
//          'exchange_type' => null,
//          'exchange_flags' => null,
//        ),
//
      'interop' => [
        'driver' => 'interop',
        'connection_factory_class' => \Enqueue\AmqpBunny\AmqpConnectionFactory::class,

        // the factory specific options
        'dsn' => 'amqp://rabbitmq',
        'queue' => 'mikqueue',
      ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Failed Queue Jobs
    |--------------------------------------------------------------------------
    |
    | These options configure the behavior of failed queue job logging so you
    | can control which database and table are used to store the jobs that
    | have failed. You may change them to any database / table you wish.
    |
    */

    'failed' => [
        'database' => env('DB_CONNECTION', 'mysql'),
        'table' => 'failed_jobs',
    ],

];
