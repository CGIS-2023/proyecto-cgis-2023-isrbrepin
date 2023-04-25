<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    use HasFactory;

    protected $fillable = ['fecha_nacimiento', 'telefono', 'fecha_contratacion', 'vacunado', 'sueldo'];


    protected $casts = [
        'vacunado' => 'boolean',
        'fecha_nacimiento' => 'datetime:Y-m-d',
        'fecha_contratacion' => 'datetime:Y-m-d',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function salas(){
        return $this->hasMany(Sala::class); // one to many
    }

    
    /*
    public function getSalasActualesAttribute(){
        $medicamentos_actuales = collect([]);
        foreach ($this->salas as $sala) {
            $medicamentos_actuales->merge($cita->medicamentos()->wherePivot('inicio','<=', Carbon::now())->wherePivot('fin','>=', Carbon::now())->get());
             Alternativa
            if($cita->medicamentos()->wherePivot('inicio','<=', Carbon::now())->wherePivot('fin','>=', Carbon::now())->exists()){
                $medicamentos_actuales->merge($cita->medicamentos()->wherePivot('inicio','<=', Carbon::now())->wherePivot('fin','>=', Carbon::now())->get());
            }
            
        }
        return $medicamentos_actuales;
    }
    */

    public function getDiasContratadoAttribute(){
        return Carbon::now()->diffInDays($this->fecha_contratacion);
    }
}
