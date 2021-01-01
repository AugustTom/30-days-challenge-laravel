<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Comment;
use App\Models\Like;

use App\Providers\LikedPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{

    /** Creates new like
     * @param int $challenge_id
     * @return Like
     */
    public function apiStore( int $challenge_id)
    {

        $like = new Like();
        $like->user_id = Auth::id() ;
        $like->challenge_id = $challenge_id;
        $like -> save();
        $challenge = Challenge::find($challenge_id);
        $this->sendNotification($challenge);
        return $like;
    }

    /** Created event notification
     * @param Challenge $challenge
     */
    public function sendNotification(Challenge $challenge){
        event(new LikedPost(Auth()->user(), $challenge));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param int $comment_id
     * @return Comment
     */
}
