<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
     * @param  Illuminate\Http\Request;  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'fecha_hora_inicio' => 'required|date',
            'planta' => 'required|string|max:255',
            'numero_sala' => 'required|string|max:255',
            'numero_camillas' => 'required|numeric|min:0',
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
        return view('salas/show', ['sala' => $sala]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function edit(Sala $sala)
    {
        return view('salas/edit', ['sala' => $sala]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Illuminate\Http\Request;  $request
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sala $sala)
    {
        $reglas = [
            'fecha_hora_inicio' => 'required|date',
            'planta' => 'required|string|max:255',
            'numero_sala' => 'required|string|max:255',
            'numero_camillas' => 'required|numeric|min:0',
        ];
        $this->validate($request, $reglas);
        $sala->fill($request->all());
        $sala->save();
        session()->flash('success', 'Sala modificada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('salas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sala  $sala
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sala $sala)
    {
        if($sala->delete()) {
            session()->flash('success', 'Sala borrada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'La sala no pudo borrarse. Es probable que se deba a que tenga asociada información como salas que dependen de él.');
        }
        return redirect()->route('salas.index');
    }
}
