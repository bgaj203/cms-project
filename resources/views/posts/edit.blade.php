@extends('layouts.app')



@section('content')
    <h1>Edit Post</h1>

    <form method='post' action='/posts/{{$post->id}}'>
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <input type='hidden' name='user_id' value="{{$post->user_id}}">
        <input type='text' name='title' placeholder='Enter title' value="{{$post->title}}">
        <input type='text' name='content' placeholder='Enter content' value="{{$post->content}}">
        <input type="submit" value="DELETE" method="post" action="/posts/{{$post->id}}" name="_method">

        <input type='submit' name='Update'>
    </form>


@endsection


@section('footer')

@endsection