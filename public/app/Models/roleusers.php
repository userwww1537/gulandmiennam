<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roleusers extends Model
{
    use HasFactory;

    protected $table = 'roleusers';
    protected $fillable = [
        'RoleID',
        'roleName',
        'MainRole',
        'UserID',
        'UpperID',
        'AreaUserID',
        'assistantBoolean'
    ];
}
