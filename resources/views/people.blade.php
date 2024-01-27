@extends('layouts.wrapper')

@section('title') Home Page @endsection

@section('content')
    <h1 class="text-center">People</h1>

    @include('people-table')
@endsection
