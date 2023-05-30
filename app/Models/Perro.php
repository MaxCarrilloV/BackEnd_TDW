<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perro extends Model
{
    use HasFactory;
    public function perrosInteresados()
    {
        return $this->hasMany(Interaccion::class, 'perro_interesado_id');
    }

    public function perrocandidato()
    {
        return $this->hasOne(Interaccion::class, 'perro_candidato_id');
    }
}
