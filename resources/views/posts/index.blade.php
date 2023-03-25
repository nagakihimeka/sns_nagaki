@extends('layouts.login')

@section('content')

<!-- 20230208-下記を入れるとサイドバーがずれることを発見 -->
<div class="container">
  {!! Form::open(['url' =>'posts/index']) !!}
  <div class="form-group">
    {!! Form::input('text','newPost',null,['required','placeholder' => '投稿内容を入力してください。','class' => 'form-control']) !!}

  </div>

  <button type="submit" class="btn pull-right">投稿</button>
  <ul class="post-items">
    @foreach($posts as $post)
    <li class="post-item">
      <div class="post-icon">
         <img src="images/{{$post->user->images}}">
        <img src="images/icon2.png" alt="">
        <img src="{{ asset('image/' . $post->user->images) }}" >
      </div>
      <div>
        <div class="post-head">
          <p>名前：{{ $post->user->username }}</p>
          <p>日付</p>
        </div>
        <p>投稿内容：{{ $post->post }}</p>
        @if($user_id == $post->user_id)
        <div class="post-buttons">
          <div class="update-button"><a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">編集</a></div>
          <div class="delete-button"><a href="posts/{{$post->id}}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？') ? document.delete_form.submit() : false;">削除</a></div>
        </div>
        @endif
      </div>
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
