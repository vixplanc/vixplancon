<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcao extends Model
{
    use HasFactory;

    protected $fillable = [
        'descricao',
    ];

    public function employees()
    {
        return $this->hasMany(Colaborador::class);
    }
}
