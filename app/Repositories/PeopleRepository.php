<?php

namespace App\Repositories;

use App\Http\Requests\SavePeopleRequest;
use App\Models\Film;
use App\Models\Gender;
use App\Models\Homeworld;
use App\Models\People;
use App\Contracts\RepositoryInterface;
use App\Services\ImagesStore;
use Illuminate\Support\Facades\DB;

class PeopleRepository implements RepositoryInterface
{
    public function get_all()
    {
        return People::all();
    }

    public function get_create()
    {
        return [
            'homeworlds' => Homeworld::pluck('name', 'id')->all(),
            'genders' => Gender::pluck('gender', 'id')->all(),
            'films' => Film::pluck('title', 'id')->all(),
            ];
    }

    public function store($request)
    {
        try {
            DB::beginTransaction();

            $form_data = $request->safe()->except(['images']);
            $person = People::create($form_data);
            $person->films()->attach($form_data['films']);
            if ($images = $request->file('images'))
            {
                ImagesStore::addImages($person, $images);
            }

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function get_edit($id)
    {
        $person = People::with('films', 'images')->findOrFail($id);
        $films_id = [];
        foreach ($person->films as $film)
        {
            $films_id[] = $film->id;
        }

        return [
            'homeworlds' => Homeworld::pluck('name', 'id')->all(),
            'genders' => Gender::pluck('gender', 'id')->all(),
            'films' => Film::pluck('title', 'id')->all(),
            'person' => $person,
            'films_id' => $films_id];
    }

    public function find_person($id)
    {
        return People::findOrFail($id);
    }

    public function update($request, $id)
    {
        try {
            DB::beginTransaction();
            $form_data = $request->safe()->except(['films.*']);
            $person = People::findOrFail($id);
            $person->films()->sync($form_data['films']);
            $person->update($form_data);
            if ($images = $request->file('images'))
            {
                ImagesStore::addImages($person, $images);
            }
            if (isset($form_data['del-images']))
            {
                ImagesStore::delImages($person, $form_data['del-images']);
            }
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }

    public function destroy($id)
    {
        try {
            DB::beginTransaction();
            $person = People::with('images')->findOrFail($id);
            $images = [];
            foreach ($person->images as $image) {
                $images[] = $image->name;
            }
            ImagesStore::delImages($person, $images);
            $person->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
        }
    }
}
