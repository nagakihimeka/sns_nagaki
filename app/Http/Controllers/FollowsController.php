<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Post;

class FollowsController extends Controller
{

    public function followList(){
        // フォローしているユーザーのid取得
        $following = Auth::user()->followUsers()->pluck('followed_id');
        //投稿を取得
        $posts = Post::with('user')->whereIn('user_id',$following)->latest()->get();

        return view('follows.followList',compact('posts','following'));

    }
    public function followerList(){
          //自分をフォローしている人のid取得
        $follower = Auth::user()->followers()->pluck('following_id');
        $posts = Post::with('user')->whereIn('user_id',$follower)->latest()->get();

        return view('follows.followerList',compact('posts','follower'));
    }


    public function profile(Request $request) {

        // return back();
    }





}
