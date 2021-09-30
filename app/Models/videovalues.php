<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class videovalues extends Model
{
    protected $table = 'videovalues1';
    protected $fillable=['id','video_id','values','keys','start_time','end_time','left','right','top','bottom','width','height','text-align','fontFamily','font_size','colors','effect','rotation','video_name','url','status','created_at','modified_at'];
}
