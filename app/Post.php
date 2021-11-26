<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function categories(){
        return $this->belongsTo(PostCategory::class,'category_id');
    }

    public function thumbnail(){
        return $this->hasOne(PostCoverPhoto::class);
    }

    public function getComments(){
        return $this->hasMany(Comment::class);
    }

}
