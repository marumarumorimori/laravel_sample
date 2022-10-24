<h1>-覧画面</h1>
<p><a href="{{ route('comment.create') }}">新規追加</a></p>

@if ($message = Session::get('success'))
<p>{{ $message }}</p>
@endif

<table border="1">
    <tr>
        <th>name</th>
        <th>contents</th>
        <th>post</th>
        <th>postのid</th>
    </tr>
    @foreach ($comments as $comment)
    <tr>

        <td>{{ $comment->name }}</td>
        <td>{{ $comment->contents }}</td>
        <td>{{ $comment->post->name }}</td>
        <td>{{ $comment->post->id }}</td>
    </tr>
    @endforeach
</table>