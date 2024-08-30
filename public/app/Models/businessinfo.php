<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class businessinfo extends Model
{
    use HasFactory;

    protected $table = 'businessinfo';
    protected $fillable = [
        'BusinessID',
        'BathRoom',
        'ProductID'
    ];
}
