<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // get user who create post
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    // get likes on post
    public function likes(){
        return $this->belongsToMany(User::class,'likes');
    }
}
