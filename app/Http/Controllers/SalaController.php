<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sala;
use App\Models\Celador;
use App\Models\Camilla;
use App\Models\Medico;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Rules\MaxSalas;

class SalaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Sala::class, 'sala');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $salas = Sala::orderBy('fecha_hora_inicio', 'desc')->paginate(10);
        
        if(Auth::user()->tipo_usuario_id == 1){
            $salas = Auth::user()->medico->salas()->orderBy('fecha_hora_inicio', 'desc')->paginate(25);
        }
        return view('/salas/index', ['salas' => $salas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Sala $sala)
    {
        $medicos = Medico::all();
        $celadors = Celador::all();
        if(Auth::user()->tipo_usuario_id == 1) {
            return view('salas/create', ['medico' => Auth::user()->medico]);
        }elseif(Auth::user()->tipo_usuario_id == 2) {
            return view('salas/create', ['celador' => Auth::user()->celador]);
        }
        return view('salas/create', ['sala' => $sala, 'celadors' => $celadors, 'medicos' => $medicos]);
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
            'medico_id' => ['required', new MaxSalas(2)],
        ];
        if(Auth::user()->tipo_usuario_id == 1){
            $reglas_medico = ['medico_id' => ['required', 'exists:medicos,id', Rule::in(Auth::user()->medico->id)]];
            $reglas = array_merge($reglas_medico, $reglas);
        }
        elseif(Auth::user()->tipo_usuario_id == 2){
            $reglas_celador = ['celador_id' => ['required', 'exists:celadors,id', Rule::in(Auth::user()->celador->id)]];
            $reglas = array_merge($reglas_celador, $reglas);
        }
        else{
            $reglas_generales = ['medico_id' => ['required', 'exists:medicos,id']];
            $reglas = array_merge($reglas_generales, $reglas);
        }
        $medicos = Medico::all();
        $celadors = Celador::all();
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
        $medicos = Medico::all();
        $celadors = Celador::all();
        $camillas = Camilla::all();
        if(Auth::user()->tipo_usuario_id == 1) {
            return view('salas/edit', ['sala' => $sala, 'medico' => Auth::user()->medico, 'camillas' => $camillas, 'celadors' => $celadors]);
        }
        elseif(Auth::user()->tipo_usuario_id == 2) {
            return view('salas/edit', ['sala' => $sala, 'celador' => Auth::user()->celador, 'camillas' => $camillas, 'medicos' => $medicos]);
        }
        return view('salas/edit', ['sala' => $sala, 'celadors' => $celadors, 'camillas' => $camillas, 'medicos' => $medicos]);
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
            'medico_id' => ['required', new MaxSalas(2)],
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

    public function attach_camilla(Request $request, Sala $sala)
    {
        $this->validateWithBag('attach', $request, [
            'camilla_id' => 'required|exists:camillas,id',
            'comentario' => 'nullable|string', // agregar regla de validación nullable
        ]);
    
        $sala->camillas()->attach($request->camilla_id);
    
        return redirect()->route('salas.edit', $sala->id);
    }
    

    public function detach_camilla(Sala $sala, Camilla $camilla)
    {
        $sala->camillas()->detach($camilla->id);
        return redirect()->route('salas.edit', $sala->id);
    }
}
