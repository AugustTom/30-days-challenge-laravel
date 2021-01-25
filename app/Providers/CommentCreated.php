<?php

namespace App\Providers;

use App\Models\Challenge;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class CommentCreated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $commentator;
    public $challenge;
    public $message;
    public $username;
    public $comment;

    /**
     * Create a new event instance.
     *
     * @param User $user
     * @param Challenge $challenge
     */
    public function __construct(User $commentator, Challenge $challenge, Comment $comment)
    {
        $this->commentator = $commentator;
        $this -> username = $commentator ->name;
        $this-> challenge = $challenge;
        $this->comment = $comment;
        $this->message = "{$this->username} commented on your challenge";
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
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
        return 'CommentCreated';
    }

    /**
     * Get the data to broadcast.
     *
     * @return array
     */
    public function broadcastWith()
    {
        return ['commentator' => $this->username,
            'challenge_id' => $this->challenge->id,
            'commentator_avatar' => $this->commentator->image->path,
            'message' => $this->message,
            'comment' => $this->comment->text];
    }
}
