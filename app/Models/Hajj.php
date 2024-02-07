<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hajj extends Model
{
    use HasFactory;

    protected $table = 'tb_hajj';

    protected $fillable = [
        'name', 'location', 'airline','category', 'price', 'rating', 'description', 'link', 'duration','image',
    ];
}
