<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_models_id',
        'name',
        'plate',
        'chassi_number',
    ];

    public function EquipmentModel()
    {
        return $this->belongsTo(EquipmentModel::class);
    }
}
