<?php

namespace App\Services;

use App\Http\Filters\PostFilter;
use App\Models\Post;


class PostService{
    public function index($data){

        $filter = app()->make(PostFilter::class,['queryParams' => array_filter($data)]);
        $posts = Post::filter($filter)
            ->where('user_id', auth()->id());
        return $posts->paginate(4);
    }

    public function store($data){
        
        $data['user_id'] = auth()->id();
        
        $tags = $data['tags'] ?? [];

        unset($data['tags']);
    
        $post = Post::create($data);

        $post->tags()->attach($tags);
    }

    public function update(Post $post, array $data){
        $post->update($data);
    }

    public function delete($post){
        $post->delete();
    }
}
