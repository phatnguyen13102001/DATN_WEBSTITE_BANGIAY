<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Manufacturer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "manufacturers";

    protected $fillable = [
        'name',
    ];
    public function Product()
    {
        return $this->hasMany('App\Models\Product', 'id_manufacturer', 'id');
    }
}
