<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class infoclientproduct extends Model
{
    use HasFactory;

    protected $table = 'infoclientproduct';

    protected $fillable = [
        'InfoID',
        'InfoName',
        'InfoContact',
        'ProductID',
        'TypeData',
        'created_at',
        'updated_at',
    ];
}
