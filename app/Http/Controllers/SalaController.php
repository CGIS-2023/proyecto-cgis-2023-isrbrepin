<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSalaRequest;
use App\Http\Requests\UpdateSalaRequest;
use App\Models\Sala;

class SalaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::orderBy('fecha_hora_inicio', 'desc')->paginate(25);
        /*
        if(Auth::user()->tipo_usuario_id == 1){
            $salas = Auth::user()->medico->salas()->orderBy('fecha_hora_inicio', 'desc')->paginate(25);
        }
        elseif(Auth::user()->tipo_usuario_id == 2){
            $salas = Auth::user()->paciente->salas()->orderBy('fecha_hora_inicio', 'desc')->paginate(25);
        }
        */
        return view('/salas/index', ['salas' => $salas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $salas = Sala::all();
        return view('salas/create', ['salas' => $salas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSalaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'fecha_hora_inicio' => 'required|date',
            'planta' => 'required|string|max:255',
            'numero_sala' => 'required|string|max:255',
        ];
        $this->validate($request, $reglas);
        $sala = new Sala($request->all());
        $sala->save();
        session()->flash('success', 'Sala creada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('salas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function show(Sala $sala)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit(Sala $sala)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSalaRequest  $request
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSalaRequest $request, Sala $sala)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sala $sala)
    {
        //
    }
}
