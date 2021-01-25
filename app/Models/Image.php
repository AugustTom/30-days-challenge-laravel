<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path'];
    use HasFactory;

    /**
     * Get the parent image model (user or post).
     */
    public function type(){
        return $this->morphTo();
    }


}
