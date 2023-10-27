# About this Chapter

In this chapter, we'll explore the art of communicating with a database using Laravel and its ORM, Eloquent.<br>
ORM stands for Object Relational Mapping, which refers to classes enabling us to interact with database data and represent them as objects.<br>
As you'll soon discover, once you grasp the underlying principle, using it is remarkably straightforward<br>

## Migration

In our case, we want to be able to interact with our database to create an article system. We'll have to start by creating the table and the different fields needed and we won't necessarily need to use SQL. The Laravel migration system can be used.<br> 
### ***To do this, we're going to go to the terminal and we're going to type the command:***
```
php artisan make:migration CreatePostTable
```
- ***You can change `CreatePostTable` with the name of your table***

This will create a migration file in the folder. database/migration which will make it possible to add information to our database.<br> 
The migration file will contain two methods, one method up which explains how to generate the tables<br> 
And the fields and a method down which will make it possible to go back.<br>

``` , php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
```

This migration system makes it possible to interact with the creation of the tables with a PHP API rather than having to write SQL.<br> 
This adapts regardless of the database management system you use.<br>

Once we're satisfied, we're going to be able to start our migration.<br>
To do this, again, it will be necessary to go to the terminal and the command will be typed.<br>
```,php
php artisan migrate
```

If we then look at the content of this database, we'll see that there are our different tables, and we have the table. post swhich will contain the fields which have been requested.
<p>So that's it to create tables but that's not enough for us, we would like to be able to retrieve or save information .</p>
