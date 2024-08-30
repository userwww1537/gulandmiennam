<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areaproduct extends Model
{
    use HasFactory;

    protected $table = 'areaproduct';

    protected $fillable = [
        'AreaProductID',
        'height',
        'width',
        'contructionArea',
        'ProductID',
        'created_at',
        'updated_at',
    ];
}
