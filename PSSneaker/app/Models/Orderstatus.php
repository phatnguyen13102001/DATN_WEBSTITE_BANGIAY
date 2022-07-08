<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderstatus extends Model
{
    use HasFactory;
    protected $table = "orderstatus";

    protected $fillable = [
        'name',
    ];
    public function order()
    {
        return $this->hasMany('App\Models\Order', 'id_orderstatus', 'id');
    }
}
