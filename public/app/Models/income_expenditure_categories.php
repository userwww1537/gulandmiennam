<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class income_expenditure_categories extends Model
{
    use HasFactory;

    protected $table = 'income_expenditure_categories';
    protected $fillable = ['name', 'balance', 'created_at', 'updated_at'];
}
