<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = ['id','nom', 'date_de_naissance', 'email', 'phone', 'adresse', 'ville_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function etudiantHasVille()
    {
        return $this->hasOne('App\Models\Ville', 'id', 'ville_id');
    }

    public function etudiantHasVilles()
    {
        return $this->hasMany(Ville::class);
    }

    public function etudiantHasPosts() 
    {
        return $this->hasMany(BlogPost::class);
    }
}
