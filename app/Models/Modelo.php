<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
        'capacidade',
        'tipo',
        'subtipo',
    ];

    public function equipment()
    {
        return $this->hasMany(Equipamento::class);
    }
}
