<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class addressproduct extends Model
{
    use HasFactory;

    protected $table = 'addressproduct';

    protected $fillable = [
        'AddressProductID',
        'addressnumber',
        'StreetID',
        'WardID',
        'DistrictID',
        'CityID',
        'AddressFull',
        'ToaDo',
        'ProductID',
        'created_at',
        'updated_at',
    ];
}
