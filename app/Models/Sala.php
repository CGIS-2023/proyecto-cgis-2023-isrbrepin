<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sala extends Model
{
    use HasFactory;

    protected $fillable = ['planta', 'numero_sala', 'fecha_hora_inicio', 'medico_id'];

    protected $casts = [
        'fecha_hora_inicio' => 'datetime:Y-m-d H:i',
    ];
    
    public function medico(){
        return $this->belongsTo(Medico::class);
    }
    
    public function camillas(){
        return $this->belongsToMany(Camilla::class, 'sala_camilla')->using(SalaCamillaPivot::class);
    }

    public function getTiempoHospitalizadoAttribute(){
        return Carbon::now()->diffInDays($this->fecha_hora_inicio);
    }

    public function getPlantaNumeroAttribute()
    {
        return 'Planta: ' . $this->planta . ', Numero: ' . $this->numero_sala;
    }

    public function camillasDisponibles()
    {
        $camillasDisponibles = 0;
        foreach ($this->camillas as $camilla) {
            if (is_null($camilla->paciente_id)) {
                $camillasDisponibles++;
            }
        }
        return $camillasDisponibles;
    }


}
