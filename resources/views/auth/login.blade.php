@extends('layouts.logout')

@section('content')

<div class="login-container">
{!! Form::open(['url' => '/login']) !!}


    <p class="login-title">AtlasSNSへようこそ</p>

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
             {{ Form::label('mail adress') }}
        {{ Form::text('mail',null,['class' => 'mail-input input']) }}
        </div>
        <div class="login-form">
            {{ Form::label('password') }}
        {{ Form::password('password',['class' => 'pass-input input']) }}
        </div>
    </div>


    {{ Form::submit('LOGIN',['class'=> 'submit-button']) }}

    <p class="link-button"><a href="/register">新規ユーザーの方はこちら</a></p>

</div>


{!! Form::close() !!}

@endsection
