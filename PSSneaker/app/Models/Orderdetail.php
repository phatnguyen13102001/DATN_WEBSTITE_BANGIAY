<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orderdetail extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "orderdetails";

    protected $fillable = [
        'id_color',
        'id_size',
        'id_manufacturer',
        'id_product',
        'id_order',
        'name_color',
        'name_manufacturer',
        'name_product',
        'size',
        'image',
        'SKU',
        'regular_price',
        'sale_price',
        'quantity',
    ];
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
