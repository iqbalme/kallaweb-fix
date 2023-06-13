<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class EventRegistered
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
	
	public $data;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($voucher, $event, $peserta_event)
    {
        $this->data['voucher'] = $voucher;
        $this->data['event'] = $event;
        $this->data['peserta_event'] = $peserta_event;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
