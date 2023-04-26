<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camilla;
use App\Models\TipoCamilla;
use App\Models\Paciente;
use App\Models\Celador;
use Illuminate\Support\Facades\Auth;

class CamillaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Camilla::class, 'camilla');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $camillas = Camilla::orderBy('fecha_adquisicion', 'desc')->paginate(25);
        return view('/camillas/index', ['camillas' => $camillas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Camilla $camilla)
    {
        $celadors = Celador::all();
        $tipo_camillas = TipoCamilla::all();
        return view('camillas/create', [ 'camilla' => $camilla, 'tipo_camillas' => $tipo_camillas, 'celadors' => $celadors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCamillaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'precio' => 'required|numeric',
            'fecha_adquisicion' => 'required|date',
            'tipo_camilla_id' => 'required|exists:tipo_camillas,id',
            'paciente_id' => 'nullable',
        ]);
        $camillaData = $request->all();
        $camillaData['paciente_id'] = isset($camillaData['paciente_id']) ? $camillaData['paciente_id'] : null;
        $camilla = new Camilla($camillaData);
        $camilla->save();
        session()->flash('success', 'Camilla creada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('camillas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Camilla  $camilla
     * @return \Illuminate\Http\Response
     */
    public function show(Camilla $camilla)
    {
        $tipo_camillas = TipoCamilla::all();
        return view('camillas/show', ['camilla' => $camilla, 'tipo_camillas' => $tipo_camillas]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camilla  $camilla
     * @return \Illuminate\Http\Response
     */
    public function edit(Camilla $camilla)
    {
        $celadors = Celador::all();
        $pacientes = Paciente::all();
        $tipo_camillas = TipoCamilla::all();
        if(Auth::user()->tipo_usuario_id == 2) {
            return view('camillas/edit', ['tipo_camillas' => $tipo_camillas, 'celadors' => Auth::user()->celadors, 'camilla' => $camilla, 'pacientes' => $pacientes]);
        }
        return view('camillas/edit', ['tipo_camillas' => $tipo_camillas, 'celadors' => $celadors, 'camilla' => $camilla, 'pacientes' => $pacientes]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCamillaRequest  $request
     * @param  \App\Models\Camilla  $camilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Camilla $camilla)
    {
        $this->validate($request, [
            'precio' => 'required|numeric',
            'fecha_adquisicion' => 'required|date',
            'tipo_camilla_id' => 'required|exists:tipo_camillas,id',
            'paciente_id' => 'nullable',
        ]);
        $camilla->fill($request->all());
        $camilla->save();
        session()->flash('success', 'Camilla modificada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('camillas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Camilla  $camilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(Camilla $camilla)
    {
        if($camilla->delete()) {
            session()->flash('success', 'Camilla borrada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'No pudo borrarse la camilla.');
        }
        return redirect()->route('camillas.index');
    }
}
