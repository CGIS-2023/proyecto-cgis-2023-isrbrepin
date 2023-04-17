<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTipoCamillaRequest;
use App\Http\Requests\UpdateTipoCamillaRequest;
use App\Models\TipoCamilla;

class TipoCamillaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTipoCamillaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTipoCamillaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Http\Response
     */
    public function show(TipoCamilla $tipoCamilla)
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTipoCamillaRequest  $request
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTipoCamillaRequest $request, TipoCamilla $tipoCamilla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoCamilla  $tipoCamilla
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCamilla $tipoCamilla)
    {
        //
    }
}
