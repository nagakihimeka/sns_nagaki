@extends('layouts.login')

@section('content')

<h2>機能を実装していきましょう。</h2>
<!-- 20230208-下記を入れるとサイドバーがずれることを発見 -->
<div class="container">
  {!! Form::open(['url' =>'posts/index']) !!}
  <div class="form-group">
    {!! Form::input('text','newPost',null,['required','placeholder' => '投稿内容を入力してください。','class' => 'form-control']) !!}
  </div>
   <button type="submit" class="btn pull-right"></button>
   {!! Form::close()!!}
</div>


@endsection
