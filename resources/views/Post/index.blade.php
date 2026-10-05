<!DOCTYPE html>
<html>
<head>
    <title>Posts</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

    <h1>Posts</h1>

    <form action="{{ route('post.store') }}" method="POST">
        @csrf

        <div>
            <label>Title:</label>
            <input type="text" name="title">
        </div>

        <div>
            <label>Image:</label>
            <input type="text" name="image">
        </div>

        <div>
            <label>Likes:</label>
            <input type="number" name="likes" value="0" min="0">
        </div>

        <button type="submit">Create</button>
    </form>

    <hr>

    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->title }}</h2>
            <a href="{{route ('post.show',$post)}}">Посмотреть</a>
        </div>
    @endforeach

    <div>
        {{ $posts->withQueryString()->links() }}
    </div>

</body>
</html>