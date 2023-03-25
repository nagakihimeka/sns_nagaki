<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    // フォロー→フォロワー（フォローしているユーザーを取得したい）
    public function followUsers() {
        //第３引数に取得したい情報
        return $this->belongsToMany('App\User', 'follows', 'following_id', 'followed_id');
    }

     // フォロワー→フォロー（フォロワーを取得したい）
    public function  followers() {
        return $this->belongsToMany('App\User', 'follows', 'followed_id', 'following_id');
    }

   //投稿
   public function post() {
    return $this->belongsToMany('App\Post');
   }

   public function isFollowing(Int $user_id) {
     return (boolean) $this->followUsers()->where('followed_id', $user_id)->exists();
    }

}
