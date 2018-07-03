<?php

namespace App\Http\Controllers;

use App\Models\Corrida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CorridaController extends Controller
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
        return view('corridas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //'origem', 'destino', 'data', 'hora', 'volume', 'peso', 'fragil'
        $corrida = new Corrida;
        $corrida->origem = $request->origem;
        $corrida->destino = $request->destino;
        $corrida->data = $request->data;
        $corrida->hora = $request->hora;
        $corrida->volume = $request->volume;
        $corrida->peso = $request->peso;
        $request->fragil? $corrida->fragil = true: $corrida->fragil = false;
        $corrida->passageiro_id = Auth::user()->id;
        $corrida->save();
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Corrida  $corrida
     * @return \Illuminate\Http\Response
     */
    public function show(Corrida $corrida)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corrida  $corrida
     * @return \Illuminate\Http\Response
     */
    public function edit(Corrida $corrida)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Corrida  $corrida
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Corrida $corrida)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corrida  $corrida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corrida $corrida)
    {
        //
    }
}
