<?php

namespace App\Events;

class ExampleEvent extends Event
{    
        
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        $data = ['name' => 'Lazy Ass Devs', 'occupation' => 'Devs'];
        // the first parameter is the eventName
        parent::__invoke('HelloEvent', $data);
    }

}
