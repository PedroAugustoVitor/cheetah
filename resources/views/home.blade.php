@extends('layouts.app')

@section('content')
@if (Auth::user()->role === 'motorista')
    <div class="container">
        <h3 class="text-center">Corridas disponiveis</h3>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Origem</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Passageiro</th>
                    <th scope="col">Data</th>
                </tr>
            </thead>
            
            <tbody>
                @foreach ($corridas as $corrida)
                <tr>
                    <td><a href="{{url ('corridas/'.$corrida->id)}}">{{$corrida->origem}}</a></td>
                    <td>{{$corrida->destino}}</td>
                    <td>{{$corrida->passageiro->name}}</td>
                    <td>{{$corrida->data}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <a class="btn btn-outline-primary" href="{{ url('veiculos/create') }}">Adicionar Veículo</a>
    </div>
@else
    <div class="container">
    
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Agendar corrida</h5>
                <p class="card-text">Para agendar uma corrida, é só clicar no botão abaixo e cadastrar algumas informações.</p>
                <a href="{{ url('corridas/create') }}" class="btn btn-outline-primary">Agendar corrida</a>
            </div>
        </div>
    
        <div class="py-3">
            <h3 class="text-center">Viagens agendadadas:</h2>
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">Origem</th>
                        <th scope="col">Destino</th>
                        <th scope="col">Motorista</th>
                        <th scope="col">Data</th>
                    </tr>
                </thead>
                
                <tbody>
                   
                    @foreach (Auth::user()->corridas as $corrida)
                    <tr>
                        <td><a href="{{url ('corridas/'.$corrida->id)}}">{{$corrida->origem}}</a></td>
                        <td>{{$corrida->destino}}</td>
                        <td>{{$corrida->motorista?$corrida->motorista->name:"Aguardando"}}</td>
                        <td>{{$corrida->data}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endif
@endsection
