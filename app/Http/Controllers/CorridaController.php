<?php

namespace App\Http\Controllers;

use App\Models\Corrida;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GMaps;

class CorridaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('corridas.index');
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
        $corrida->fill($request->all());
        $request->fragil? $corrida->fragil = true: $corrida->fragil = false;
        $corrida->passageiro_id = Auth::user()->id;
        $corrida->save();
        session()->flash('message', 'Corrida salva com sucesso.');
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
        $config['center'] = '37.4419, -122.1419';
        $config['zoom'] = 'auto';
        $config['directions'] = TRUE;
        $config['directionsStart'] = $corrida->origem;
        $config['directionsEnd'] = $corrida->destino;
        $config['directionsDivID'] = 'directionsDiv';
        GMaps::initialize($config);
        $map = GMaps::create_map();
        return view('corridas.show', compact ('corrida', 'map'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Corrida  $corrida
     * @return \Illuminate\Http\Response
     */
    public function edit(Corrida $corrida)
    {
        return view('corridas.edit', compact('corrida'));
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
        $corrida->fill($request->all());
        $corrida->fragil == 'on'? $corrida->fragil = true: $corrida->fragil = false;
        $corrida->save();
        session()->flash('message', 'Corrida atualizado com sucesso.');
        return redirect('corridas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corrida  $corrida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corrida $corrida)
    {
        $corrida->delete();
        session()->flash('message', 'Registro apagado com sucesso!');
        return redirect('corridas');
    }
}
