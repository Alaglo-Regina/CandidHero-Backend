<?php

namespace App\Repositories;

use App\Interfaces\PostulationInterface;
use App\Models\candidat;
use App\Models\Offre;
use App\Models\Postulation;

class PostulationRepository implements PostulationInterface
{
    /**
     * Create a new class instance.
     */
    public function __construct()
    {
        //
    }

    public function index($offre_id)
    {
        return Postulation::where('offre_id', $offre_id)->with('candidat')->get();
    }

    
    public function show($id)
    {
        return Postulation::findOrFail($id);
    }

    public function store(array $data){
        candidat::find($data["candidat_id"])->first();
        Offre::find($data["offre_id"])->first();


        return Postulation::create($data);
    }

    public function update(array $data, $id){
        return Postulation::findOrFail($id)->update($data);
    }
    
    public function delete($id){
        return Postulation::destroy($id);
    }
}