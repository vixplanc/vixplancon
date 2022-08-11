<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemModule extends Model
{
    use HasFactory;

    protected $fillable = [
        'management_link',
        'module_link',
        'photo_link',
        'name',
        'description',
    ];
}
