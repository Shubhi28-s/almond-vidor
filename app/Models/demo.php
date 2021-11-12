<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class demo extends Model
{
    protected $table = 'demo';
    protected $fillable=['id','video_id','video_name','url','keys','types','start_time','end-time','left','right','top','bottom','fontFamily','font_size','effect','colors','rotation','created_at','updated_at'];
}