<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autorizado extends Model
{
    use HasFactory;

    public function Permission()
    {
        return $this->belongsToMany(
            User::class,
            parentKey:'user'
        );
    }

}
