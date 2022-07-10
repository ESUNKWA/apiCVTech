<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    use HasFactory;
    protected $table = 't_experiences';
    protected $fillable = [
        'r_nom',
        'r_prenoms',
        'r_date_naissance',
        'r_description',
        'r_photo'
    ];
}
