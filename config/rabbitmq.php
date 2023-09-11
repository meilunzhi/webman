<?php

return [

    'MQ'        => [
        'host'     => '127.0.0.1',
        'port'     => '5672',
        'login'    => 'admin',
        'password' => '',
        'vhost'    => '/'
    ],
    'sms_queue' => [
        'exchange_name' => 'sms_exchange',
        'exchange_type' => 'direct',
        'queue_name'    => 'sms_queue',
        'route_key'     => 'sms_roteking',
        'consumer_tag'  => 'consumer'
    ]
];
