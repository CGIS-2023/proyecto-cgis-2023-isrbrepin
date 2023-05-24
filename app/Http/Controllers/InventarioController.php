<?php

namespace App\Http\Controllers;

use App\Models\Camilla;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $camillas = Camilla::all(); //Obtengo todos los registros de la tabla camilla
        $inventarios = collect([$camillas])->flatten();

        return view('inventarios.index', compact('inventarios'));
    }
}