<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContractProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    public function contracts()
    {
        return $this->hasMany(Contract::class);
    }
}
