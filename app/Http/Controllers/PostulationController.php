<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostulationRequest;
use App\Http\Resources\PostulationResource;
use App\Interfaces\PostulationInterface;
use App\Response\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostulationController extends Controller
{

    private PostulationInterface $postulationInterface;

    public function __construct(PostulationInterface $postulationInterface)
    {
        $this->postulationInterface = $postulationInterface;
    }

    /**
     * Display a listing of the resource.
     */
    public function index($offre_id)
    {
        return $this->postulationInterface->index($offre_id);
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
    public function store(PostulationRequest $request, $candidat_id, $offre_id)
    {
        $data = [
            'candidat_id' => $candidat_id,
            'offre_id' => $offre_id,
            'date_postulation' => now(),
           'statut' => 'en entente',       
           'message' => $request->message,            
        ];

        if ($request->hasFile("cv")) {
            $file = $request->file('cv');
            $destinationPath = 'cv/';
            $fileName = $file->getClientOriginalName();

            if ($file->move($destinationPath, $fileName)) {
                $data['cv'] = $fileName;
            } else {
                // Gérer l'erreur de téléchargement
                return response()->json(['error' => 'Echec du téléchargement du fichier'], 500);
            }
        } else {
            $data['cv'] = '';
        }

        if ($request->hasFile("LM")) {
            $file = $request->file('LM');
            $destinationPath = 'LM/';
            $fileName = $file->getClientOriginalName();

            if ($file->move($destinationPath, $fileName)) {
                $data['LM'] = $fileName;
            } else {
                // Gérer l'erreur de téléchargement
                return response()->json(['error' => 'Echec du téléchargement du fichier'], 500);
            }
        } else {
            $data['LM'] = '';
        }

        DB::beginTransaction();

        try {
            $postulation = $this->postulationInterface->store($data);

            DB::commit();
            
            if(!$postulation){

                return ApiResponse::sendResponse(
                    false,
                    [],
                    'Echec de l\'opération ',
                    400
                );
            }

            return ApiResponse::sendResponse(
                true,
                [new PostulationResource($postulation)],
                'Opération effectuée.',
                201
            );
        } catch(\Throwable $th){

            DB::rollback();
            // return ApiResponse::rollback($th);

            return $th;
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}