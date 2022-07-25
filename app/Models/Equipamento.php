<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'modelo_id',
        'denominacao',
        'placa',
        'chassi',
    ];

    public function modelo()
    {
        return $this->belongsTo(Modelo::class);
    }
}
