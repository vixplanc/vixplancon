<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lane extends Model
{
    use HasFactory;

    public function lead()
    {
        return $this->hasMany(Lead::class);
    }

    public function board()
    {
        return $this->belongsTo(Board::class);
    }
}
