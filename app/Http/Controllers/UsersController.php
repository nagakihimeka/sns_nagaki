<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Validator;

class UsersController extends Controller
{

    public function profile(){
        $user = Auth::user();
        return view('users.profile',compact('user'));
    }

    // プロフィール更新
    public function update(Request $request) {
        $id = Auth::user()->id;
        $username = $request->input('username');
        $mail = $request->input('mail');
        $password_confirm = $request->input('password-confirm');
        $bio = $request->input('bio');
        // 画像名で取得
        $img_name = $request->icon->getClientOriginalName();
        $img = $request->icon->storeAs('', $img_name,'public');


        User::where('id',$id)->update(['username' =>
        $username,'mail' => $mail,'bio' => $bio,'images' => $img]);


        //パスワードのみ
        $user = Auth::user();
        $user->password = bcrypt($request->input('password'));
        $user->save();


        return redirect('profile');

    }


    public function about ($id){
        // ユーザー情報
       $user = User::find($id);
        //投稿取得
        $posts = Post::where('user_id',$id)->get();

        return view('users.user_profile',compact('user','posts'));
    }



    public function index(Request $request){
        //ログインしていないユーザーを取得
        $users = User::all()->except([\Auth::id()]);
        //followed_idのカラムを取得
        $follow = Follow::select('followed_id')->get();
        return view('users.search',compact('users','follow'));
    }


    public function search(Request $request) {
        // 入力された値を取得
        $keyword = $request->input('search');
        $query = User::query();
         if(!empty($keyword)) {
            $query->where('username', 'LIKE', "%{$keyword}%");
        } else {
            // フォームの中身が空だったら戻る
            return redirect('search');
        }
        // 一覧表示するデータ
        $users = $query->get();

        return view('users.search',compact('keyword','users'));
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
