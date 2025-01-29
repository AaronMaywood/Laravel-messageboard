<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メッセージボード</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        .session {
            max-width: 600px;
            border-radius: 3px;
            border: 1px solid green;
            margin: 0 auto;
            padding: 0.5em;
            background: lightgoldenrodyellow;
        }
        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"],
        textarea {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .message {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 15px;
            border-left: 5px solid #007bff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .message p {
            margin: 10px 0;
        }
        .message h3 {
            margin: 0;
            color: #007bff;
        }
        .message .meta {
            font-size: 12px;
            color: #666;
        }
        .pagination {
            display: flex;
            padding-left: 0;
            list-style: none;
            justify-content: center;
        }

        .page-item:first-child .page-link {
            border-top-left-radius: .25rem;
            border-bottom-left-radius: .25rem;
        }
        .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }
        .page-link {
            padding: .375rem .75rem;
        }
        .page-link {
            position: relative;
            display: block;
            color: #0d6efd;
            text-decoration: none;
            background-color: #fff;
            border: 1px solid #dee2e6;
            transition: color .15s ease-in-out,background-color .15s ease-in-out,border-color .15s ease-in-out,box-shadow .15s ease-in-out;
        }
        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .page-item:not(:first-child) .page-link {
            margin-left: -1px;
        }
    </style>
</head>
<body>

@if (session('message'))
    <p class="session">{{ session('message') }}</p>
@endif

<h1>メッセージボード</h1>

<form method="post" action="./">
    @csrf
    <label>
        名前：<input type="text" name="name" id="name" required>
        <x-input-error :messages="$errors->get('name')" />
    </label><br>
    <label for="description">
        投稿：<textarea name="description" id="description" required cols="40" rows="5"></textarea>
        <x-input-error :messages="$errors->get('description')" />
    </label><br>
    <input type="submit" value="投稿する">
</form>
    @foreach ($messages as $message)
        <div class="message">
            <h3>メッセージID: {{$message->id}}</h3>
            <p>{!! nl2br(e($message->description)) !!}</p>
            <p class="meta">by {{$message->name}} on {{$message->created_at}}</p>
        </div>
    @endforeach
    {{ $messages->appends(request()->input())->links() }}
</body>
</html>