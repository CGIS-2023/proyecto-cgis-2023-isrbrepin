<?php

namespace App\Http\Controllers;

use App\Models\TipoCamilla;
use Illuminate\Http\Request;

class TipoCamillaController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(TipoCamilla::class, 'tipo_camilla');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipo_camillas = TipoCamilla::paginate(25);
        return view('/tipo_camillas/index', ['tipo_camillas' => $tipo_camillas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tipo_camillas/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoCamillaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'tipo' => 'required|string|max:255',
        ], [
            'tipo.required' => 'El tipo de camilla es obligatorio',
        ]);
        $tipo_camilla = new TipoCamilla($request->all());
        $tipo_camilla->save();
        session()->flash('success', 'Tipo de camilla creado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('tipo_camillas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Http\Response
     */
    public function show(Request $tipo_camilla)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoCamilla $tipoCamilla)
    {
        return view('tipo_camillas/edit', ['tipo_camilla' => $tipoCamilla]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoCamillaRequest  $request
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoCamilla $tipo_camilla)
    {
        $this->validate($request, [
            'tipo' => 'required|string|max:255',
        ], [
            'tipo.required' => 'El tipo de camilla es obligatorio',
        ]);
        $tipo_camilla->fill($request->all());
        $tipo_camilla->save();
        session()->flash('success', 'Tipo camilla modificado correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        return redirect()->route('tipo_camillas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCamilla $tipo_camilla)
    {
        if($tipo_camilla->delete()) {
            session()->flash('success', 'Tipo de camilla borrada correctamente. Si nos da tiempo haremos este mensaje internacionalizable y parametrizable');
        }
        else{
            session()->flash('warning', 'No pudo borrarse el tipo de camilla.');
        }
        return redirect()->route('tipo_camillas.index');
    }
}
