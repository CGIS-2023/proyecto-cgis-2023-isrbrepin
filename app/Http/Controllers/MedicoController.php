<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Medico;
use App\Models\Sala;
use App\Models\User;
use App\Models\Especialidad;
use Illuminate\Support\Facades\Hash;

class MedicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $medicos = Medico::paginate(25);
        return view('/medicos/index', ['medicos' => $medicos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $especialidads = Especialidad::all();
        return view('medicos/create', ['especialidads' => $especialidads]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMedicoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'vacunado' => 'required|boolean',
            'sueldo' => 'required|numeric',
            'especialidad_id' => 'required|exists:especialidads,id',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $medico = new Medico($request->all());
        $medico->user_id = $user->id;
        $medico->save();
        session()->flash('success', 'Medico creado correctamente.'); // Si nos da tiempo haremos este mensaje internacionalizable y parametrizable
        return redirect()->route('medicos.index'); //Te manda al index de nuevo
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function show(Medico $medico)
    {
        $medicos = Medico::all();
        return view('medicos/show', ['medico' => $medico]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function edit(Medico $medico)
    {
        $especialidads = Especialidad::all();
        return view('medicos/edit', ['medico' => $medico, 'especialidads' => $especialidads]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMedicoRequest  $request
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medico $medico)
    {
        $reglas = [
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string',
            'fecha_contratacion' => 'required|date',
            'vacunado' => 'required|boolean',
            'sueldo' => 'required|numeric',
            'especialidad_id' => 'required|exists:especialidads,id',
        ];
        $this->validate($request, $reglas);
        $medico->fill($request->all());
        $medico->save();
        session()->flash('success', 'Medico modificado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('medicos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Medico  $medico
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medico $medico)
    {
        if($medico->delete()) {
            session()->flash('success', 'Médico borrado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'El médico no pudo borrarse. Es probable que se deba a que tenga asociada información como citas que dependen de él.');
        }
        return redirect()->route('medicos.index');
    }
}
