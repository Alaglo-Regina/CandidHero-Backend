<?php

namespace App\Repositories;

use App\Interfaces\RecruteurInterface;
use App\Models\recruteur;

class RecruteurRepository implements RecruteurInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }


    public function index()
    {
        return recruteur::all();
    }


    public function store(array $data)
    {
        $user = recruteur::create($data);
    }
    public function show($id){}
    public function update(array $data, $id){}
    public function delete($id){}
}