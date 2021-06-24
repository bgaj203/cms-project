@extends('layouts.app')



@section('content')
    <h1>Create Post</h1>

    <form method='post' action='/posts'>
        {{ csrf_field() }}
        <input type='integer' name='user_id'>
        <input type='text' name='title' placeholder='Enter title'>
        <input type='text' name='content' placeholder='Enter content'>
        

        <input type='submit' name='submit'>
    
    </form>


@endsection


@section('footer')

@endsection
