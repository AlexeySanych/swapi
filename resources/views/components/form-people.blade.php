@props([
    'person' => null,
    'homeworlds',
    'genders',
    'films',
    'films_id' => null
])

    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="name">name</label>
            <input class="form-control @error('name') is-invalid @enderror"
                   name="name" type="text"
                   id="name"
                   required
                   @if($person)
                        value="{{$person->name}}"
                   @endif >
            @error('name')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="hair_color">hair color</label>
            <input class="form-control @error('hair_color') is-invalid @enderror"
                   name="hair_color"
                   type="text"
                   id="hair_color"
                   required
                   @if($person)
                        value="{{$person->hair_color}}"
                   @endif>
            @error('hair_color')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="height">height</label>
            <input name="height" type="text" class="form-control  @error('height') is-invalid @enderror" id="height" required
                   @if($person) value="{{$person->height}}" @endif>
            @error('height')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="mass">mass</label>
            <input class="form-control  @error('mass') is-invalid @enderror"
                   name="mass"
                   type="text"
                   id="mass"
                   required
                   @if($person)
                        value="{{$person->mass}}"
                   @endif>
            @error('mass')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="col">
            <label class="form-label" for="birth_year">birth year</label>
            <input class="form-control  @error('birth_year') is-invalid @enderror"
                   name="birth_year"
                   type="text"
                   id="birth_year"
                   required
                   @if($person)
                        value="{{$person->birth_year}}"
                   @endif>
            @error('birth_year')
                <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="homeworlds">select homeworlds</label>
            <select class="form-select  @error('homeworld_id') is-invalid @enderror"
                    size="6"
                    name="homeworld_id"
                    id="homeworlds"
                    required>
                @foreach($homeworlds as $homeworld_id => $homeworld)
                    @if($person && $person->homeworld_id == $homeworld_id)
                        <option value="{{$homeworld_id}}" selected>{{$homeworld}}</option>
                    @else
                        <option value="{{$homeworld_id}}">{{$homeworld}}</option>
                    @endif
                @endforeach
            </select>
            @error('homeworld_id')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col">
            <label class="form-label" for="gender">select gender</label>
            <select class="form-select @error('gender_id') is-invalid @enderror"
                    size="6"
                    name="gender_id"
                    id="gender"
                    required>
                @foreach($genders as $gender_id => $gender)
                    @if($person && $person->gender_id == $gender_id)
                        <option value="{{$gender_id}}" selected>{{$gender}}</option>
                    @else
                        <option value="{{$gender_id}}">{{$gender}}</option>
                    @endif
                @endforeach
            </select>
            @error('gender_id')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

        <div class="col">
            <label class="form-label" for="films">select films</label>
            <select class="form-select @error('films') is-invalid @enderror"
                    size="6"
                    name="films[]"
                    id="films"
                    multiple
                    required>
                @foreach($films as $film_id => $film)
                    @if($person && in_array($film_id, $films_id))
                        <option value="{{$film_id}}" selected>{{$film}}</option>
                    @else
                        <option value="{{$film_id}}">{{$film}}</option>
                    @endif
                @endforeach
            </select>
            @error('films')
            <p class="alert alert-danger">{{ $message }}</p>
            @enderror
        </div>

    </div>
    <div class="row mb-3">
        <div class="col">
            <label class="form-label" for="formFileMultiple">Add images</label>
            <input class="form-control" name="images[]" type="file" id="formFileMultiple" multiple>
        </div>
    </div>
