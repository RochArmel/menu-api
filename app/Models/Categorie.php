<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    // Autorise l'insertion en masse pour ces champs (Sécurité)
    protected $fillable = ['nom', 'description'];

    /**
     * Relation: Une Catégorie possède plusieurs Plats (hasMany)
     */
    public function plats(){
        return $this->hasMany(Plat::class);
    }
}
