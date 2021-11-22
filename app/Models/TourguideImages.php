<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TourguideImages extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'tourguide_id',
    ];
}
