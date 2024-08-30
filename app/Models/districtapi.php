<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class districtapi extends Model
{
    use HasFactory;

    protected $table = 'districtapi';
    protected $fillable = [
        'DistrictID',
        'DistrictName',
        'CityID',
        'ProvinceID'
    ];
}
