<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PusherBroadcast implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public string $message, $timestamp;
    public int $user1, $user2;


    public function __construct($message, $timestamp, $user1, $user2)
    {
        $this->message = $message;
        $this->timestamp = $timestamp;
        $this->user1 = $user1;
        $this->user2 = $user2;
    }

    public function broadcastOn(): Channel
    {
        // Assuming $user1 and $user2 are the IDs of the two users in the chat
        $channelName = 'private-chat.' . min($this->user1, $this->user2) . '.' . max($this->user1, $this->user2);

        return new PrivateChannel($channelName);
    }

    public function broadcastAs(): string
    {
        return 'chat';
    }
}
