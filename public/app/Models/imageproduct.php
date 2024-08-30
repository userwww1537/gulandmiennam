<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class imageproduct extends Model
{
    use HasFactory;

    protected $table = 'imageproduct';

    protected $fillable = [
        'ImageID',
        'ImageFile',
        'TypeImage',
        'ProductID',
        'SurveyID',
        'created_at',
        'updated_at',
    ];
}
