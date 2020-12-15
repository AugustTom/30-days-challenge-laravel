<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['text','image'];

    public function getImage(){
        return $this->image;
    }


    /** Functions to retrieve relationships
     * user function returns the user that created the post
     * @return BelongsTo relationship with User Model
     */
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    /**
    comment function retrieves all the comments that are made to post
     * @return HasMany relationship with User Model
     */
    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function participants(){
        return $this -> belongsToMany('App\Models\User','challenge_participants',
            'challenge_id'
            ,'participant_id') ->withTimestamps();
    }
}
