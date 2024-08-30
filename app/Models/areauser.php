<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class areauser extends Model
{
    use HasFactory;

    protected $table = 'areauser';
    protected $fillable = [
        'AreaUserID',
        'areaUserName'
    ];
}
