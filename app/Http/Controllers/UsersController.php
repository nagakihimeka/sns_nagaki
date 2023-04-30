<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Follow;
use App\Post;
use Illuminate\Support\Facades\Auth;
use Validator;
use Redirect;

class UsersController extends Controller
{

    public function profile(){
        $user = Auth::user();
        return view('users.profile',compact('user'));
    }

    // プロフィール更新
    public function update(Request $request) {

         // バリデーション
        $validator = Validator::make($request->all(), [
            'username' => 'required  | between:2,11',
            'mail' => 'required|between:5,39|email:filter,dns|unique:users,mail',
            'password' => 'nullable | regex:/^[a-zA-Z0-9]+$/ | between:8,19',
            'password-confirm' => 'nullable | regex:/^[a-zA-Z0-9]+$/| between:8,19|same:password',
            'bio' => 'nullable |max:150',
            'icon' => 'nullable | nullable | mimes:jpg,png,bmp,gif,svg',
        ]);

        if ($validator->fails()) {
            return redirect('/profile')
                        ->withErrors($validator)
                        ->withInput();
        }else {

            $id = Auth::user()->id;
            $username = $request->input('username');
            $mail = $request->input('mail');
            $password_confirm = $request->input('password-confirm');
            $bio = $request->input('bio');
            $icon = $request->icon;

            // アイコンあれば名前取得して変更
            if(isset($icon)) {
                 // 画像名で取得
                $img_name = $request->icon->getClientOriginalName();
                $img = $request->icon->storeAs('', $img_name,'public');
                User::where('id',$id)->update(['images' => $img]);
            }
            // 変更処理（）
            User::where('id',$id)->update(['username' =>
            $username,'mail' => $mail,'bio' => $bio]);
            //パスワードのみ
            $user = Auth::user();
            $user->password = bcrypt($request->input('password'));
            $user->save();
        }

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
        return Redirect::back();
    }

    //フォロー解除
    public function remover($id) {
        $user_id = Auth::user()->id;//自分のID
        $follower_id = $id;//相手のID
         \DB::table('follows')->where([
            'followed_id' => $follower_id,
            'following_id' => $user_id
        ])->delete();
        return Redirect::back();
    }


}
