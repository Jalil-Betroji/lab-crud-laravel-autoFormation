# Validate Data 

This new chapter will discover the validation part before approaching the management of the forms. It is important to ensure that the data sent to our application matches what is expected. To do this, Laravel offers us a class. `Validator` which will enable us to manage this operation.

## Data Validation in Laravel:

Suppose we want to validate data from an input named "title". To accomplish this, we'll work within the `PostController` and add a `validator` method.

```php
use Illuminate\Support\Facades\Validator;
```
1. `required|numeric` Rule :

With the `validator` method in place, let's use it within the `PostController` class, specifically inside the `index` action (function):

```php
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
        'title'=>''
    ],[
        'title' => 'required|numeric'
    ]);
    dd($validator->fails());
        return view('blog.index',[
            'post'=>\App\Models\Post::paginate(1)
        ]);
    }
}
```
- Validation Setup:

Within the `index` method, a new instance of the `validator` is created using the `Validator::make` method.

The first argument is an array of data to be validated. Here, it contains a single element, 'title', with an empty string as a placeholder.
The second argument is an array of validation rules. In this case, it specifies that the 'title' field is `required` and must be `numeric`.

- Validation Check:

The `dd($validator->fails())` statement is used to check if the validation fails. `fails()` is a method provided by the `validator` that returns `true` if validation `fails`, indicating that the provided data does not meet the specified rules. If the validation fails, the application will halt and display the validation errors.

> Here is an example of the result : 
<img src='validateR.PNG'>