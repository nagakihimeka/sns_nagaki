@extends('layouts.login')

@section('content')

<!-- 20230208-下記を入れるとサイドバーがずれることを発見 -->
<div class="post_container">
  {!! Form::open(['url' =>'posts/index']) !!}
  <div class="top form_top">
    <div class="post_icon">
      <img src="images/{{Auth::user()->images}}">
    </div>
    {!! Form::input('textarea','newPost',null,['required','placeholder' => '投稿内容を入力してください。','class' => 'form-control']) !!}
     <button type="submit" class="btn send_button" onclick="submit();">
       <i class="fas fa-paper-plane" style="color: #0d56d3;"></i>
     </button>

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
                  <i class="fas fa-edit" style="color: #5dd2c8;"></i>
              </a>
            </div>
              <div class="delete_button">
                <a href="posts/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？') ? document.delete_form.submit() : false;">
                  <i class="fas fa-trash-alt" style="color: #ed3833;"></i>
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
    @if (count($errors) > 0)
    <div>
        <ul>
            @foreach ($errors->all() as $error )
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
   {!! Form::open(['url' => 'posts/update']) !!}
  <div class="modal js-modal">
        <div class="modal__bg js-modal-close"></div>
        <div class="modal__content">
                {!! Form::textarea('model_post',null,['class' => 'modal_post']) !!}
                {!! Form::hidden('modal_id',null,['class' => 'modal_id']) !!}
                <button type="submit" >更新</button>
                {{ csrf_field() }}
           <a class="js-modal-close" href="">閉じる</a>
        </div>
    </div>

{!! Form::close()!!}
</div>


@endsection
