@extends('layouts.login')

@section('content')
<div class="top follow_top">
  <p>Folow List</p>
  <div class="follow_list">
    @foreach($following as $follow)
      <a href=""><img src="images/icon{{$follow}}.png" alt=" {{$follow}}アイコン">
      </a>
    @endforeach
  </div>
</div>

   <ul class="post_items">
    @foreach($posts as $post)
    <li class="post_item">
      <div class="post_icon">
         <img src="images/{{$post->user->images}}">
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
