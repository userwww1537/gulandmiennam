<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product_marketing extends Model
{
    use HasFactory;

    protected $table = 'product_marketing';

    protected $fillable = [
        'id',
        'parent_id',
        'UserID'
    ];
}
