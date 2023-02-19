@extends('layouts.login')

@section('content')
<div class="container">
  <div class="search-box">
    {!! Form::open(['url'=>'users/search'])!!}
    {!! Form::input('text','search',null,['placeholder'=>'ユーザー名']) !!}
    <button type="submit"></button>
    {!! Form::close() !!}
  </div>

</div>


@endsection
