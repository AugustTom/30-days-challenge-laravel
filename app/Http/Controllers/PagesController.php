<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PagesController extends AuthenticatedSessionController
{
    public function index(){

        if(Auth::check()) {
            $challenges = Challenge::orderBy('created_at', 'desc')->paginate(10);
            return view('pages.index')->with('challenges', $challenges);
        }
        else{

            return $this->create();
        }
    }

    public function about(){
        $title = 'About website';
        return view('pages.about') -> with('title', $title);
    }
}
