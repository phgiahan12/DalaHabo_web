<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tourguide extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'dob',
        'gender',
        'email',
        'phone',
        'short_description',
        'description',
        'rental_price',
    ];
}
