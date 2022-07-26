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

    public function modelo()
    {
        return $this->belongsTo(
            Modelo::class,
            'modelo',
        );
    }

    public function contrato()
    {
        return $this->belongsTo(
            Contrato::class,
            'contrato',
        );
    }

    public function centro_custo()
    {
        return $this->belongsTo(
            Contrato::class,
            'contrato_centro_custo',
        );
    }

    public function equipamento()
    {
        return $this->belongsTo(
            Equipamento::class,
            'equipamento',
        );
    }
}
