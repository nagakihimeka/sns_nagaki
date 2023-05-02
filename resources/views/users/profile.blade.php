@extends('layouts.login')

@section('content')
<div class="profile">
  {!! Form::open(['url' => '/profile/update','enctype' => "multipart/form-data"]) !!}
  <div class="profile_content">
    <div class="profile_icon">
      @if($user->images == 'dawn.png')
        <img src="{{asset('images/icon1.png')}}" alt="{{$user->username}}">
      @else
      <img src="{{asset('images/'.$user->images)}}" alt="{{$user->username}}">
      @endif
    </div>
    <div class="profile_forms">

      <div class="profile_form">
        <p class="profile_label">user name</p>
        {!! Form::text('username',old('username',$user->username)) !!}

      </div>
      <div class="profile_form">
        <p class="profile_label">mail address</p>
        {!! Form::text('mail',old('mail',$user->mail)) !!}
      </div>
      <div class="profile_form">
        <p class="profile_label">password</p>
        {!! Form::password('password',null) !!}
      </div>
      <div class="profile_form">
        <p class="profile_label">password confirm</p>
        {!! Form::password('password-confirm',null) !!}
      </div>
      <div class="profile_form">
        <p class="profile_label">bio</p>
        {!! Form::text('bio',old('bio',$user->bio)) !!}
      </div>
      <div class="profile_form">
        <p class="profile_label">icon image</p>
        <label class="file_label" id="file_label">
          {!! Form::file('icon',['class' => 'fileinput']) !!}
          <span class="filename">ファイルを選択</span>
        </label>
      </div>

    </div>
  </div>

  <!-- エラーエッセージ -->
  <div class="profile_mess">
     @if (count($errors) > 0)
    <div class="profile_error">
        <ul class="error-messages">
            @foreach ($errors->all() as $error )
                <li class="error-message">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
  </div>
 <!-- エラーエッセージ -->

  <button class="profile_button  btn-danger" type="submit">更新</button>
  {!! Form::close()!!}
</div>


@endsection
