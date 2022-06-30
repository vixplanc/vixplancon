<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consolidado extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo',
        'contrato',
        'contrato_centro_custo',
        'equipamento',
        'status',
        'contratual',
        'prefixo',
        'regime',
        'codigo_sap',
    ];
}
