@extends('layouts.login')
@section('content')
<div class="top user_profile">
  <div class="user_profile_left">
    @if($user->images == 'dawn.png')
    <div class="icon"><img src="{{asset('images/icon1.png')}}" alt="">
    </div>
    @else
    <div class="icon"><img src="{{asset('images/'.$user->images)}}" alt="">
    </div>
    @endif
    <div class="text">
      <div class="name">
        <p>name</p>
        <p>{{$user->username}}</p>
      </div>
      <div class="bio">
        <p>bio</p>
        <p>{{$user->bio}}</p>
      </div>
    </div>
  </div>

  <div class="user_profile_right">
    <div class="user_button">
     @if(Auth::user()->isFollowing($user->id))
        <div class="unfollow_button"><a href="/search/{{$user->id}}/remover" class="btn btn-danger btn-lg">フォロー解除</a></div>
        @else
        <div class="follow_button"><a href="/search/{{$user->id}}/follow" class="btn btn-info btn-lg" name="search">フォローする</a></div>
      @endif
    </div>
  </div>


</div>

<ul class='post_items'>
 @foreach($posts as $post)
  <li class="post_item">
    <div class="post_icon">
      @if($user->images == 'dawn.png')
        <img src="{{asset('images/icon1.png')}}" alt="{{$user->username}}">
      @else
      <img src="{{asset('images/'.$user->images)}}" alt="{{$user->username}}">
      @endif
    </div>
    <div class="post_content">
      <div class="post_head">
        <p class="post_username">{{$post->user->username}}</p>
        <p class="post_date">{{$post->user->created_at}}</p>
      </div>
      <p class="post_text">{{$post->post}}</p>
    </div>
  </li>
@endforeach
</ul>

@endsection
