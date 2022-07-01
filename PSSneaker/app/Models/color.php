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
    public function mapping()
    {
        return $this->hasMany('App\Models\Mapping', 'id_color', 'id');
    }
}
