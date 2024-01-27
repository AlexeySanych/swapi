@extends('layouts.wrapper')

@section('title')Homeland Search @endsection

@section('content')
    <h1 class="text-center">Homeland Search</h1>

    <form method="post"
          action="{{route('homeland.search')}}"
          enctype="multipart/form-data" class="mb-5">
    @csrf
        <label class="form-label" for="homeworlds">select homeworlds</label>
        <select class="form-select mb-2"
                size="6"
                name="homeworld_id"
                id="homeworlds"
                required>
            @foreach($homeworlds as $k => $v)
                <option value="{{$k}}">{{$v}}</option>
            @endforeach
        </select>
        <button class="btn btn-primary" type="submit">submit</button>
    </form>

@if(isset($people))
    <h2>People from {{$homeworld}}</h2>
    @include('people-table')
@endif

@endsection
