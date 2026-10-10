<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Post\PostResource;
use App\Models\Post;
use App\Services\PostService;
use Illuminate\Http\Request;


class DeleteController extends Controller
{

    public function __construct(private PostService $postService)
    {}

    public function __invoke(Request $request, Post $post)
    {
        $this->authorize('delete',$post);
        $post = $this->postService->delete($post);
        return response() ->json([
            'message' => 'Post deleted successfully',
        ]);
        
    }
}
