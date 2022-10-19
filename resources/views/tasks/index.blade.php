<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>task index</title>
</head>

<body>
    <h1>タスク一覧</h1>
    <ul>
        @foreach ($tasks as $task)
        <!-- // リンク先をidで取得し名前で出力 -->
        <li class="li-style"><a class="button-group" href="/tasks/{{ $task->id }}">{{ $task->title }}<form action="/tasks/{{ $task->id }}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除する" onclick="if(!confirm('削除しますか？')){return false};">
                </form></a></li>
        @endforeach
    </ul>
    <hr>
    <h1>新規論文投稿</h1>
    @if ($errors->any())
    <div class="error">
        <p>
            <b>{{ count($errors) }}件のエラーがあります。</b>
        </p>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form action="/tasks" method="post">
        @csrf
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" name="title">
        </p>
        <p>
            <label for="body">内容</label><br>
            <textarea name="body" class="body"></textarea>
        </p>
        <input type="submit" value="Create Task">
    </form>
</body>

</html>
