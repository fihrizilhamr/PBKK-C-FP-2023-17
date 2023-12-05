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
    public int $sender, $receiver;


    public function __construct($message, $timestamp, $sender, $receiver)
    {
        $this->message = $message;
        $this->timestamp = $timestamp;
        $this->sender = $sender;
        $this->receiver = $receiver;
    }

    public function broadcastOn(): Channel
    {
        // Assuming $user1 and $user2 are the IDs of the two users in the chat
        $channelName = 'private-chat.' . min($this->sender, $this->receiver) . '.' . max($this->sender, $this->receiver);

        return new PrivateChannel($channelName);
    }

    public function broadcastAs(): string
    {
        return 'chat';
    }
}
