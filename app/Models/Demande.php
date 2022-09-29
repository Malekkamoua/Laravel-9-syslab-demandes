<?php

namespace App\Models;

use App\Models\Analyse;
use App\Models\User;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Demande extends Model
{
    use HasFactory;

        protected $fillable = [
        'firstname',
        'lastname',
        'ddn',
        'date_prelev',
        'type_dossier',
        'examens',
        'type_tube',
        'nb_tube',
    ];

     public function correspondant()
    {
        return $this->belongsTo(User::class);
    }
    
     public function getAllAnalyses() {

        return $this->hasMany(Analyse::class);
    }
}
