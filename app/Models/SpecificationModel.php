<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecificationModel extends Model
{
    use HasFactory;

    protected $table 		= 'especificaciones';
    protected $primaryKey 	= 'idespecificacion';
}
