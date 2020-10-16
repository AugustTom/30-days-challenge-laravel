<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'post_id',
        'text',
    ];

    public function user(){
        return $this->belongsTo("App\Models\User");
    }

    public function post(){
        return $this->belongsTo('App\Models\Post');
    }
}
