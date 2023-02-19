<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // フォロー→フォロワー（フォローしているユーザーを取得したい）
    public function  follows() {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }
}
