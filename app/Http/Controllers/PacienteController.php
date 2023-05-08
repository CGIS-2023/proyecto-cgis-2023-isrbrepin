<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paciente;
use App\Models\Patologia;
use App\Rules\Nuhsa;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pacientes = Paciente::paginate(10);
        return view('/pacientes/index', ['pacientes' => $pacientes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Paciente $paciente)
    {
        $patologias = Patologia::all();
        return view('pacientes/create', ['patologias' => $patologias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePacienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255', 
            'patologia_id' => 'required|exists:patologias,id',           
        ];
        $reglas_paciente = ['nuhsa' => ['required', 'string', 'max:12', 'min:12', 'unique:pacientes', new Nuhsa()]];
        $reglas = array_merge($reglas_paciente, $rules); // Creo un array con las reglas generales + nuhsa
        $this->validate($request, $reglas); //Lo valido
        $paciente = new Paciente($request->all());
        $paciente->save();
        session()->flash('success', 'Paciente creado correctamente.'); // Si nos da tiempo haremos este mensaje internacionalizable y parametrizable
        return redirect()->route('pacientes.index'); //Te manda al index de nuevo
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function show(Paciente $paciente)
    {
        $pacientes = Paciente::all();
        return view('pacientes/show', ['paciente' => $paciente]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function edit(Paciente $paciente)
    {
        return view('pacientes/edit', ['paciente' => $paciente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePacienteRequest  $request
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paciente $paciente)
    {
        $rules = [
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',            
        ];
        $reglas_paciente = ['nuhsa' => ['required', 'string', 'max:12', 'min:12', new Nuhsa()]];
        $reglas = array_merge($reglas_paciente, $rules); // Creo un array con las reglas generales + nuhsa
        $this->validate($request, $reglas); //Lo valido
        $paciente->fill($request->all());
        $paciente->save();
        session()->flash('success', 'Paciente modificado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('pacientes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Paciente  $paciente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paciente $paciente)
    {
        if($paciente->delete()) {
            session()->flash('success', 'Paciente borrado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'El paciente no pudo borrarse. Es probable que se deba a que tenga asociada información como citas que dependen de él.');
        }
        return redirect()->route('pacientes.index');
    }
}
