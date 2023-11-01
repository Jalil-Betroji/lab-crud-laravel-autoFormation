<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;

class PostController extends Controller
{
    public function index(){
        return \App\Models\Post::paginate(3);
    }
    public function show(string $slug , string $id): RedirectResponse | Post{
        $post = \App\Models\Post::findOrFail($id);
        if($post->slug !== $slug){
        return to_route('blog.show' , ['slug' => $post->slug , 'id' => $post->id]);
        }
        return $post;
    }
}