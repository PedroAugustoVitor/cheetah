@extends('layouts.app')

@section('content')
@if (Auth::user()->role === 'motorista')
    <div class="container">
        <h3 class="text-center">Lista de veículos cadastrados</h3>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Capacidade</th>
                </tr>
            </thead>
            
            <tbody>
               
                @foreach (Auth::user()->veiculos as $veiculo)
                <tr>
                    <th scope="row">{{$veiculo->id}}</th>
                    <td>{{$veiculo->placa}}</td>
                    <td>{{$veiculo->modelo}}</td>
                    <td>{{$veiculo->capacidade}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-outline-primary" href="{{ url('veiculos/create') }}">Adicionar Veículo</a>
    </div>
@else
    <div class="container">
        <h3 class="text-center">Veículos disponíveis:</h2>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Modelo</th>
                    <th scope="col">Capacidade</th>
                </tr>
            </thead>
            
            <tbody>
            <tr>
                <th scope="row">1</th>
                <td>ABC-123</td>
                <td>Saveiro</td>
                <td>6M³</td>
            </tr>
            </tbody>
        </table>

@endif
@endsection
