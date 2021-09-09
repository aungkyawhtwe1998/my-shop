<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getCategoryName(){
        return $this->belongsTo(PostCategory::class,'category_id');
    }

    public function getPhoto(){
        return $this->hasOne(PostCoverPhoto::class);
    }

    public function getComments(){
        return $this->hasMany(Comment::class);
    }

}
