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
        'ativo',
    ];

    public function funcao()
    {
        return $this->belongsTo(
            Funcao::class,
            'funcao',
        );
    }

    public function contrato()
    {
        return $this->belongsTo(
            Contrato::class,
            'contrato'
        );
    }

    public function centro_custo()
    {
        return $this->belongsTo(
            Contrato::class,
            'contrato_centro_custo'
        );
    }

    public function usuario()
    {
        return $this->belongsTo(
            User::class,
            'id',
            'user'
        );
    }

    public function Autorizados()
    {
        return $this->hasMany(Autorizado::class, foreignKey:'colaborador');
    }


}
