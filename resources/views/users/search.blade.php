@extends('layouts.login')

@section('content')
<div class="container">
  <div class="top search_top">
    {!! Form::open(['url'=>'search-result'])!!}
    {!! Form::input('text','search',old('title'),['placeholder'=>'ユーザー名','class'=>'search_form']) !!}
<button class="search_button" type="submit"><i class="fas fa-search"></i></button>

    {!! Form::close() !!}
    <p class="keyword">@if (isset($keyword)) 検索ワード：{{ $keyword }} @endif</p>
  </div>

  <div class="search_list">
    @foreach($users as $user)
    <div class="search_user">
      <div class="search_user_left">
        @if($user->images == 'dawn.png')
          <img src="{{asset('images/icon1.png')}}" alt="{{$user->username}}">
        @else
          <img src="{{asset('images/'.$user->images)}}" alt=" {{$user->username}}">
        @endif
        <div class="search_user_name">{{$user->username}}</div>
      </div>
      <div class="search_user_right">
        @if(Auth::user()->isFollowing($user->id))
        <div class="unfollow_button"><a href="/search/{{$user->id}}/remover" class="btn btn-danger btn-lg">フォロー解除</a></div>
        @else
        <div class="follow_button"><a href="/search/{{$user->id}}/follow" class="btn btn-info btn-lg" name="search">フォローする</a></div>
      @endif
      </div>

     </div>
    @endforeach

  </div>
</div>


@endsection
