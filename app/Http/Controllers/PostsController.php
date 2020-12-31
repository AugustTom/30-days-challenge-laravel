<?php

namespace App\Http\Controllers;

use App\Models\Challenge;

use App\Models\Image;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\PagesController;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this -> validate($request, [
            'text' => 'required',
            'image_placeholder.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);

        $user_id = Auth::id();
        $post = new Challenge;
        $post-> text = $request ->input('text');
        $post-> user_id = $user_id;

        $date = Carbon::now();
        $post -> start_date = $date->toDateString();
        $post -> end_date = $date->addDays(30)->toDateString();

        $post -> save();
        if($request->hasFile('image_placeholder')) {

            $image = new Image();
            $file = $request->image_placeholder;
            $path = '/images/post_images/';
            $name = time().'.'.$file->getClientOriginalName();
            $image-> path = $path.$name;
            $image->imageable_id = $post->id;
            $image->imageable_type = Challenge::class;
            $image->save();
            $file->move(public_path() .$path,$name);

        }


        return redirect('/') -> with('success','Challenge created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $challenge = Challenge::find($id);
        return view('posts.view')->with('challenge', $challenge);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Challenge::find($id);
        return view('posts.edit')->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $user_id = Auth::id();
        $this -> validate($request, [
            'text' => 'required',
            'image_placeholder.*' => 'mimes:jpeg,jpg,png,gif,csv,txt,pdf|max:2048'
        ]);
        $post = Challenge::find($id);
        $post->text = $request->input('text');

        if($request->hasFile('image_placeholder')) {
//            TODO delete old image file
            if($post->image != null){
                $image = Image::find($id);
            }
            else{
                $image = new Image();
                $image->imageable_id = $post->id;
                $image->imageable_type = Challenge::class;
            }
            $file = $request->image_placeholder;
            $path = '/images/post_images/';
            $name = time().'.'.$file->getClientOriginalName();
            $image-> path = $path.$name;
            $image->save();
            $file->move(public_path() .$path,$name);
        }


        $post-> user_id = $user_id;
        $post -> save();
        return redirect('/') -> with('success','Challenge updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $post = Challenge::find($id);
        $post -> delete();
        return redirect('/') -> with('success', 'Challenge deleted');
    }

    public function enter($challenge_id){
        $user = Auth::user();

        $user->participantIn()->attach($challenge_id);
        return null;
    }




}
