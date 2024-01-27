@extends('layouts.wrapper')

@section('title') Edit @endsection

@section('content')
    <div class="row mt-5">
        <form method="post"
              action="{{route('people.update', $person->id)}}"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-form-people :person="$person"
                           :homeworlds="$homeworlds"
                           :genders="$genders"
                           :films="$films"
                           :films_id="$films_id"/>

            @if(!$person->images->isEmpty())
                <h3 class="fs-2">mark the images to delete:</h3>
                <div class="row">
                    @foreach($person->images as $image)
                        <div class="col">
                            <input class="form-check-input"
                                   name="del-images[]"
                                   type="checkbox"
                                   value="{{$image->name}}">
                            <img class="img-fluid" src="{{asset("/storage/images/$image->name")}}">
                        </div>
                    @endforeach
                </div>
            @endif

            <button class="btn btn-primary" type="submit">submit</button>
        </form>
    </div>
@endsection
