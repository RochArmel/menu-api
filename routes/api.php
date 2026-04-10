<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategorieController;
use App\Http\Controllers\Api\PlatController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// apiResource crée automatiquement toutes les routes (GET, POST, PUT, DELETE) 
// pour correspondre aux méthodes de nos contrôleurs.
Route::apiResource('categories', CategorieController::class);
Route::apiResource('plats', PlatController::class);

// Si tu veux vérifier que tes routes sont bien créées, tu peux taper dans ton terminal :
// php artisan route:list --path=api