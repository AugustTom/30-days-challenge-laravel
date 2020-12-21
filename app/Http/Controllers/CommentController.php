<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Comment[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Http\Response
     */
    public function apiIndex($challenge_id = null)
    {
        if($challenge_id != null){
            $comments = Comment::where('challenge_id',$challenge_id)->get();
        }
        else {
            $comments = Comment::all();
        }
        return $comments;
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function apiStore(Request $request, Challenge $challenge)
    {
        $this -> validate($request, [
            'text' => 'required',
        ]);

        $comment = new Comment();
        $comment->text =$request->input('comment_text');


        $comment->user_id = Auth::id() ;
        $comment->challeng_id = $challenge->id;
        $comment -> save();

        return $comment;
    }


}
