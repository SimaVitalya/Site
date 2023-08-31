<?php

namespace App\Events;

use App\Models\User;
use App\Models\UserTicketReply;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class MessageSend implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public UserTicketReply $message;

    public function __construct( UserTicketReply $message)
    {
        $this->message = $message;
    }

    public function broadcastOn()
    {
        return new Channel('chat');
    }

//    /**
//     * The event's broadcast name.
//     *
//     * @return string
//     */
//    public function broadcastAs(): string
//    {
//        return 'chat_message';
//    }
//
    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith(): array
    {
        return [
            'message' => $this->message
        ];
    }
}
