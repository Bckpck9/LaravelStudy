<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    public function run(): void
    {
        $posts = Post::orderBy('id')->get();
        $tagIds = Tag::orderBy('id')->pluck('id')->all();

        if ($posts->isEmpty() || empty($tagIds)) {
            return;
        }

        foreach ($posts as $index => $post) {
            // Подбираем первый тег для поста
            $tags = [
                $tagIds[$index % count($tagIds)]
            ];

            // Каждому второму посту добавляем ещё один тег
            if ($index % 2 === 0 && count($tagIds) > 1) {
                $tags[] = $tagIds[($index + 1) % count($tagIds)];
            }

            // Добавляем связи, не удаляя существующие
            $post->tags()->syncWithoutDetaching($tags);
        }
    }
}