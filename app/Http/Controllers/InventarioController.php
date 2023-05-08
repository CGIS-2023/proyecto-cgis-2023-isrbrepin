<?php

namespace App\Http\Controllers;

use App\Models\Camilla;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $camillas = Camilla::all();
        $inventarios = collect([$camillas])->flatten();

        return view('inventarios.index', compact('inventarios'));
    }
}