<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    protected $table = "cities";

    protected $fillable = [
        'name',
        'level',
    ];
    public function order()
    {
        return $this->hasMany('App\Models\Order', 'id_city', 'id');
    }
}
