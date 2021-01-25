<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();
        return view('auth.register_admin')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return null;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        return null;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return null;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit()
    {
        return null;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function update(Request $request)
    {

        $user = User::find( Auth::id());

        $this -> validate($request, [
            'name' => 'required',
        ]);

        $user->name = $request->input('name');
        $user->about = $request->input('about-section');

        $id = $user->id;

        if($request->hasFile('image_holder')) {
//
            if($user->image != null){
                $image = $user->image;
            }
            else{
                $image = new Image();
                $image->imageable_id = $id;
                $image->imageable_type = User::class;
                dd($image);
            }
            $file = $request->image_holder;
            $path = '/images/avatars/';
            $name = time().'.'.$file->getClientOriginalName();
            $image-> path = $path.$name;
            $image->save();
            $file->move(public_path() .$path,$name);

        }
        $user->save();

        return redirect('/dashboard') -> with('success','Profile updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function changeRights($id)
    {
        $user = User::find($id);
        $user -> is_admin = !$user->is_admin;
        $user->save();
        return redirect('/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user -> delete();
        return redirect('/users');
    }

}
