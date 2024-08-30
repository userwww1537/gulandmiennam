<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_utilities extends Model
{
    use HasFactory;

    protected $table = 'product_utilities';

    protected $fillable = [
        'id',
        'UtilityName',
        'ProductID',
        'created_at',
        'updated_at',
    ];
}
