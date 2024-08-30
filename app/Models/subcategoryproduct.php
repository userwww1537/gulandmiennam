<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subcategoryproduct extends Model
{
    use HasFactory;

    protected $table = 'subcategoryproduct';

    protected $fillable = [
        'id',
        'name',
        'slug',
        'CategoryID'
    ];
}
