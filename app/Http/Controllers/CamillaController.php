<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Camilla;

class CamillaController extends Controller
{
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
    public function create()
    {
        return view('camillas/create');
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
            'fecha_adquisicion' => 'required|date'
        ]);
        $camilla = new Camilla($request->all());
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
        return view('camillas/show', ['camilla' => $camilla]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Camilla  $camilla
     * @return \Illuminate\Http\Response
     */
    public function edit(Camilla $camilla)
    {
        return view('camillas/edit', ['camilla' => $camilla]);
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
            'fecha_adquisicion' => 'required|date'
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
