<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;

class Joke extends Model
{
    use HasFactory;

    private $url = "https://api.chucknorris.io/jokes/random";

    public function getAJoke(){
        $response = Http::get($this->url);
        return $response['value'];
    }

}
