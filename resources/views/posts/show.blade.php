@extends('layouts.app')



@section('content')
    <h1>{{$posts->title}}</h1>
    <p>{{$posts->content}}</p>
    <li><a href="{{route('posts.edit', $posts->id)}}">Edit Post</a></li>
    <li><a href="{{route('posts.index')}}">back to posts</a></li>
@endsection


@section('footer')

@endsection