<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class color extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "colors";

    protected $fillable = [
        'name',
        'code'
    ];
    public function product()
    {
        return $this->hasMany('App\Models\Product', 'id_color', 'id');
    }
}
