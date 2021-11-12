<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vingage_id', 'hexa_code', 'question', 'answer', 'option_1', 'option_2', 'option_3',
        'option_4', 'question_time', 'time', 'marks', 'user_id'
    ];
}
