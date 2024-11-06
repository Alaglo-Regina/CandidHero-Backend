<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recruteur extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'name',
        'email',
        'status',
        'password',
        'phone',
        'domaineSocial',
    ];

    public function offres()
    {
        return $this->hasMany(offre::class); // un recruteur a plusieurs offres
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Le recruteur appartient à un utilisateur
    }
}