<?php

namespace App\Http\Controllers\Post;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFilterRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Services\PostService;
use Illuminate\Http\Request;



class IndexController extends Controller
{

    public function __construct(private PostService $postService)
    {}

    public function __invoke(PostFilterRequest $request)
    {
        //$category = Category::find(1);
    
        $data = $request->validated();
        
        $posts = $this->postService->index($data);
        return view('post.index', compact('posts'));

    }
}
