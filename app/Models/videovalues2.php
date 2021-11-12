<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videovalues2 extends Model
{
    protected $table = 'videovalues';
    protected $fillable=['id','video_name','url','duration','status'];
}