<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\SupportWorkers;

class SupportWorkers extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'num_people',
        'shift',
    ];
}
