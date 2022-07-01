<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Library extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "pictures";

    protected $fillable = [
        'id_product',
        'image',
    ];
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id_product', 'id');
    }
}
