<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OffreController;
use App\Http\Controllers\PostulationController;
use App\Http\Controllers\RecruteurController;
use App\Http\Middleware\IsRecruiterMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('/', [HomeController::class, 'home'])->name('home');

Route::prefix('v1.0.0')->group(function () {
    Route::post('register', [AuthController::class, 'register'])->name('auth.register');
    Route::post('optCode', [AuthController::class, 'checkOtpCode']);
    Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUserData']);
    Route::post('login', [AuthController::class, 'login'])->name('auth.login');


    Route::get('candidats/show/{id}', [CandidatController::class, 'show']);
    Route::get('candidats/edit', [CandidatController::class, 'edit']);
    Route::get('candidats/create', [CandidatController::class, 'create']);
    Route::get('candidats/index', [CandidatController::class, 'index']);
    Route::post('candidats', [CandidatController::class, 'store']);
    Route::put('candidats', [CandidatController::class, 'update']);
    Route::delete('candidats', [CandidatController::class, 'delete']);


    Route::get('recruteurs/show', [RecruteurController::class, 'show']);
    Route::get('recruteurs/edit', [RecruteurController::class, 'edit']);
    Route::get('recruteurs/create', [RecruteurController::class, 'create']);
    Route::get('recruteurs/index', [RecruteurController::class, 'index']);
    Route::post('recruteurs', [RecruteurController::class, 'store']);
    Route::put('recruteurs', [RecruteurController::class, 'update']);
    Route::delete('recruteurs', [RecruteurController::class, 'delete']);


    Route::middleware([IsRecruiterMiddleware::class])->group(function () {
    });
    Route::get('offres/show', [OffreController::class, 'show']);
    Route::get('offres/edit', [OffreController::class, 'edit']);
    Route::get('offres/create', [OffreController::class, 'create']);
    Route::get('offres/index', [OffreController::class, 'index']);
    Route::get('offres/actuOffre', [OffreController::class, 'actuOffre']);
    Route::post('offres/{recruteur_id}', [OffreController::class, 'store']);
    Route::put('offres/{recruteur_id}', [OffreController::class, 'update']);
    Route::delete('offres/{recruteur_id}', [OffreController::class, 'delete']);

    
    
    Route::get('offres/{offre}/postuler', [PostulationController::class, 'create']);
    Route::get('postulations/{offre}/index', [PostulationController::class, 'index']);
    Route::post('candidats/{candidat_id}/offres/{offre_id}/postuler', [PostulationController::class, 'store']);

    

    Route::get('register', [HomeController::class, 'register'])->name('register');

    Route::get('login', [HomeController::class, 'login'])->name('login');
});