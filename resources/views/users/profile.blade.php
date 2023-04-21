@extends('layouts.login')

@section('content')
<div class="profile">
  {!! Form::open(['url' => '/profile/update','enctype' => "multipart/form-data"]) !!}
  <div class="profile_content">
    <div class="profile_icon">
      <img src="" alt="アイコン">
    </div>
    <div class="profile_forms">

      <div class="profile_form">
        <p class="profile_label">user name</p>
        {!! Form::text('username',null) !!}

      </div>
      <div class="profile_form">
        <p class="profile_label">mail adress</p>
        {!! Form::text('mail',null) !!}
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
        {!! Form::text('bio',null) !!}
      </div>
      <div class="profile_form">
        <p class="profile_label">icon image</p>
        {!! Form::file('icon',null) !!}
      </div>

    </div>
  </div>
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

  <button class="profile_button  btn-danger" type="submit">更新</button>
  {!! Form::close()!!}
</div>


@endsection
