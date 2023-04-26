<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellido', 'nuhsa'];


    public function camilla(){
        return $this->hasOne(Camilla::class);
    }

    public function getNombreApellidoAttribute()
    {
        return $this->nombre . " " . $this->apellido;
    }
}
