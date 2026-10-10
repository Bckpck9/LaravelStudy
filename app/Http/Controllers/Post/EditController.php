<?php

namespace App\Http\Controllers\Post;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostStoreRequest;
use App\Services\PostService;


class EditController extends Controller{

    public function __construct(private PostService $postService)
    {}

    public function __invoke(Post $post)
    {
        $this->authorize('update',$post);
        return view('post.edit', compact('post')); //Edit в API вообще нет
        
    }
}
