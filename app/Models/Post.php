<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'text',
    ];

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
}
