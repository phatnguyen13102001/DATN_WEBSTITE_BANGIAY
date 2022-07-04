<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "products";

    protected $fillable = [
        'id_manufacturer',
        'id_color',
        'name',
        'image',
        'SKU',
        'regular_price',
        'sale_price',
        'discount',
        'describe',
        'outstanding',
    ];
    public function manufacturer()
    {
        return $this->belongsTo('App\Models\Manufacturer', 'id_manufacturer', 'id');
    }
    public function color()
    {
        return $this->belongsTo('App\Models\color', 'id_color', 'id');
    }
    public function mapping()
    {
        return $this->hasMany('App\Models\Mapping', 'id_product', 'id');
    }
    public function library()
    {
        return $this->hasMany('App\Models\Library', 'id_product', 'id');
    }
}
