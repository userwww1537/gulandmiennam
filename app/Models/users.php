<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class users extends Authenticatable
{
    use HasFactory;
    
    protected $table = 'users';
    protected $fillable = [
        'id',
        'fullName',
        'avatar',
        'phone',
        'password',
        'address',
        'affilateUser',
        'ipAddress',
        'status'
    ];
}
