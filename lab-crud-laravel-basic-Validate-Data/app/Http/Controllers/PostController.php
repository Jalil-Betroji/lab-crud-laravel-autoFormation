<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index():view{
    $validator = validator::make([
        'title'=>'laravel validation data',
        'content' =>'my laravel autoforamtion content'
    ],[
        'title' => 'required|max:23'
    ]);
    dd($validator->validated());
        return view('blog.index',[
            'post'=>\App\Models\Post::paginate(1)
        ]);
    }
    public function show(string $slug , string $id): RedirectResponse | view{
        $post = Post::findOrFail($id);
        if($post->slug !== $slug){
        return to_route('blog.show' , ['slug' => $post->slug , 'id' => $post->id]);
        }
        return view('Blog.show', ['post'=>$post]);
    }
}
