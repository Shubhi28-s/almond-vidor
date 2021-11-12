<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    protected $table = 'video_slides';
    protected $fillable=['video_name','url','status','duration','slide_name','starttime','endtime'];
}
