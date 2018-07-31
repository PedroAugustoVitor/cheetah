@extends('layouts.app')
@section('content')
    <div class="container">
        <h3 class="text-center">Minhas corridas</h3>
        <table class="table table-hover table-light">
            <thead class="thead">
                <tr>
                    <th scope="col">Origem</th>
                    <th scope="col">Destino</th>
                    <th scope="col">Valor</th>
                </tr>
            </thead>

            <tbody>
            @if (Auth::user()->role == 'passageiro')
                @foreach (Auth::user()->corridas as $corrida)
                <tr>
                    <td><a href="{{url ('/corridas/'.$corrida->id)}}">{{$corrida->origem}}</a></td>
                    <td>{{$corrida->destino}}</td>
                    <td>{{$corrida->valor}}</td>
                </tr>
                @endforeach
                @if(Auth::user()->corridas->count() == 0)
                    <p>Você ainda não fez nenhuma corrida.</p>
                @endif
            @else

                @foreach (Auth::user()->entregas as $corrida)
                    <tr>
                        <td><a href="{{url ('/corridas/'.$corrida->id)}}">{{$corrida->origem}}</a></td>
                        <td>{{$corrida->destino}}</td>
                        <td>{{$corrida->valor}}</td>
                    </tr>
                @endforeach
                @if(Auth::user()->entregas->count() == 0)
                    <p>Você ainda não fez nenhuma corrida.</p>
                @endif
            @endif
            </tbody>
        </table>

    </div>
@endsection
