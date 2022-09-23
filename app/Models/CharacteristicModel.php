<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacteristicModel extends Model
{
    use HasFactory;

    protected $table 		= 'caracteristicas';
    protected $primaryKey 	= 'idcaracteristica';
}
