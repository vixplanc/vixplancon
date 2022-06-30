<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $fillable = [
        'funcao',
        'contrato',
        'contrato_centro_custo',
        'user',
        'nome',
    ];
}
