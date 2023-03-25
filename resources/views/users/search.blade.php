@extends('layouts.login')

@section('content')
<div class="container">
  <div class="search-box">
    {!! Form::open(['url'=>'users/search'])!!}
    {!! Form::input('text','search',null,['placeholder'=>'ユーザー名']) !!}
    <button type="submit"></button>
    {!! Form::close() !!}
  </div>
  <div class="border" style="border"></div>
  <div class="search-follow">
    @foreach($users as $user)
    <div class="user-icon">
      <img src="images/icon2.png" alt="">
        {{$user->username}}
        <!-- 既にフォロー済みではないか -->

        <!-- 相手のIDを取得 -->

     @if(Auth::user()->isFollowing($user->id))
      <a href="/search/{{$user->id}}/remover" class="follow-btn">フォロー解除</a>
        @else
        <a href="/search/{{$user->id}}/follow" class="follow-btn">フォローする</a>
      @endif
     </div>
    @endforeach
  </div>
</div>


@endsection
