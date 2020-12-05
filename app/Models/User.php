<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /** Functions to retrieve relationships
    *
    * Comments function returns all the comments associated with the user
    * @return HasMany relationship with Comment Model
     *
     */
    public function comments(){
       return $this-> hasMany("App\Models\Comment");
    }

    /**
     *
     * posts function retrieves all the posts associated with the user
     * @return \Illuminate\Database\Eloquent\Relations\HasMany relationship with Post Model
     */
    public function challenges(){
        return $this -> hasMany('App\Models\Challenge');
    }

    public function participantIn(){
        return $this -> belongsToMany('App\Models\Challenge','challenge_user','user_id','challenge_id');
    }

}
