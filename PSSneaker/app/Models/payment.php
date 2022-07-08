<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class payment extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "payments";
    protected $fillable = [
        'name',
        'describe',
        'show'
    ];
    public function order()
    {
        return $this->hasMany('App\Models\Order', 'id_payment', 'id');
    }
}
