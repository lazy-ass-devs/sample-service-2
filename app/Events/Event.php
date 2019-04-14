<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;

abstract class Event
{
    use SerializesModels;
    
    public $data;
    public $exchangeName;

    public function __invoke(String $eventName, Array $data){
        $this->eventName = $eventName;
        $this->exchangeName = 'events';
        $this->data = [
            'event_id' => str_random(16),
            'event_name' => $eventName,
            'raised_at' => date('Y-m-d h:i:s', time()),
            'data' => $data
        ];
    }    
}
