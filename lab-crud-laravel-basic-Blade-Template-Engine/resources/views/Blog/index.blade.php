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
</article>
@endforeach
{{$post->links()}}

@endsection