<?php

namespace app\controller;

use support\Request;
use PhpAmqpLib\Connection\AMQPStreamConnection as AmpConnection;
use PhpAmqpLib\Message\AMQPMessage;

/**
 * @Rabbitmq content
 */
class RabbitmqController
{
    public function index(Request $request)
    {
        $connection = new AmpConnection('localhost', 5672, 'rabbit', '');
        //创建信道
        $channel = $connection->channel();
        //声明fanout类型交换机
        $channel->exchange_declare('logs', 'fanout', false, false, false);
        $argv = '';
        $data = implode(' ', array_slice($argv, 1));
        if (empty($data)) {
            $data = "info: Hello World!";
        }
        $msg = new AMQPMessage($data);
        //发送消息给交换机
        $channel->basic_publish($msg, 'logs');
        echo ' [x] Sent ', $data, "\n";
        $channel->close();
        $connection->close();
    }

}
