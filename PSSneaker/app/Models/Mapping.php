<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mapping extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "mappings";

    protected $fillable = [
        'id_color',
        'id_size',
        'id_product',
        'quantity',
    ];
    public function color()
    {
        return $this->belongsTo('App\Models\color', 'id_color', 'id');
    }
    public function size()
    {
        return $this->belongsTo('App\Models\Size', 'id_size', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id_product', 'id');
    }
}
