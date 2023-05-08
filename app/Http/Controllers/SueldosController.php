<?php

namespace App\Http\Controllers;

use App\Models\Celador;
use App\Models\Medico;
use Illuminate\Http\Request;

class SueldosController extends Controller
{
    public function index()
    {
        $medicos = Medico::all();
        $celadores = Celador::all();
        $sueldos = collect([$medicos, $celadores])->flatten();

        return view('sueldos.index', compact('sueldos'));
    }
}