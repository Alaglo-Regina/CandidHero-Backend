<?php

namespace App\Http\Controllers;

use App\Interfaces\RecruteurInterface;
use App\Response\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RecruteurController extends Controller
{

    private RecruteurInterface $recruteurInterface;

    public function __construct(RecruteurInterface $recruteurInterface)
    {
        $this->recruteurInterface = $recruteurInterface;
    }
   
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->recruteurInterface->index();
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
            'picture' => $request->picture,
            'domaineSocial' => $request->domaineSocial,
            'status' => $request->status
        ];

        // return "bonjour";

        
        DB::beginTransaction();
        try {
            $candidat = $this->recruteurInterface->store($data);
            DB::commit();

            return ApiResponse::sendResponse(
                true,
                [new RecruteurInterface($candidat)],
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
        $candidat = $this->recruteurInterface->show($id);

        return $candidat;
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