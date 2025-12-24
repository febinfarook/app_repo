<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class document extends Model
{
    protected $table='documents';
    protected $fillable=[
        'file_name',
        'category',
        'file_path',
        'file_type',
        'file_size',
    ];
}
