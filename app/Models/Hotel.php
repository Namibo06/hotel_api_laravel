<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;

    protected $fillable=[
        'date_of',
        'hour_of',
        'minute_of',
        'date_to',
        'hour_to',
        'minute_to',
        'available',
        'suites_id',
        'user_id'
    ];

    public function suites(){
        $this->belongsTo(Suites::class,'suites_id');
    }

    public function users(){
        $this->belongsTo(User::class,'users_id');
    }
}
