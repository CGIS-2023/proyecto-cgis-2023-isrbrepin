<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Camilla extends Model
{
    use HasFactory;

    protected $fillable = ['precio', 'fecha_adquisicion'];

    protected $casts = [
        'fecha_adquisicion' => 'date:Y-m-d',
    ];

    public function salas(){
        return $this->belongsToMany(Sala::class)->withPivot('inicio', 'fin');
    }

    public function getFechaFinVidaUtilAttribute(){
        return Carbon::parse($this->fecha_adquisicion)->addYears(7);
    }
}
