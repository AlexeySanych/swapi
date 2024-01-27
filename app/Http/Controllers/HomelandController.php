<?php

namespace App\Http\Controllers;

use App\Models\Homeworld;
use App\Models\People;
use Illuminate\Http\Request;

class HomelandController extends Controller
{
    public function search()
    {
        $homeworlds = Homeworld::pluck('name', 'id')->all();
        return view('homeland', compact('homeworlds'));
    }

    public function result(Request $request)
    {
        $homeworld_id = $request->input("homeworld_id");
        $homeworlds = Homeworld::pluck('name', 'id')->all();
        $homeworld = $homeworlds[$homeworld_id];
        $people = People::where('homeworld_id', $homeworld_id)->paginate(10);
        return view('homeland', compact('people', 'homeworld', 'homeworlds'));
    }
}
