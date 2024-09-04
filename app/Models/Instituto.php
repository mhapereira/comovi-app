<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instituto extends Model
{
    use HasFactory;

    protected $fillable = [
        'sobre',
        'ata',
        'balanco',
    ];

    protected $casts = [
        'ata' => 'array',
        'balanco' => 'array',
    ];
}
