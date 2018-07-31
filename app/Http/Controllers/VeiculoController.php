<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'placa' => 'required|formato_placa_de_veiculo'
        ]);
    }
    
    public function index()
    {
        return view('veiculos.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veiculos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $veiculo = new Veiculo;
        $veiculo->user_id = Auth::user()->id;
        $veiculo->placa = $request->placa;
        $veiculo->cor = $request->cor;
        $veiculo->ano = $request->ano;
        $veiculo->modelo = $request->modelo;
        $veiculo->capacidade = $request->capacidade;
        $veiculo->save();
        session()->flash('message', 'Veículo cadastrado com sucesso!');
        return redirect('veiculos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Veiculo $veiculo)
    {
        return view('veiculos.show', compact('veiculo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function edit(Veiculo $veiculo)
    {
        return view('veiculos.edit', compact('veiculo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Veiculo $veiculo)
    {
        $veiculo->fill($request->all());
        $veiculo->save();
        session()->flash('message', 'Veículo atualizado com sucesso.');
        return redirect('veiculos');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Veiculo $veiculo)
    {
        
        $veiculo->delete();
        session()->flash('message', 'Veículo removido com sucesso!');
        return redirect('veiculos');
    }
}
