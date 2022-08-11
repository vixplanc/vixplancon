<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_model_id',
        'name',
        'plate',
        'chassi_number',
    ];

    public function modelo()
    {
        return $this->belongsTo(EquipamentModel::class);
    }
}
