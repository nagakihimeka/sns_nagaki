@extends('layouts.login')

@section('content')
<div class="top follow_top">
  <p>Folower List</p>
  <div class="follow_list">
    @foreach($users as $user)
      <a href="/profile/{{$user->id}}"><img src="{{asset('images/'.$user->images)}}" alt="{{$user->username}}アイコン">
      </a>
    @endforeach
  </div>
</div>

<ul class="post_items">
    @foreach($posts as $post)
    <li class="post_item">
      <div class="post_icon">
         <a href="/profile/{{$post->user_id}}">
          <img src="{{asset('images/'.$post->user->images)}}">
          </a>
      </div>
      <div class="post_content">
        <div class="post_head">
          <p class="post_username">{{$post->user->username}}</p>
          <p class="post_date">{{$post->updated_at}}</p>
        </div>
        <p class="post_text">{{$post->post}}</p>
      </div>

    </li>
    @endforeach
</ul>


@endsection
