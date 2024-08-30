<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wardapi extends Model
{
    use HasFactory;

    protected $table = 'wardapi';
    protected $fillable = [
        'WardID',
        'WardName',
        'DistrictID',
        'CityID',
        'ProvinceID'
    ];
}
