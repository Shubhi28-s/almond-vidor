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

    public function submission()
    {
        return $this->hasMany('App\Models\SurveySubmission', 'hexa_code', 'hexa_code')
            ->where('status', 1);
    }

    public function delegate()
    {
        return $this->hasOne('App\Models\Delegate', 'id', 'delegate_id');
    }

    public function survey()
    {
        return $this->hasMany('App\Models\Survey', 'hexa_code', 'hexa_code');
    }
}
