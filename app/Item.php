<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function getUser(){
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function getCategoryName(){
        return $this->belongsTo(Category::class,'category_id');
    }

    public function getPhoto(){
        return $this->hasOne(ItemPhoto::class);
    }

    public function getPhotos(){
        return $this->hasMany(ItemPhoto::class);
    }
}
