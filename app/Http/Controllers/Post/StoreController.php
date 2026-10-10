<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Http\Resources\Post\PostResource;
use App\Services\PostService;


class StoreController extends Controller{

    public function __construct(private PostService $postService)
    {}

    public function __invoke(PostStoreRequest $request)
    {
        $this->authorize('create',Post::class);
        $data = $request->validated();
        $post = $this->postService->store($data);

        return new PostResource($post);
    }
}
