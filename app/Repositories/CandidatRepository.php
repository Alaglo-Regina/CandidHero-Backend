<?php

namespace App\Repositories;

use App\Interfaces\CandidatInterface;
use App\Models\candidat;

class CandidatRepository implements CandidatInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return candidat::all();
    }


    public function store(array $data)
    {
        $user = candidat::create($data);
    }
    
    public function show($id){}
    public function update(array $data, $id){}
    public function delete($id){}
}