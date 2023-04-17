<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_hora_inicio', 'planta', 'numero_sala', 'numero_camillas', 'celador_id'];

    protected $casts = [
        'fecha_hora_inicio' => 'datetime:Y-m-d H:i',
    ];
    /*
    public function medico(){
        return $this->belongsTo(Medico::class);
    }
    */
    public function camillas(){
        return $this->belongsToMany(Camilla::class, 'sala_camilla')->using(SalaCamillaPivot::class)->withPivot('comentario');
    }
    

    public function celador(){
        return $this->belongsTo(Celador::class);
    }

    public function getTiempoHospitalizadoAttribute(){
        return Carbon::now()->diffInDays($this->fecha_hora_inicio);
    }

    public function getPlantaNumeroAttribute()
    {
        return 'Planta: ' . $this->planta . ', Numero: ' . $this->numero_sala;
    }
}
