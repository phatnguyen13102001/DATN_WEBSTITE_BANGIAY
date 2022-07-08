<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;
    protected $table = "districts";

    protected $fillable = [
        'id_city',
        'name',
        'level',
    ];
    public function order()
    {
        return $this->hasMany('App\Models\Order', 'id_district', 'id');
    }
}
