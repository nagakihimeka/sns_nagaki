<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    //指定したカラムのみcreateやupdate可能
    protected $fillable = ['following_id','followed_id'];

    //テーブル名のセオリーを外れたのでテーブル名を定義
    protected $table = 'follows';
}
