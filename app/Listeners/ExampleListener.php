<?php

namespace App\Listeners;

use App\Events\ExampleEvent;
use App\Publishers\RabbitMQPublisher;

class ExampleListener
{
    private $publisher;
    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(RabbitMQPublisher $publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * Handle the event.
     *
     * @param  ExampleEvent  $event
     * @return void
     */
    public function handle(ExampleEvent $event)
    {
        $this->publisher->publish($event->exchangeName, $event->data);
    }
}
