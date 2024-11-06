<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Postulation extends Model
{
    use HasFactory;

    protected $fillable = [
        'message', 
        'candidat_id',
        'offre_id', 
        'date_postulation',
        'statut',
        'cv',
        'LM',
    ];

     // Relation avec l'utilisateur (candidat)
     public function candidat()
     {
         return $this->belongsTo(candidat::class);
     }
 
     // Relation avec l'offre
     public function offre()
     {
         return $this->belongsTo(Offre::class);
     }
}