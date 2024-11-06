<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offre extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'experience',
        'domaine',
        'NbreRecruit',
        'contrat',
        'salaire',
        'criteres',
        'ville',
        'dateLimite',
        'recruteur_id',
    ];


    public function recruteur()
    {
        return $this->belongsTo(recruteur::class);
    }
}