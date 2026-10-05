<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Services\PostService;


class StoreController extends Controller{

    public function __construct(private PostService $postService)
    {}

    public function __invoke(PostStoreRequest $request)
    {
        $this->authorize('create');
        $data = $request->validated();
        $this->postService->store($data);

        return redirect()->route('post.index');
    }
}
