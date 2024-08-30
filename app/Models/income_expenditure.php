<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class income_expenditure extends Model
{
    use HasFactory;

    protected $table = 'income_expenditure';    
    protected $fillable = [
        'balance_first',
        'balance_last',
        'collect',
        'spend',
        'type',
        'description',
        'content',
        'parent_id',
        'user_from',
        'fullName',
        'phone',
        'created_at',
        'updated_at'
    ];
}
