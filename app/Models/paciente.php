<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'apellido', 'f_nacimiento', 'direccion', 'telefono', 'correo', 'h_medico', 'estado'];
}
