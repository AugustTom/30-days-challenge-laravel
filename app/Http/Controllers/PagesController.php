<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    public function index(){

        if(Auth::check()) {
            $challenges = Challenge::orderBy('created_at', 'desc')->paginate(10);
            return view('pages.index')->with('challenges', $challenges);
        }
        else{

            return $this->about();
        }
    }

    public function about(){
        $title = 'About website';
        return view('pages.about') -> with('title', $title);
    }
}
