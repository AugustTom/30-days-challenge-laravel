<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Comment;
use App\Models\User;
use App\Providers\CommentCreated;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Comment[]|Collection|Response
     */
    public function apiIndex($challenge_id = null)
    {
        if($challenge_id != null){
            $comments = Comment::where('challenge_id',$challenge_id)->get();
        }
        else {
            $comments = Comment::all();
            foreach ($comments as $comment) {
                $comment->user_id = User::where('id', $comment->user_id);
                }

        }
        return $comments;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param int $challenge_id
     * @return Comment
     */
    public function apiStore(Request $request, int $challenge_id)
    {

        $comment = new Comment();
        $comment->text = $request->input('text');

        $comment->user_id = Auth::id() ;
        $comment->challenge_id = $challenge_id;
        $comment -> save();
        $challenge = Challenge::find($challenge_id);
        $this->sendNotification($challenge, $comment);
        return $comment;
    }

    /** Created event notification
     * @param int $challenge_id
     */
    public function sendNotification(Challenge $challenge, Comment $comment){
        event(new CommentCreated(Auth()->user(), $challenge, $comment));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param int $comment_id
     * @return Comment
     */
    public function apiUpdate(Request $request)
    {
//        $input = $request->all();
////        return  $request->text;
//        return $request;
        $id = $request->input('comment-id');
        $comment = Comment::find($id);

        $comment->text = $request->input('text');

        $comment -> save();

        return $comment;
    }

    public function apiDelete(Request $request)
    {
        $id = $request->input('comment-id');
        $comment = Comment::find($id);
        $comment->delete();
        return null;
    }



}
