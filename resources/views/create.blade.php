@extends('layouts.app')

@section('content')
<div class="container">
<form method="POST" action="{{route('store')}}">
  @csrf
    <div>
        <p>タイトル</p>
        <input type="text" name="name">
    </div>

    <div>
        <p>内容</p>
        <input type="textarea" name="contents">
    </div>

    <input type="submit" value="投稿する">
</form>
</div>
@endsection
