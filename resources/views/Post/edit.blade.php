<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Редактирование поста</title>
</head>
<body>

    <h1>Редактирование поста</h1>

    <form action="{{ route('post.update', $post) }}" method="POST">

        @csrf
        @method('PUT')

        <div>
            <label for="title">Заголовок:</label>

            <input
                type="text"
                id="title"
                name="title"
                value="{{ $post->title }}"
            >
        </div>

        <br>

        <div>
            <label for="content">Содержание:</label>

            <textarea
                id="content"
                name="content"
                rows="10"
                cols="50"
            >{{ $post->content }}</textarea>
        </div>

        <br>

        <div>
            <label for="image">Изображение:</label>

            <input
                type="text"
                id="image"
                name="image"
                value="{{ $post->image }}"
            >
        </div>

        <br>

        <div>
            <label for="likes">Лайки:</label>

            <input
                type="number"
                id="likes"
                name="likes"
                value="{{ $post->likes }}"
            >
        </div>

        <br>

        <button type="submit">
            Сохранить изменения
        </button>

    </form>

    <br>

    <a href="{{ route('post.show', $post) }}">
        Отмена
    </a>

</body>
</html>
