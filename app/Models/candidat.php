<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class candidat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'status',
        'password',
        'phone',
        'age',
        'formationImportante',
        'experienceImportante',
        'dernierPosteOccupé',
        'adresse',
        'cv',
        'LM',
    ];
    
}