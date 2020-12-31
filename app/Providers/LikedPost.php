<?php

namespace App\Providers;

use App\Models\Challenge;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LikedPost implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $challenge;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Challenge $challenge
     */
    public function __construct(User $user, Challenge $challenge)
    {
        $this->user = $user;
        $this->challenge = $challenge;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        $user_channel_id = $this->challenge->user()->first()->id;
        return new PrivateChannel('notifications.'.$user_channel_id);
    }

    /**
     * The event's broadcast name.
     *
     * @return string
     */
    public function broadcastAs()
    {
        return 'PostLiked';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return ['user' => $this->user->name,
            'challenge_id' => $this->challenge->id,
            'avatar' => $this->user->image->path];
    }
}
