<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class customer_warehouse extends Model
{
    use HasFactory;

    protected $table = 'customer_warehouse';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'fullName',
        'phone',
        'role',
        'status',
        'UserID',
        'created_at',
        'updated_at',
    ];
}
