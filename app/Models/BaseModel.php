<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    public $timestamps = true;
    protected $guarded = ['id'];
    protected $casts = [
        'created_at' => 'datetime'
    ];
}
