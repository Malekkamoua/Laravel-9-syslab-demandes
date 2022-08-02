<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}