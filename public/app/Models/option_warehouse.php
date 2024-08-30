<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class option_warehouse extends Model
{
    use HasFactory;

    protected $table = 'option_warehouse';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'content',
        'type',
        'parent_id',
        'UserID',
        'created_at',
        'updated_at',
    ];
}
