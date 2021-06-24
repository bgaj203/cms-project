@extends('layouts.app')



@section('content')
    <h1>Posts</h1>
    <ul>
        @foreach($posts as $post)
            <li><a href="{{route('posts.show', $post->id)}}"><h1>{{$post->title}}</h1></a></li>
            <p>{{$post->content}}</p> <br>

        @endforeach    
    </ul>


@endsection


@section('footer')

@endsection