<?php 

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageCreated implements ShouldBroadcast
{
    public $message;

    public function __construct($message) 
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
       // return new Channel('messages');
        return new \Illuminate\Broadcasting\Channel('messages');

    }
}