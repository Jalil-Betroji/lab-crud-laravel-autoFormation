# About this Chapter

In this new chapter where we're going to discover together the principle of controllers in Laravel. These are simply classes that aim to group together the functions that will contain the logic of our application.

## Controller Creation :

At Laravel level, I can create a controller using the command.

```bash
php artisan make:controller Post
```

-   **_You can change `Post` with the name of your Controller_**
-   This command will create a new file in the folder. Http/controllers with indoor a class that extends from the class Controller of our application. It's within this class that we're going to define our methods.

```php
<?php
namespace App\Http\Controllers;
use App\Models\Post;
class PostController extends Controller
{
    public function index(){
        return \App\Models\Post::paginate(3);
    }
}
```

## take access to Controller using routes :

-   so after creating the controller Then we can use it action (functions) in our routing.

```php
Route::get('/', [PostController::class, 'index'])->name('index');
```

-   this code mean that when we go to url blog we call the Post class in the Post Controller and run the action `index` (function `index`).
    > **Note that we need to call the PostController Controller in our route direction by writing this code :**

```php
use App\Http\Controllers\PostController;
```

-   `->name('index')`: This method is used to assign a name to the route. Naming routes is optional but can be helpful, especially in larger applications, to refer to routes by a specific name instead of the URL path. In this case, the route is named 'index'.

## get data from url and pass it to the controller

```php
  public function show(string $slug , string $id): RedirectResponse | Post{
        $post = \App\Models\Post::findOrFail($id);
        if($post->slug !== $slug){
        return to_route('blog.show' , ['slug' => $post->slug , 'id' => $post->id]);
        }
        return $post;
    }
```
- `RedirectResponse`: It represents a redirection response. In Laravel, when you want to redirect users to a different URL, you return a RedirectResponse instance. It indicates that the method can return a redirect response in certain conditions.

- `Post`: It likely represents an instance of the Post model in Laravel, indicating that the method can return a Post object if certain conditions are met.
- `Using RedirectResponse | Post` as the return type means that the show method can either return a RedirectResponse (if redirection is necessary) or a Post instance (if the conditions for returning the post are met).

1. Parameters:

string $slug, string $id: These parameters are received from the route. $slug represents the unique identifier of the post in the URL, and $id represents the post's database ID.
2. Post Retrieval:

$post = \App\Models\Post::findOrFail($id);: This line retrieves a post from the database based on the provided $id. If no post is found with the given ID, Laravel's findOrFail() method throws a ModelNotFoundException.

3. Slug Check and Redirection:

if `($post->slug !== $slug) { ... }`: This condition checks if the retrieved post's slug matches the provided $slug parameter. If they don't match, it indicates that the URL is incorrect or outdated.
`return redirect()->route('blog.show', ['slug' => $post->slug, 'id' => $post->id]);`: If the slugs do not match, the method redirects the user to the correct URL using Laravel's `redirect()` function. It uses the `to_route()` function (which is likely a custom function) to generate the correct route URL based on the correct slug and ID. This ensures that users are redirected to the appropriate page.

4. Return Statement:

`return $post;`: If the slugs match, meaning the URL is correct, the method returns the retrieved post.