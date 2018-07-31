@extends('layouts.app')
@section('content')
    {!! $map['js'] !!}
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <div class="offset-8">
                @if (Auth::user()->role == 'passageiro')
                    <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#destroyModal">Cancelar corrida</button>
                    <a href="{{url('corridas/'.$corrida->id.'/edit')}}" class="btn btn-outline-primary">Editar informações</a>
                @elseif (Auth::user()->role == 'motorista' && !$corrida->motorista_id)
                    <form method="POST" action="{{ route('corridas.update', $corrida) }} }}" aria-label="{{ __('Pegar corrida') }}">
                        @csrf
                        @method('PATCH')
                        <input id="motorista_id" type="hidden" name="motorista_id" value="{{Auth::user()->id}}" required>
                        <button type="submit" class="btn btn-outline-success">
                            {{ __('Pegar corrida') }}
                        </button>
                    </form>
                @endif
            </div>

            <div class="container">
                <h1 class="display-4">{{$corrida->destino}}</h1>
                <p class="lead"><strong>Origem da viagem: </strong>{{$corrida->origem}}</p>
                <p class="lead"><strong>Valor da viagem </strong>R$: {{number_format($corrida->valor, 2, ',', ' ')}}</p>
                <p class="lead"><strong>Tempo previsto do percurso: </strong>{{$corrida->tempo}}</p>
                <p class="lead"><strong>Distância calculada: </strong>{{number_format($corrida->distancia/1000, 2, ',', ' ')}} km</p>
                @if ($corrida->motorista)
                    <p class="lead"><strong>Corrida aceita por: </strong>{{$corrida->motorista->name}}</p>
                    <p class="lead"><strong>Telefone: </strong>{{$corrida->motorista->celular}}</p>
                @endif
            </div>
            {!! $map['html'] !!}
            <br>
            @if (Auth::user()->role == 'motorista')
                <div class="container">
                    <p>
                        <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            Visualizar informações de percurso
                        </a>
                    </p>
                    <div class="collapse" id="collapseExample">
                        <div class="card card-body">
                            <div id="directionsDiv"></div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
    <div class="modal fade" id="destroyModal" tabindex="-1" role="dialog" aria-labelledby="destroyModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="destroyModalLabel">Desejar realmente apagar o veículo?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Não será possível reverter essa alteração.</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <form action="{{ route('corridas.destroy', $corrida->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            {{ __('Apagar') }}
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>


@endsection
