<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EquipamentModel extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'capacity',
        'type',
        'subtype',
    ];

    public function equipment()
    {
        return $this->hasMany(Equipament::class);
    }
}
