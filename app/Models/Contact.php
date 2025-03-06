<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // ✅ Ajout du trait
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom', 'prenom', 'entreprise', 'email', 'telephone_1', 'telephone_2', 'description'
    ];
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}
