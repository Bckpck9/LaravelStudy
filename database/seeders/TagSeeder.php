<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = ['PHP', 'Laravel', 'Docker', 'API'];

        foreach ($tags as $title) {
            Tag::firstOrCreate([
                'title' => $title,
            ]);
        }
    }
}