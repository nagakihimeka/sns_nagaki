@extends('layouts.login')

@section('content')

<h2>機能を実装していきましょう</h2>
<!-- 20230208-下記を入れるとサイドバーがずれることを発見 -->
<div class="container">
  {!! Form::open(['url' =>'posts/index']) !!}
  <div class="form-group">
    {!! Form::input('text','newPost',null,['required','placeholder' => '投稿内容を入力してください。','class' => 'form-control']) !!}
  </div>
  <p>テスト</p>
  <button type="submit" class="btn pull-right">投稿</button>
  @foreach($posts as $post)
    <p>名前：{{ $post->user->username }}</p>
    <p>投稿内容：{{ $post->post }}</p>
    <div class="underLine"></div>
  @endforeach
  @foreach($myPosts as $myPost)
    <p>名前：{{ $myPost->user->username }}</p>
    <p>投稿内容：{{ $myPost->post }}</p>
  @endforeach
   {!! Form::close()!!}
</div>


@endsection
