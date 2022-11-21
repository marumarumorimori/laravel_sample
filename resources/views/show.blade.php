@extends('layouts.app')

@section('content')
<div class="container">
    <p>詳細</p>

    <ul>
        <li>{{$post->id}}</li>
        <li>{{$post->name}}</li>
        <li>{{$post->contents}}</li>
    </ul>

    <p>コメント</p>

    <ul>
        <?php foreach($post->comment as $comment): ?>
        <li>{{ $comment->name }}</li>
        <li>{{ $comment->contents }}</li>
        <?php endforeach; ?>
    </ul>

    <form method="POST" action="{{route('comment',['id'=>$post->id])}}">
        @csrf
        <p>名前<input type="text" name="name" value="{{ old('name') }}"></p>
        <p>内容<input type="text" name="contents" value="{{ old('contents') }}"></p>

        <input type="submit" value="コメントする">
    </form>



    @if(Auth::user()->id == $post->user_id)
    <div class="editlayout">
    <a href="{{route('edit',['id'=>$post->id])}}" class="edit">{{ __('編集') }}</a>
    </div>

    <form method="POST" action="{{route('destroy',['id'=>$post->id])}}" class="delete">
        @csrf
        <button type="submit" class="deletebtn">削除</button>
    </form>
@endif

</div>
@endsection