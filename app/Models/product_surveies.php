<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_surveies extends Model
{
    use HasFactory;

    protected $table = 'product_surveies';

    protected $fillable = [
        'id',
        'content',
        'status',
        'UserID',
        'ProductID',
        'created_at',
        'updated_at'
    ];
}
