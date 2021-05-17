@extends('layouts.app')



@section('content')
    <h1>Contact</h1>

    @if(count($people) > 0)
        <ul>
        @foreach ($people as $person)
            <li>{{$person}}</li>

        @endforeach
        </ul>
    @else
        <li>No people to show</li>
    @endif


@endsection


@section('footer')
    {{-- <script>alert('Hi')</script> --}}
@endsection
