<?php

namespace App\Http\Controllers;

use App\Http\Requests\SavePeopleRequest;
use App\Contracts\RepositoryInterface;
use App\Utils\PaginateCollection;

class ResourceController extends Controller
{

    private $people_repository;

    public function __construct(RepositoryInterface $people_repository)
    {
        $this->people_repository = $people_repository;
    }

    public function index()
    {
        $people = $this->people_repository->get_all()->reverse();
        $people = PaginateCollection::paginate($people, 10);
        return view('people', compact('people'));
    }

    public function create()
    {
        return view('create', $this->people_repository->get_create());
    }

    public function store(SavePeopleRequest $request)
    {
        $this->people_repository->store($request);
        return redirect()->route('people.index');
    }

    public function show(string $id)
    {
        $person = $this->people_repository->find_person($id);
        return view('show', compact('person'));
    }

    public function edit(string $id)
    {
        return view('edit', $this->people_repository->get_edit($id));
    }

    public function update(SavePeopleRequest $request, string $id)
    {
        $this->people_repository->update($request, $id);
        return redirect()->route('people.show', $id);
    }

    public function destroy(string $id)
    {
        $this->people_repository->destroy($id);
        return redirect()->route('people.index');
    }
}
