# About this tutorial

In this chapter we're going to discover the part seen in the MVC structure. Laravel has a template engine that will allow us to generate HTML views more simply.
> we may ask ourselves why we would not simply use php , the problem is that with views written in php it is not very practical to use a template system or to include sections and all that we have to complicate our lives a little bit and that's why blade will be useful 

- The blade views will be created in files with the extension `.blade.php` and the variables can be displayed using braces.
```php
{{ $username }}
```
## Example :

- Suppose we want to display a list of our articles:
> ***By default, we might tend to create a new page in the view resources folder. For instance, we would create a new file in a `blog` folder to encompass everything related to the blog and name it `index.blade.php`.***

`blade.php`: The `Blade` point is crucial, it allows us to specify that we are going to use the Laravel template engine.

- `index.blade.php` example :

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
</head>
<body>
    <h1>My Blog</h1>
    
</body>
</html>
```
- One thing to note is that all this part:
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
</head>
<body>
```
> *this part is common to all pages. It's somewhat inconvenient to see it systematically repeated. If we create a page to view an article, we would have the same structure.*

To avoid the hassle of repeating this structure, we can create a template at the root of the view folder, naming it `base.blade.php`. This template will include the repeated HTML code and the <div> where we will add our data.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My blog</title>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
```
- `@yield('content')`: This will be used to place the data from `index.blade.php`.
> Let try To change the webpage title using `@yield()`:
```php
<title>@yield('title')</title>
```
1. `@yield('title')` => will be used to capture data that we want to insert inside it.

```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
</body>
</html>
```
2. so to do that we will go to `base.blade.php` and add `@section('title','Blog HomePage')`:

- `@section('title', 'Custom Page Title')`: This Blade directive starts a new section named `'title'` and sets its default content to 'Custom Page Title'.

> To do that we need to update our `index.blade.php`:

```php
@extends('base')
@section('title' , 'hompage')
@section('content')
    <h1>My Blog</h1>
@endsection
```

- `@extends('base')`: This line indicates that this Blade view extends the `base.blade.php` layout. It means the content of this view will be placed inside the `@yield('content')` section of the `base.blade.php` file.

- `@section('title', 'hompage')`: This line defines a section named `'title'` with the content `'homepage'`. It sets the title for this specific page. When this view is rendered, the `'title'` section in the `base.blade.php` file will be replaced with `'homepage'`.

- `@section('content')`: This line starts a new section named `'content'`. Any content you define between `@section('content')` and `@endsection` will be placed inside the `@yield('content')` section of the `base.blade.php` file.

- `<h1>My Blog</h1>`: This is the content of the `'content'` section. In this case, it's an <h1> heading displaying "My Blog". This content will replace `@yield('content')` in the `base.blade.php` file.
