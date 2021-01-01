<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Challenge extends Model
{
    use HasFactory;

    protected $fillable = ['text','image_id'];


    /** Functions to retrieve relationships
     * function returns image that belongs to the challenge
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne relationship with Image Model
     */
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
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

    /** Functions to retrieve relationships
     * function returns users that belongs to the challenge
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany relationship with User Model
     */
    public function participants(){
        return $this -> belongsToMany('App\Models\User','challenge_participants',
            'challenge_id'
            ,'participant_id') ->withTimestamps();
    }

    /** Functions to retrieve relationships
     * function returns likes that belongs to the challenge
     * @return \Illuminate\Database\Eloquent\Relations\HasMany relationship with Like Model
     */
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }


}
