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
        return "index";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $config['center'] = '37.4419, -122.1419';
        $config['zoom'] = 'auto';
        $config['places'] = TRUE;
        $config['placesAutocompleteInputID'] = 'origem';
        $config['placesAutocompleteBoundsMap'] = TRUE; // set results biased towards the maps viewport
        //$config['placesAutocompleteOnChange'] = 'alert(\'You selected a place\');';
        GMaps::initialize($config);
        $map = GMaps::create_map();
        //dd($map);
        return view('corridas.create')->with('map', $map);
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
        $corrida->distancia = $request->distancia;
        $corrida->tempo = $request->tempo;
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
        return view('corridas.edit');
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
        $corrida->save;
        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Corrida  $corrida
     * @return \Illuminate\Http\Response
     */
    public function destroy(Corrida $corrida)
    {
        $corrida->destroy();
    }
}
