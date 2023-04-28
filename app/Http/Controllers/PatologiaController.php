<?php

namespace App\Http\Controllers;

use App\Models\Patologia;
use Illuminate\Http\Request;

class PatologiaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Patologia::class, 'patologia');
    }


    public function index()
    {
        $patologias = Patologia::paginate(25);
        return view('/patologias/index', ['patologias' => $patologias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patologias/create');
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
            'nombre.required' => 'La patologia es obligatoria',
        ]);
        $patologia = new Patologia($request->all());
        $patologia->save();
        session()->flash('success', 'Patologia creada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('patologias.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function show(Patologia $patologia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function edit(Patologia $patologia)
    {
        return view('patologias/edit', ['patologia' => $patologia]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patologia $patologia)
    {
        $this->validate($request, [
            'nombre' => 'required|string|max:255',
            
        ]);
        $patologia->fill($request->all());
        $patologia->save();
        session()->flash('success', 'Patologia modificada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('patologias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Equipo  $equipo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patologia $patologia)
    {
        if($patologia->delete()) {
            session()->flash('success', 'Patologia borrada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'No pudo borrarse la patologia.');
        }
        return redirect()->route('patologias.index');

    }
}
