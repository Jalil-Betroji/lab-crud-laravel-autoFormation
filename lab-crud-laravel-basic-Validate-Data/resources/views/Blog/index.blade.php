@extends('base')
@section('title' , 'hompage')
@section('content')
<h1>My Blog</h1> 
<!-- @dump($post) -->
@foreach($post as $posts)
<article>
<h2>{{$posts->title}}</h2>
<p>
{{$posts->content}}
</p>
<p>
    <a href="{{route('blog.show',['slug' => $posts->slug , 'id' => $posts->id])}}" class="btn btn-primary">More details</a>
</p>
</article>
@endforeach
{{$post->links()}}

@endsection