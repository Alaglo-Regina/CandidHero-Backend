<?php

namespace App\Http\Controllers;

use App\Http\Requests\Offres\CreateOffreRequest;
use App\Http\Requests\Offres\UpdateOffreRequest;
use App\Http\Resources\OffreResource;
use App\Interfaces\OffreInterface;
use App\Response\ApiResponse;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OffreController extends Controller
{
    private OffreInterface $offreInterface;

    public function __construct(OffreInterface $offreInterface)
    {
        $this->offreInterface = $offreInterface;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = $this->offreInterface->index();

       return $data;
    }

    public function actuOffre(){
        $actuOffre = $this->offreInterface->actuOffre();

        return $actuOffre;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateOffreRequest $request, $recruteur_id)
    {
        $data = [
            'title' => $request->title,
            'experience' => $request->experience,
            'domaine' => $request->domaine,
            'NbreRecruit' => $request->NbreRecruit,
            'contrat' => $request->contrat,
            'salaire' => $request->salaire,
            'criteres' => $request->criteres,
            'ville' => $request->ville,
            'dateLimite' => $request->dateLimite,
            'recruteur_id' => $recruteur_id
        ];

        // return "bonjour";

        
        DB::beginTransaction();
        try {
            $offre = $this->offreInterface->store($data);
            DB::commit();

            if(!$offre){

                return ApiResponse::sendResponse(
                    false,
                    [],
                    'Echec de l\'opération ',
                    400
                );
            }

            return ApiResponse::sendResponse(
                true,
                [new OffreResource($offre)],
                'Opération effectuée.',
                201
            );

        }catch(\Throwable $th) {
            DB::rollback();
            //  return ApiResponse::rollback($th);

            //  return $th;

            return ApiResponse::sendResponse(
                false,
                [],
                'Une erreur est survenue : ' . $th->getMessage(),
                500
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $offre = $this->offreInterface->show($id);

        return $offre;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOffreRequest $request, string $id)
    {

        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'domaine' => $request->domaine,
            'NbreRecruit' => $request->NbreRecruit,
            'contrat' => $request->contrat,
            'salaire' => $request->salaire,
            'criteres' => $request->criteres,
            'ville' => $request->ville,
            'dateLimite' => Carbon::createFromFormat('d-m-Y', $request->dateLimite)->format('Y-m-d')
        ];
       

        DB::beginTransaction();

        try {
            $offre = $this->offreInterface->update($data, $id);

            DB::commit();

            return ApiResponse::sendResponse(
                true,
                [new OffreResource($offre)],
                'Opération effectuée.',
                201
            );
        }catch( \Throwable $th) {
            return ApiResponse::rollback($th);

             return $th;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $offre = $this->offreInterface->delete($id);

        return ApiResponse::sendResponse(true, [new OffreResource($offre)], 'Opération effectuées .', 201);
    }
}