<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthCareAssistants extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'num_people',
        'shift',
    ];
}
