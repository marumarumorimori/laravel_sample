<h1>メンバー新規作成画面</h1>
<p><a href="{{ route('comment.index')}}">一覧画面</a></p>

<form action="{{ route('comment.store')}}" method="POST">
    @csrf
    <p>名前<input type="text" name="name" value="{{ old('name') }}"></p>
    <p>内容<input type="text" name="contents" value="{{ old('contents') }}"></p>
    <p>
        <select name="club_id">
            @foreach($posts as $post)
            <option value="{{ $post->id }}">{{ $post->name }}</option>
            @endforeach
        </select>
    </p>
    <input type="submit" value="登録する">
</form>