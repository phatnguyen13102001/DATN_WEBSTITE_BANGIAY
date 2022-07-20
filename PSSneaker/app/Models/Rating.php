<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    use HasFactory;

    protected $table = "ratings";

    protected $fillable = [
        'rate',
        'id_user',
        'id_product',
    ];
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user', 'id');
    }
    public function product()
    {
        return $this->belongsTo('App\Models\Product', 'id_product', 'id');
    }
}
