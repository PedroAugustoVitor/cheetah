@extends('layouts.app')
@section('content')
    <div class="container">
        @if (Session::has('message'))
        	<div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif
        <h3 class="text-center">Veiculos cadastrados</h3>
        <table class="table table-hover table-light">
            <thead class="thead">
                <tr>
                    <th scope="col">Modelo</th>
                    <th scope="col">Cor</th>
                    <th scope="col">Placa</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach (Auth::user()->veiculos as $veiculo)
                <tr>
                    <td><a href="{{url ('veiculos/'.$veiculo->id)}}">{{$veiculo->modelo}}</a></td>
                    <td>{{$veiculo->modelo}}</td>
                    <td>{{$veiculo->placa}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-outline-primary" href="{{ url('veiculos/create') }}">Adicionar Veículo</a>
    </div>
@endsection
