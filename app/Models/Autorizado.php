<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizado extends Model
{
    use HasFactory;

    public function Colaboradores()
    {
        return $this->belongsToMany(
            Colaborador::class,parentKey:'colaborador'
        );
    }
}
