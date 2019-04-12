<?php

namespace App\Events;

class ExampleEvent extends Event
{    
    public $exchangeName = 'events';
    public $data;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->data = (object) ['name' => 'Lazy Ass Devs', 'occupation' => 'Devs'];
    }
}
