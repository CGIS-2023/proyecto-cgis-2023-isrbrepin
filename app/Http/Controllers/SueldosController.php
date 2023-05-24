<?php

namespace App\Http\Controllers;

use App\Models\Celador;
use App\Models\Medico;
use Illuminate\Http\Request;

class SueldosController extends Controller
{
    public function index()
    {
        $medicos = Medico::all(); //Obtengo todos los registros de la tabla medicos
        $celadores = Celador::all(); //Obtengo todos los registros de la tabla celadores
        $sueldos = collect([$medicos, $celadores])->flatten(); // Se combinan ambas colecciones

        return view('sueldos.index', compact('sueldos'));
    }
}