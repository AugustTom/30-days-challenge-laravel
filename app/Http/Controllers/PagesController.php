<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Challenge;

use App\Models\Joke;
use Illuminate\Support\Facades\Auth;


class PagesController extends AuthenticatedSessionController
{
    /** return list of database items
    */
    public function index(){

        if(Auth::check()) {
            $challenges = Challenge::orderBy('created_at', 'desc')->simplePaginate(5);
            return view('pages.index')->with('challenges', $challenges);
        }
        else{

            return $this->create();
        }
    }


    /** Returns about page
     *
     */
    public function about(){
        $title = 'About website';
        return view('pages.about') -> with('title', $title);
    }

    /**
     * returns a joke
     * @param Joke $joke
     */
    public function joke(Joke $joke){
        return $joke->getAJoke();
    }


}
