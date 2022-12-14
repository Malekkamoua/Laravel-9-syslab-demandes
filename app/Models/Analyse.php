<?php

namespace App\Models;

use App\Models\Demande;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Analyse extends Model
{
    use HasFactory;

    //protected $primaryKey = 'code';
    public $timestamps = false;

    public function demande()
    {
        return $this->belongsTo(Demande::class);
    }
}
