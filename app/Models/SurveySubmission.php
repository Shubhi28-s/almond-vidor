<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveySubmission extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'delegate_id', 'vingage_id', 'survey_id', 'hexa_code', 'option_answer',
        'obtain_marks', 'status'
    ];
}
