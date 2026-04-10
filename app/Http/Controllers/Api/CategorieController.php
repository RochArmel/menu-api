<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET /api/categories
     */
    public function index()
    {
        // On récupère toutes les catégories.
        // Optionnel : avec leurs plats associés -> return Categorie::with('plats')->get();
        return response()->json(Categorie::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     * POST /api/categories
     */
    public function store(Request $request)
    {
        // 1. Validation des données envoyées par le client
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string'
        ]);

        // 2. Création de la catégorie en base de données
        $categorie = Categorie::create($validatedData);

        // 3. Retour de la catégorie créée avec un code HTTP 201 (Created)
        return response()->json($categorie, 201);
    }

    /**
     * Display the specified resource.
     * GET /api/categories/{id}
     */
    public function show(Categorie $categorie)
    {
        // Grâce au "Route Model Binding" de Laravel, la catégorie est trouvée automatiquement.
        // Sinon, elle renvoie une erreur 404.
        return response()->json($categorie, 200);
    }

    /**
     * Update the specified resource in storage.
     * PUT/PATCH /api/categories/{id}
     */
    public function update(Request $request, Categorie $categorie)
    {
        $validatedData = $request->validate([
            'nom' => 'sometimes|required|string|max:255', // 'sometimes' : valider seulement si le champ est présent
            'description' => 'nullable|string'
        ]);

        $categorie->update($validatedData);

        return response()->json($categorie, 200);
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /api/categories/{id}
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete();

        // 204 No Content : Indique que la suppression a réussi, sans renvoyer de données.
        return response()->json(null, 204);
    }
}