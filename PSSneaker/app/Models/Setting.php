<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $table = "settings";

    protected $fillable = [
        'address',
        'phone',
        'holine',
        'email',
        'iframeggmap',
        'zalo',
        'fanpage',
        'slogan',
    ];
}
