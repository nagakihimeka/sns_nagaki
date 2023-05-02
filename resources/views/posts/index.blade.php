@extends('layouts.login')

@section('content')

<div class="post_container">
  {!! Form::open(['url' =>'posts/index']) !!}
  <div class="top form_top">
    <div class="post_icon">
      <img src="images/{{Auth::user()->images}}">
    </div>
    {!! Form::input('textarea','newPost',null,['required','placeholder' => '投稿内容を入力してください。','class' => 'form-control']) !!}
     <button type="submit" class="btn send_button" onclick="submit();">
       <img src="images/post.png" alt="投稿">
     </button>
    @if (count($errors) > 0)
        <div class="post_error">
                @foreach ($errors->all() as $error )
                    <p>{{ $error }}</p>
                @endforeach
        </div>
        @endif


  </div>

  <ul class="post_items">
    @foreach($posts as $post)
    <li class="post_item">
      <div class="post_icon">
         <img src="images/{{$post->user->images}}">
      </div>
      <div class="post_content">
        <div class="post_head">
          <p class="post_username">{{ $post->user->username }}</p>
          <p class="post_date">{{ $post->updated_at}}</p>
        </div>
        <p class="post_text">{{ $post->post }}</p>
            @if($user_id == $post->user_id)
            <div class="post_buttons">
              <div class="update_button">
                <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">
                <img src="images/edit.png" alt="更新">
              </a>
            </div>
              <div class="delete_button">
                <a href="posts/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？') ? document.delete_form.submit() : false;">
                  <img src="images/trash.png" alt="削除">

                </a>
              </div>
            </div>
      </div>
        @endif
    </li>
    @endforeach

  {!! Form::close()!!}
</ul>
  <!-- モーダル中身 -->

   {!! Form::open(['url' => 'posts/update']) !!}
  <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
                {!! Form::textarea('model_post',null,['class' => 'modal_post']) !!}
                {!! Form::hidden('modal_id',null,['class' => 'modal_id']) !!}
                <label for="">
                  <button type="submit" ><img src="images/edit.png" alt="更新"></button>

                </label>


                {{ csrf_field() }}
        </div>
    </div>

{!! Form::close()!!}
</div>


@endsection
