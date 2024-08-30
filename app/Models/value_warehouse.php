<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class value_warehouse extends Model
{
    use HasFactory;

    protected $table = 'value_warehouse';
    protected $fillable = [
        'id',
        'WardID',
        'DistrictID',
        'CityID',
        'price_min',
        'price_max',
        'CategoryID',
        'parent_id'
    ];
}
