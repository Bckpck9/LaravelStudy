<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostUpdateRequest;
use App\Services\PostService;


class UpdateController extends Controller{

    public function __construct(private PostService $postService)
    {}

    public function __invoke(PostUpdateRequest $request, Post $post)
    {
        $data = $request -> validated();

        $this->postService->update($post, $data);

        return redirect()->route('post.index');
    }
}
