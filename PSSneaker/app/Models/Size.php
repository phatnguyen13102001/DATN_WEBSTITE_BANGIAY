<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "sizes";

    protected $fillable = [
        'size',
    ];
    public function mapping()
    {
        return $this->hasMany('App\Models\Mapping', 'id_size', 'id');
    }
}
