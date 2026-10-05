<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>{{ $post->title }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f5f5;
            margin: 0;
            padding: 40px;
        }

        .post {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            padding: 30px;
            border-radius: 10px;
        }

        .post h1 {
            margin-top: 0;
            margin-bottom: 15px;
        }

        .post-image {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            border-radius: 8px;
            margin: 20px 0;
        }

        .meta {
            color: #666;
            margin-bottom: 20px;
        }

        .content {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .tags {
            margin: 20px 0;
        }

        .tag {
            display: inline-block;
            background: #eee;
            padding: 5px 10px;
            border-radius: 5px;
            margin-right: 5px;
        }

        .actions {
            margin-top: 30px;
        }

        .button {
            display: inline-block;
            padding: 10px 18px;
            background: #2563eb;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background: #1d4ed8;
        }
    </style>
</head>

<body>

<div class="post">

    <h1>{{ $post->title }}</h1>

    <div class="meta">
        Автор:
        {{ $post->user->name }}

        @if($post->category)
            | Категория: {{ $post->category->title }}
        @endif

        | Лайки: {{ $post->likes }}

        | Создан:
        {{ $post->created_at->format('d.m.Y H:i') }}
    </div>

    @if($post->image)
        <img
            class="post-image"
            src="{{ $post->image }}"
            alt="{{ $post->title }}"
        >
    @endif

    <div class="content">
        {{ $post->content }}
    </div>

    @if($post->tags->isNotEmpty())
        <div class="tags">
            <strong>Теги:</strong>

            @foreach($post->tags as $tag)
                <span class="tag">
                    {{ $tag->title }}
                </span>
            @endforeach
        </div>
    @endif

    <div class="actions">
        <a
            href="{{ route('post.edit', $post) }}"
            class="button"
        >
            Редактировать
        </a>
    </div>

</div>

</body>
</html>
