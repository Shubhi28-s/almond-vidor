<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Storage;

class Vingaje extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'vingages';

    protected $fillable = [
        'hexa_code',
        'desktop_image',
        'mobile_image',
        'login_desktop_image',
        'login_mobile_image',
        'logo',
        'video_url',
        'first_popup',
        'last_popup', 'user_id'
    ];


    public function question()
    {
        return $this->hasMany('App\Models\Survey', 'vingage_id', 'id');
    }
}
