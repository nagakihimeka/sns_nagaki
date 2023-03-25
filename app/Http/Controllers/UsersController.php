<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }

    public function index(Request $request){
        //ログインしていないユーザーを取得
        $users = User::all()->except([\Auth::id()]);
        //followed_idのカラムを取得
        $follow = Follow::select('followed_id')->get();



        return view('users.search',compact('users','follow'));
    }


    //フォロー機能
    public function follow($id) {
        $user_id = Auth::user()->id;//自分のID
        $is_following = Auth::user()->isFollowing($id);
        

        if(!$is_following) //フォローしていなかったらフォローする
        \DB::table('follows')->insert([
            'followed_id' => $id,
            'following_id' => $user_id
        ]);
        return redirect('search');
    }

    //フォロー解除
    public function remover($id) {
        $user_id = Auth::user()->id;//自分のID
        $follower_id = $id;//相手のID
         \DB::table('follows')->where([
            'followed_id' => $follower_id,
            'following_id' => $user_id
        ])->delete();
        return redirect('search');
    }


}
