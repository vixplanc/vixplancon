<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class modulo extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_gerenciamento',
        'link_funcionalidade',
        'nome',
        'descricao',
    ];

}
