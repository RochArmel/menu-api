<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plat extends Model
{
    use HasFactory;

    // Autorise l'insertion en masse
    protected $fillable = [
        'nom',
        'description',
        'prix',
        'est_disponible',
        'categorie_id'
    ];

    /**
     * Relation: Un Plat appartient à une Catégorie (belongsTo)
     */
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }
}
