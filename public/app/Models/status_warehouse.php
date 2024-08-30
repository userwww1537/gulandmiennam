<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status_warehouse extends Model
{
    use HasFactory;

    protected $table = 'status_warehouse';

    protected $fillable = [
        'id',
        'status',
        'parent_id',
        'UserID',
        'created_at',
        'updated_at',
    ];
}
