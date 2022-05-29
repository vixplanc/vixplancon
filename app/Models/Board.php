<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    use HasFactory;

    public function lane()
    {
        return $this->hasMany(Lane::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
