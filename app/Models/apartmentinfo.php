<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class apartmentinfo extends Model
{
    use HasFactory;

    protected $table = 'apartmentinfo';

    protected $fillable = [
        'id',
        'CodeRoom',
        'block',
        'BedRoom',
        'frequency',
        'ProductID',
        'created_at',
        'updated_at',
    ];
}
