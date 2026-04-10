<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    /**
     * GET /api/plats
     */
    public function index()
    {
        // On renvoie tous les plats, en incluant les informations de leur catégorie associée.
        // C'est ce qu'on appelle "Eager Loading" pour éviter les problèmes de requêtes N+1.
        $plats = Plat::with('categorie')->get();
        return response()->json($plats, 200);
    }

    /**
     * POST /api/plats
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom' => 'required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'required|numeric|min:0',
            'est_disponible' => 'boolean',
            'categorie_id' => 'required|exists:categories,id' // Vérifie que l'ID de la catégorie existe en base
        ]);

        $plat = Plat::create($validatedData);

        return response()->json($plat, 201);
    }

    /**
     * GET /api/plats/{id}
     */
    public function show(Plat $plat)
    {
        // On charge la relation avant de renvoyer le JSON
        $plat->load('categorie');
        return response()->json($plat, 200);
    }

    /**
     * PUT/PATCH /api/plats/{id}
     */
    public function update(Request $request, Plat $plat)
    {
        $validatedData = $request->validate([
            'nom' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'prix' => 'sometimes|required|numeric|min:0',
            'est_disponible' => 'boolean',
            'categorie_id' => 'sometimes|required|exists:categories,id'
        ]);

        $plat->update($validatedData);

        return response()->json($plat, 200);
    }

    /**
     * DELETE /api/plats/{id}
     */
    public function destroy(Plat $plat)
    {
        $plat->delete();
        return response()->json(null, 204);
    }
}