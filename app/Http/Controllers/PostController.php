<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        
    }

    public function store(){

    }
    
    public function firstOrCreate(){
        $post = Post::find(1);

        Post::firstOrCreate([
            'image' => 'image 66'
        ],[
            'title' => "title 1",
            'image' => 'image 66',
            'likes' => 6666,
            'is_published' => true
        ]);
        dd('created');
    }
}
