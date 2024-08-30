<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'parent_id',
        'product_id',
        'payment_method',
        'information',
        'info_more',
        'status',
        'price',
        'coin',
        'created_at',
        'updated_at'
    ];
}
