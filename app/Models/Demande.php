<?php

namespace App\Models;

use App\Models\Analyse;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;

        protected $fillable = [
        'firstname',
        'lastname',
        'civ',
        'ddn',
        'date_prelev',
        'type_dossier',
        'examens',
        'type_tube',
        'nb_tube',
    ];

     public function analyes() {

        return $this->hasMany(Analyse::class);
    }
}