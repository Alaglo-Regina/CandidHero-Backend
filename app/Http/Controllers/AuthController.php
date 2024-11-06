<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Interfaces\AuthInterface;
use App\Interfaces\CandidatInterface;
use App\Interfaces\RecruteurInterface;
use App\Models\User;
use App\Response\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    private AuthInterface $authInterface;
    private CandidatInterface $candidatInterface;
    private RecruteurInterface $recruteurInterface;

    public function __construct( AuthInterface $authInterface, CandidatInterface $candidatInterface, RecruteurInterface $recruteurInterface){
        $this->authInterface = $authInterface;
        $this->candidatInterface = $candidatInterface;
        $this->recruteurInterface = $recruteurInterface;
    }

    public function register(RegisterRequest $registerRequest) {

        $data = [
            'name' => $registerRequest->name,
            'email' => $registerRequest->email,
            'password' => $registerRequest->password,
            'passwordConfirm' => $registerRequest->passwordConfirm,
            'status' => $registerRequest->status
        ];

        if($registerRequest->status != null){
            $data["status"] = $registerRequest->status;
        }
        DB::beginTransaction();

        try{
            $user = $this->authInterface->register($data);

            if ($user) {
               if ($data["status"] === "1") {

                $data = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'status' => 1
                ];

                $this->recruteurInterface->store($data);
                
               }else {

                   $data = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'password' => $user->password,
                    'status' => 0
                    ];
    
                   $this->candidatInterface->store($data);
               }
            }
            DB::commit();

            return ApiResponse::sendResponse(
                true,
                $user,
                'Opération effectuée.',
                201
            );

        }catch (\Throwable $th){
            // return ApiResponse::rollback($th);

            return $th;
        }

    }

    public function checkOtpCode(Request $request)
    {
        $data = [
            'email' => $request->email,
            'code' => $request->code,
        ];

        DB::beginTransaction();
        try {
            $user = $this->authInterface->checkOtpCode($data);

            DB::commit();

            if (!$user) {

                return ApiResponse::sendResponse(
                    false,
                    [],
                    'Code de Confirmation Invalide.',
                    $user ? 200 : 401,
                );
            }


            return ApiResponse::sendResponse(
                true,
                [new UserResource($user)],
                'Opérations effectué.',
                $user ? 200 : 401,

            );
        } catch (\Throwable $th) {

            return $th;
            return ApiResponse::rollback($th);
        }
    }


    public function getUserData(Request $request)
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        if ($user) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'status' => $user->status,
                    // Ajoute d'autres informations utilisateur si nécessaire
                ]
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Utilisateur non authentifié'
            ], 401);
        }
    }

    

    public function login(LoginRequest $loginRequest){
        $data = [
            'email' => $loginRequest->email,
            'password' => $loginRequest->password,
        ];

        DB::beginTransaction();

        try {
            $user = $this->authInterface->login($data);

            DB::commit();

            if (!$user) {
                return ApiResponse::sendResponse(
                    false,
                    [ ],
                    'identifiant invalide.',
                    200
                );
            }

            return ApiResponse::sendResponse(
                true,
                [new UserResource($user)],
                'connexion effectuée.',
                200
            );
        } catch (\Throwable $th) {
            return ApiResponse::rollback($th);
            return $th;
        }
    }
}