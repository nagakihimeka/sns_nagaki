@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="user-message">
    <p>{{ Session::get('username') }}さん</p>
    <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <div class="login-message">
    <p>ユーザー登録が完了いたしました。</p>
    <p>早速ログインをしてみましょう！</p>
  </div>
  <p class="btn return-button"><a href="/login">ログイン画面へ</a></p>
</div>

@endsection
