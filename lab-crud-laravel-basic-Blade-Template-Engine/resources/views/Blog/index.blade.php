@extends('base')
@section('title' , 'hompage')
@section('content')
<h1>My Blog</h1> 
@dump('learn_laravel')
<!-- {{'text'}} <?='text' ?> -->
    @if(false)
    {{'text'}}
    @else(true)
    {{'conditions_syntax'}}
    @endif
    @endsection