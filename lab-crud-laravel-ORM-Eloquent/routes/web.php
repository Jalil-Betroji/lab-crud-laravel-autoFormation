<?php

// use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
// use App\Models\Post;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/' , function(){
    return view('welcome');
});
Route::prefix('blog')->group(function(){
        Route::get('' , function(Request $request){

            // $post = new \App\Models\Post;       
            // $post->title = 'my first article';  
            // $post->slug = 'my-first-article';   
            // $post->content = "My Content";      
            // $post->save();                      
            // return $post;                       
            // return \App\Models\Post::all();
            // return \App\Models\Post::all('id','title');
            //  $post = \App\Models\Post::all('id','title');
            //  dd($post);
            //  dd($post[0]->title);
            // $post = \App\Models\Post::find(1);
            // $post = \App\Models\Post::findOrFail(41);
            // $post = \App\Models\Post::paginate(2);
            // $post = \App\Models\Post::where("id" ,'>' , 0)->first();
            // $post = \App\Models\Post::where("id" ,'>' , 0)->get();
            // $post = \App\Models\Post::where("id" ,'>' , 0)->limit(1)->get();
            // $post = \App\Models\Post::create([
            //     'title' => 'new article test',
            //     'slug' => 'new-article-test',
            //     'content' => 'new content'
            // ]);
            // dd($post);
            // $post = \App\Models\Post::find(1);
            // $post->delete();
            // $post = \App\Models\Post::where('id', '>',1)->update([
            //     'title' => 'updated article test',
            //     'content' => 'updated content'
            // ]);
            //  return $post;

            $post = \App\Models\Post::paginate(2);
            return $post;
        })->name("index");
        Route::get('/{slug}/{id}' , function(string $slug , string $id , Request $request){
           $post = \App\Models\Post::findOrFail($id);
           if($post->slug !== $slug){
            return to_route('blog.show' , ['slug' => $post->slug ,'id' => $post->id]);
           }
           return $post;
        })->name('blog.show');
});