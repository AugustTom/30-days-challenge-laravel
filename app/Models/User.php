<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
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
        'is_admin',
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
     * @return HasMany relationship with Post Model
     */
    public function challenges(){
        return $this -> hasMany(Challenge::class);
    }

    /** Functions to retrieve relationships
     * function returns challenge that the user belongs to
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany relationship with Challenge Model
     */
    public function participantIn(){
        return $this -> belongsToMany(Challenge::class,'challenge_participants',
            'participant_id',
            'challenge_id'
            )->withTimestamps();

    }

    /** Functions returns True if user is participating in the challenge
     * @param $challenge_id
     * @return bool relationship with Challenge Model
     */
    public function isParticipant( $challenge_id){
        return $this->participantIn()->where('challenge_id', $challenge_id)->exists();
    }

    /** Functions to retrieve relationships
     * function returns image that belongs to the user
     * @return MorphOne relationship with Challenge Model
     */
    public function image(){
        return $this->morphOne(Image::class, 'imageable')->withDefault(['path'=>'images/avatars/default.png']);
    }

}
