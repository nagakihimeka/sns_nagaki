@extends('layouts.logout')

@section('content')

{!! Form::open(['url' => '/register']) !!}

<h2>新規ユーザー登録</h2>
<!-- エラーエッセージ -->
 @if (count($errors) > 0)
    <div>
        <ul class="error-messages">
            @foreach ($errors->all() as $error )
                <li class="error-message">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
 <!-- エラーエッセージ -->
<div class="login-forms">
    <div class="login-form">
    {{ Form::label('ユーザー名') }}
    {{ Form::text('username',null,['class' => 'input']) }}
    </div>
     <div class="login-form">
    {{ Form::label('メールアドレス') }}
    {{ Form::text('mail',null,['class' => 'input']) }}
    </div>
     <div class="login-form login-form-pass">
    {{ Form::label('パスワード') }}
    {{ Form::password('password',null,['class' => 'input']) }}
    </div>
     <div class="login-form login-form-pass">
    {{ Form::label('パスワード確認') }}
    {{ Form::password('password-confirm',null,['class' => 'input']) }}
    </div>
</div>
{{ Form::submit('登録',['class'=> 'submit-button']) }}

<p class="link-button"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
