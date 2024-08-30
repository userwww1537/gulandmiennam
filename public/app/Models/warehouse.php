<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouse extends Model
{
    use HasFactory;

    protected $table = 'warehouse';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'content',
        'type',
        'contentLink',
        'AreaUserID',
        'link',
        'parent_id',
        'created_at',
        'updated_at',
    ];
}
