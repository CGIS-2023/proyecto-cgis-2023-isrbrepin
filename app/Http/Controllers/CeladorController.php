<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celador;

class CeladorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $celadors = Celador::paginate(25);
        return view('/celadors/index', ['celadors' => $celadors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $celadors = Celador::all();
        return view('celadors/create', ['celadors' => $celadors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string',
            'fecha_contratacion' => 'required|date',
            'sueldo' => 'required|numeric',
        ];
        $this->validate($request, $reglas);
        $celador = new Celador($request->all());
        $celador->save();
        session()->flash('success', 'Celador creada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('celadors.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Celador  $celador
     * @return \Illuminate\Http\Response
     */
    public function show(Celador $celador)
    {
        return view('celadors/show', ['celador' => $celador]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Celador  $celador
     * @return \Illuminate\Http\Response
     */
    public function edit(Celador $celador)
    {
        return view('celadors/edit', ['celador' => $celador]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCeladorRequest  $request
     * @param  \App\Models\Celador  $celador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Celador $celador)
    {
        $reglas = [
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'telefono' => 'required|string',
            'fecha_contratacion' => 'required|date',
            'sueldo' => 'required|numeric',
        ];
        $this->validate($request, $reglas);
        $celador->fill($request->all());
        $celador->save();
        session()->flash('success', 'Celador modificado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('celadors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Celador  $celador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Celador $celador)
    {
        if($celador->delete()) {
            session()->flash('success', 'Celador borrado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'El celador no pudo borrarse. Es probable que se deba a que tenga asociada información como salas que dependen de él.');
        }
        return redirect()->route('celador.index');
    }
}
