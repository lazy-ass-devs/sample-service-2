<?php

namespace App\Publishers;
use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class RabbitMQPublisher
{

    /**
     * @var AMQPStreamConnection
     */
    public $connection;

    /**
     * @var AMQPStreamConnection
     */
    public $channel;

    /**
     * Name of the exchange event
     * @var String $exchangeName
     */
    public function __construct()
    {
        $this->connection = new AMQPStreamConnection('localhost', '5672', 'guest', 'guest');
        $this->channel = $this->connection->channel();
    }

    /**
     * Send Message
     * @var $data - message to be sent.
     */
    public function publish($exchangeName, $data)
    {
        $encodeData = json_encode($data);

        $message = new AMQPMessage($encodeData);
        /**
         * Broadcast all the message it receives to all queues it knows.
         */
        $this->channel->exchange_declare($exchangeName, 'fanout', false, false, false);
        $this->channel->basic_publish($message, $exchangeName);
        echo ' [x] Sent ', $encodeData, "\n";
    }
}
