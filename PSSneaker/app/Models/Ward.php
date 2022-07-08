<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{
    use HasFactory;
    protected $table = "wards";

    protected $fillable = [
        'id_district',
        'id_city',
        'name',
        'level',
    ];
    public function order()
    {
        return $this->hasMany('App\Models\Ward', 'id_ward', 'id');
    }
}
