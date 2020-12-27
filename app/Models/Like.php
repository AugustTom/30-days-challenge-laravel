<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    use HasFactory;

    /** Functions to retrieve relationships
     *
     * user function returns the user that created the comment
     * @return BelongsTo relationship with User Model
     */
    public function user(){
        return $this->belongsTo("App\Models\User");
    }
    /**
     * post function retrieves the post that the comment belongs to
     * @return BelongsTo relationship with Post Model
     */
    public function challenge(){
        return $this->belongsTo('App\Models\Challenge');
    }
}
