@extends('layouts.app')

@section('content')
<div class="container">
<ul>
    @foreach ($posts as $post)

        <p style="font-size:2rem;">{{ $post->user_name }}</p>
        <li><a href="{{ route('show', [ 'id' => $post->post_id]) }}"> {{ $post->post_name }}</a></li>
        <li> {{ $post->post_contents }}</li>

    @endforeach
    </ul>
</div>
@endsection
