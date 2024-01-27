<?php

namespace App\Contracts;

interface RepositoryInterface
{
    public function get_all();

    public function get_create();

    public function store($request);

    public function get_edit($id);

    public function find_person($id);

    public function update($request, $id);

    public function destroy($id);
}
