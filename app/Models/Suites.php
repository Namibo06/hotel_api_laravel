<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suites extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'number',
        'number_of_bedroom',
        'number_of_bathroom',
        'area',
        'price'
    ];
}
