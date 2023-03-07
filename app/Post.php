<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user() {
    return $this->belongsTo('App\User');
   }

//    指定した蚊rむのみcreateやupdateが可能になる
   protected $fillable = [
        'post','user_id'
    ];
}
