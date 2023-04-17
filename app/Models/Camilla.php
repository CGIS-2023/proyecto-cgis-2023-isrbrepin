<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Camilla extends Model
{
    use HasFactory;

    protected $fillable = ['precio', 'fecha_adquisicion', 'tipo_camilla_id'];

    protected $casts = [
        'fecha_adquisicion' => 'datetime:Y-m-d',
        
    ];

    public function salas(){
        return $this->belongsToMany(Sala::class, 'sala_camilla')->withPivot('comentario');
    }

    public function tipo_camilla(){
        return $this->belongsTo(TipoCamilla::class);
    }

    public function getFechaFinVidaUtilAttribute(){
        return Carbon::parse($this->fecha_adquisicion)->addYears(7);
    }

    public function getTiempoHospitalizadoAttribute(){
        return Carbon::now()->diffInDays($this->inicio);
    }
}
