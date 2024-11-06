<?php

namespace App\Http\Controllers;

use App\Http\Resources\CandidatResource;
use App\Interfaces\CandidatInterface;
use App\Models\candidat;
use App\Response\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CandidatController extends Controller
{

    private CandidatInterface $candidatInterface;

    public function __construct(CandidatInterface $candidatInterface)
    {
        $this->candidatInterface = $candidatInterface;
    }
   


    public function index()
    {
        $data = $this->candidatInterface->index();
        return $data;
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
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password),
            'phone' => $request->phone,
            'age' => $request->age,
            'picture' => $request->picture,
            'formationImportante' => $request->formationImportante,
            'experienceImportante' => $request->experienceImportante,
            'dernierPosteOccupé' => $request->dernierPosteOccupé,
            'competences' => $request->competences,
            'adresse' => $request->adresse,
            'cv' => $request->cv,
            'LM' => $request->LM,
            'status' => $request->status
        ];

        // return "bonjour";

        
        DB::beginTransaction();
        try {
            $candidat = $this->candidatInterface->store($data);
            DB::commit();

            return ApiResponse::sendResponse(
                true,
                [new CandidatResource($candidat)],
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
        $candidat = candidat::find($id);
        
        return $candidat;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $candidat = $this->candidatInterface->show($id);

        // return $candidat;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make( $request->password),
            'phone' => $request->phone,
            'age' => $request->age,
            'picture' => $request->picture,
            'formationImportante' => $request->formationImportante,
            'experienceImportante' => $request->experienceImportante,
            'dernierPosteOccupé' => $request->dernierPosteOccupé,
            'competences' => $request->competences,
            'adresse' => $request->adresse,
            'cv' => $request->cv,
            'LM' => $request->LM,
            'status' => $request->status
        ];
       

        DB::beginTransaction();

        try {
            $offre = $this->candidatInterface->update($data, $id);

            DB::commit();

            return ApiResponse::sendResponse(
                true,
                [new CandidatResource($offre)],
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
        //
    }
}