<?php

namespace App\Providers;

use App\Providers\CommentCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendCommentNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(CommentCreated $event)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CommentCreated  $event
     * @return void
     */
    public function handle(CommentCreated $event)
    {

    }
}
