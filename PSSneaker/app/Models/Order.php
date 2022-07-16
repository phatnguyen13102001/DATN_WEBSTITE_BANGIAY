<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = "orders";

    protected $fillable = [
        'id_ward',
        'id_district',
        'id_city',
        'id_payment',
        'id_orderstatus',
        'id_user',
        'code',
        'name_customer',
        'phone',
        'address',
        'email',
        'note',
        'total',
    ];
    public function orderdetail()
    {
        return $this->belongsTo('App\Models\Orderstatus', 'id_orderstatus', 'id');
    }
    public function payment()
    {
        return $this->belongsTo('App\Models\Payment', 'id_payment', 'id');
    }
    public function city()
    {
        return $this->belongsTo('App\Models\City', 'id_city', 'id');
    }
    public function district()
    {
        return $this->belongsTo('App\Models\District', 'id_district', 'id');
    }
    public function ward()
    {
        return $this->belongsTo('App\Models\Ward', 'id_ward', 'id');
    }
    public function cthd()
    {
        return $this->hasOne(Orderdetail::class);
    }
}
