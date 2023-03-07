<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    //
    public function index(){

        //フォローしているユーザーid取得
        $following_id = Auth::user()->followUsers()->pluck('followed_id');
         // Postモデルに定義されているusersテーブルとのリレーションを定義しているuserメソッドにアクセスしuserの情報を取得
        $posts = Post::with('user')->whereIn('user_id',$following_id)->get();
        $myPosts = Post::where('user_id',Auth::user()->id)->get();

        return view('posts.index',compact('posts','myPosts'));
    }

    public function create(Request $request) {
        $post = $request->input('newPost');
        Post::create(['post'=>$post,'user_id'=>Auth::id()]);
        return redirect('top');

    }





}
