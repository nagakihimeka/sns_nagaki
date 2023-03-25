<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;

class PostsController extends Controller
{
    //
    public function index(){
        //自分のID
        $user_id = Auth::user()->id;
        //フォローしているユーザーid取得
        $following_id = Auth::user()->followUsers()->pluck('followed_id');
         // Postモデルに定義されているusersテーブルとのリレーションを定義しているuserメソッドにアクセスしuserの情報を取得
         //latest() 最新順に
        $posts = Post::with('user')->whereIn('user_id',$following_id)->orWhere('user_id',$user_id)->latest()->get();
        
        // $myPosts = Post::where('user_id',Auth::user()->id)->get();

        return view('posts.index',compact('posts','user_id'));
    }

    //投稿
    public function create(Request $request) {
        $post = $request->input('newPost');
        Post::create(['post'=>$post,'user_id'=>Auth::id()]);
        return redirect('top');

    }
    //投稿編集
    public function update(Request $request) {
        $id = $request->input('modal_id');
        $post = $request->input('model_post');

        //バリデーション
        $validator = Validator::make($request->all(),[
            'model_post' => 'required | max:2'
        ]);
        if ($validator->fails()) {
            return redirect('top')
            ->withErrors($validator)// Validatorインスタンスの値を$errorsへ保存
            ->withInput();// 送信されたフォームの値をInput::old()へ引き継ぐ
        }

            // 2つ目の処理
        Post::where('id', $id)->update(['post' => $post]);
        // 3つ目の処理
        return redirect('top');




    }
    // 投稿削除
    public function delete($id) {
        Post::where('id',$id)->delete();
        return redirect('top');
    }




}
