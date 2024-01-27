@extends('layouts.wrapper')

@section('title') Person Page @endsection

@section('content')
    <h1 class="text-center">Person</h1>

    <div class="row">
        <table class="table table-bordered col-12 mt-5">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">height</th>
                <th scope="col">mass</th>
                <th scope="col">hair color</th>
                <th scope="col">birth year</th>
                <th scope="col">gender</th>
                <th scope="col">homeworld</th>
                <th scope="col">films</th>
                <th scope="col">created</th>
                <th scope="col">url</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th scope="row"> {{$person->id}} </th>
                <td>{{$person->name}}</td>
                <td>{{$person->height}}</td>
                <td>{{$person->mass}}</td>
                <td>{{$person->hair_color}}</td>
                <td>{{$person->birth_year}}</td>
                <td>{{$person->gender->gender}}</td>
                <td>{{$person->homeworld->name}}</td>
                <td>
                    @foreach($person->films as $film)
                    <p>{{$film->title}}</p>
                    @endforeach
                </td>
                <td>{{$person->created}}</td>
                <td>{{$person->url}}</td>
            </tr>
            </tbody>
        </table>
        @if(!$person->images->isEmpty())
            <h2>Images</h2>
        <div class="row">
            @foreach($person->images as $image)
                <div class="col">
                    <img class="img-fluid" src="{{asset("/storage/images/$image->name")}}">
                </div>
            @endforeach
        </div>
        @endif
    </div>

    <div class="row">
        <div class="p-0 col">
            <a class="btn btn-primary me-2" href="{{route('people.edit', $person->id)}}">Edit</a>
            <form class="d-inline-block" action="{{route('people.destroy', [$person->id])}}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>
@endsection
