<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>List</h1>
    <table border="1">
        <tr>
            <th>id</th>
            <th>title</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->id }}</td>
            <td><a href="{{ route('post.show', $post->id) }}">{{ $post->title }}</a></td>
        </tr>
        @endforeach

    </table>
</body>
</html>