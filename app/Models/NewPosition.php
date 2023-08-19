<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'position',
         'date',
        'num_people',
        'shift',
    ];
}
