<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Celador;
use App\Models\Camilla;
use App\Models\Sala;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

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
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'telefono' => 'required|string|max:255',
            'fecha_contratacion' => 'required|date',
            'sueldo' => 'required|numeric',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $celador = new Celador($request->all());
        $celador->user_id = $user->id;
        $celador->save();
        session()->flash('success', 'Celador creado correctamente.'); // Si nos da tiempo haremos este mensaje internacionalizable y parametrizable
        return redirect()->route('celadors.index'); //Te manda al index de nuevo
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Celador  $celador
     * @return \Illuminate\Http\Response
     */
    public function show(Celador $celador)
    {
        $celadors = Celador::all();
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
        $camillas = Camilla::all();
        $salas = Sala::all();
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
/*
    if($request->input('profesion_id')){
        $sanitarios_query->where()
    }
    $sanitarios = $sanitarios_query->paginate(25);
    return view('/sanitarios/index', ['sanitarios' => $sanitarios]);

    public function paginaA()
{
    session(['pagina_origen' => 'A']);
    return view('pagina_a');
}

public function paginaB()
{
    session(['pagina_origen' => 'B']);
    return view('pagina_b');
}
*/
