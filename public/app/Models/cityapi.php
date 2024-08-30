<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cityapi extends Model
{
    use HasFactory;

    protected $table = 'cityapi';
    protected $fillable = [
        'CityID',
        'CityName',
        'ProvinceID'
    ];
}
