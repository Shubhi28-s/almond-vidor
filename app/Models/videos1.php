<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videos1 extends Model
{
    protected $table = 'my_videos';
    protected $fillable=['id','video','url','duration','status'];
}