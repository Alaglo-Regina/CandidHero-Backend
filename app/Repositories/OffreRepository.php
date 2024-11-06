<?php

namespace App\Repositories;

use App\Interfaces\OffreInterface;
use App\Models\Offre;
use App\Models\Recruteur;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class OffreRepository implements OffreInterface
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
        return Offre::all();
    }

    public function actuOffre()
    {
        $offres = Offre::orderBy('created_at', 'desc')->take(5)->get();

        return $offres;

    }

    
    public function show($id)
    {
        return Offre::findOrFail($id);
    }

    public function store(array $data){
        Recruteur::find($data["recruteur_id"])->first();

        // if(!$recruteur){
        //     return false;
        // }
        return Offre::create($data);
    }

    public function update(array $data, $id){
        return Offre::findOrFail($id)->update($data);
    }
    
    public function delete($id){
        return Offre::destroy($id);
    }
    
}