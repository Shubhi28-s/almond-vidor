<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videokeys extends Model
{
    protected $table = 'videokeys';
    protected $fillable=['id','keys','Types'];
}