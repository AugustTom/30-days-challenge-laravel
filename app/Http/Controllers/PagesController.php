<?php

namespace App\Http\Controllers;

use App\Models\Challenge;
use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    public function index(){
        //TODO pagination is fucked
        $challenges = Challenge::orderBy('created_at','desc')->paginate(10);
        return view('pages.index') -> with('challenges', $challenges);
    }

    public function about(){
        $title = 'About website';
        return view('pages.about') -> with('title', $title);
    }
}
