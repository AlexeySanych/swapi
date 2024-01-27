@extends('layouts.wrapper')

@section('title') Home @endsection

@section('content')
    <h1 class="text-center" >Star Wars data</h1>

    <ul style="margin: 40px 0; font-size: 25px; text-align: center">
        <li><a href="{{route('people.index')}}">people</a></li>
        <li><a href="{{route('people.create')}}">people create</a></li>
        <li><a href="{{route('homeland.search')}}">homeland search</a></li>
    </ul>
@endsection
