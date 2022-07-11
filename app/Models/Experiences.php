<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    use HasFactory;
    protected $table = 't_experiences';
    protected $fillable = ['individu','r_date_debut','r_date_fin','r_libelle_poste','r_description'];

}
