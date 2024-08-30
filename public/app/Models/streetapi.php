<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class streetapi extends Model
{
    use HasFactory;

    protected $table = 'streetapi';
    protected $fillable = [
        'StreetID',
        'StreetName',
        'DistrictID',
        'WardID',
        'CityID',
        'ProvinceID'
    ];
}
