<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Authファサードを読み込んでねっ！

class LoginController extends Controller
{
    /**
     * 認証の試行を処理
     */

    public function login(Request $request)
    {
      // emailとpasswordが入った変数
      $credentials = $request->only('mail','password');

        // ログインに成功したとき
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();// ログインが成功していたらセッションを書き直す
            return redirect()->route('top');
        }

        // 上記のif文でログインに成功した人以外(=ログインに失敗した人)がここに来る
        return redirect()->back()->withErrors([
            'login-error' => 'mailかpasswordが間違っています'
        ]);
    }
}
