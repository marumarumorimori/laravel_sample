@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" action="{{route('update', $post->id)}}">
  @csrf
    <div>
        <p>タイトル</p>
        <input type="text" name="name" value="{{ $post->name }}">
    </div>

    <div>
        <p>内容</p>
        <input type="textarea" name="contents" value="{{ $post->contents }}">
    </div>

    <input type="submit" value="投稿する">
</form>
</div>
@endsection
