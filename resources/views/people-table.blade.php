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
        @foreach($people as $person)
            <tr>
                <th scope="row"> {{$person->id}} </th>
                <td><a href="{{route('people.show', $person->id)}}">{{$person->name}}</a></td>
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
        @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="col-12">{{$people->links()}}</div>
    </div>

</div>
