<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    use HasFactory;

    protected $fillable = [
        'perfil_id',
        'descricao',
        'centro_custo',
        'data_inicio',
        'data_fim',
    ];
}
