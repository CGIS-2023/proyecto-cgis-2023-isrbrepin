<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Http\Request;

class PersonaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Persona::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        //dd($request->all()); // Para ver que nos retorna request desde portman
        $persona = new Persona;
        $persona -> nombre = $request-> nombre;
        $persona -> apellido = $request-> apellido;
        $persona -> fecha_nacimiento = $request-> fecha_nacimiento;
        $persona ->save();
        return $persona;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function show(Persona $persona)
    {
        return $persona;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Persona $persona)
    {
        $request->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
        ]);

        //dd($request->all()); // Para ver que nos retorna request desde portman
        $persona -> nombre = $request-> nombre;
        $persona -> apellido = $request-> apellido;
        $persona -> fecha_nacimiento = $request-> fecha_nacimiento;
        $persona ->update();
        return $persona;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Persona  $persona
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::find($id);

        if(is_null($persona))
        {
            return response()->json('No se pudo realizar la operación correctamente', 404);
        }

        $persona -> delete();
        return response()->noContent();
    }
}
