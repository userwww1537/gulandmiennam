<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    use HasFactory;

    protected $fillable = [
        'ProductID',
        'title',
        'price',
        'deposit',
        'slug',
        'avatar',
        'TypeProduct',
        'direction',
        'totalArea',
        'floors',
        'phaply',
        'chitietphaply',
        'description',
        'postCode',
        'PostingStatus',
        'views',
        'CategoryID',
        'UserID',
        'created_at',
        'updated_at',
    ];
}
