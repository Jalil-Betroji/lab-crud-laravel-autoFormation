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

`blade.php`: The `Blade` point is crucial; it allows us to specify that we are going to use the Laravel template engine.

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
- *One thing to note is that all this part:
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