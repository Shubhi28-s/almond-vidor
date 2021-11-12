<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Delegate extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vingage_id', 'hexa_code', 'name', 'email', 'number', 'password',
        'country_code', 'country', 'city', 'state', 'designation', 'organization',
        'language', 'source', 'ip_address', 'last_login', 'status'
    ];
}
