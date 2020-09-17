<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $table = 'blogs';

    public function users(){
        return $this->belongTo(User::class, 'user_id');
    }

    public function categories(){
        return $this->belongTo(Category::class, 'category_id');
    }
   
}
