<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
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
        
        return DB::transaction(function () use ($data){

            $data['user_id'] = auth()->id();
            
            $tags = $data['tags'] ?? [];

            unset($data['tags']);
        
            $post = Post::create($data);

            $post->tags()->attach($tags);

            return $post;

        });
    }

    public function update(Post $post, array $data){
        
        DB::beginTransaction();
        try {

            $tags = $data['tags'] ?? null;

            unset($data['tags']);

            $post->update($data);

            if($tags !== null){
                $post->$tags->sync($tags);
            }

            DB::commit();

            return $post;

        } catch(\Throwable $e){
            DB::rollback();

            throw $e;
        }

    }

    public function delete($post){
        $post->delete();
    }
}
