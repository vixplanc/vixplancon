<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'equipment_model_id',
        'contract',
        'cost_center',
        'equipment_id',
        'status',
        'contractual',
        'prefix',
        'contract_regime',
        'sap_code',
    ];

    public function equipment_model()
    {
        return $this->belongsTo(
            EquipmentModel::class,
            'equipment_model_id',
        );
    }

    public function contract()
    {
        return $this->belongsTo(
            Contract::class,
            'contract',
        );
    }

    public function cost_center()
    {
        return $this->belongsTo(
            Contract::class,
            'cost_center',
        );
    }

    public function equipment()
    {
        return $this->belongsTo(
            Equipment::class,
            'equipment_id',
        );
    }
}
