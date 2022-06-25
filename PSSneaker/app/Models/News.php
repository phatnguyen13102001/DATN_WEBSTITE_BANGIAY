<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = "news";

    protected $fillable = [
        'name',
        'image',
        'describe',
        'content',
        'show',
        'outstanding'
    ];
}
