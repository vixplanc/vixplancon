<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;

    protected $fillable = [
        'contract_profile_id',
        'description',
        'cost_center',
        'begin',
        'end',
    ];

    public function ContractProfile()
    {
        return $this->belongsTo(ContractProfile::class);
    }
}
