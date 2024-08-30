<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class alleyproduct extends Model
{
    use HasFactory;

    protected $table = 'alleyproduct';

    protected $fillable = [
        'AlleyID',
        'AlleyLocation',
        'AlleyWidth',
        'AlleyType',
        'ProductID',
        'created_at',
        'updated_at',
    ];
}
