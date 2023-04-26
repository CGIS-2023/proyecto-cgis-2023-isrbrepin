<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;

class EspecialidadController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Especialidad::class, 'especialidad');
    }


    public function index()
    {
        $especialidades = Especialidad::paginate(25);
        return view('/especialidades/index', ['especialidades' => $especialidades]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('especialidades/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
        ], [
            'nombre.required' => 'La especialidad es obligatoria',
        ]);
        $especialidad = new Especialidad($request->all());
        $especialidad->save();
        session()->flash('success', 'Especialidad creada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('especialidads.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Especialidad $especialidad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Especialidad $especialidad)
    {
        return view('especialidades/edit', ['especialidad' => $especialidad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Especialidad $especialidad)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            
        ]);
        $especialidad->fill($request->all());
        $especialidad->save();
        session()->flash('success', 'Especialidad modificada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('especialidads.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especialidad $especialidad)
    {
        if($especialidad->delete()) {
            session()->flash('success', 'Especialidad borrada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'No pudo borrarse la especialidad.');
        }
        return redirect()->route('especialidads.index');

    }
}
