@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="jumbotron jumbotron-fluid">
            <button type="button" class="btn btn-outline-danger" data-toggle="modal" data-target="#destroyModal">Apagar veículo</button>
            <div class="container">
                <h1 class="display-4">{{$veiculo->modelo}}</h1>
                <p class="lead"><strong>Cor do veículo: </strong>{{$veiculo->cor}}</p>
                <p class="lead"><strong>Placa do veículo: </strong>{{$veiculo->placa}}</p>
                <p class="lead"><strong>Capacidade do veículo: </strong>{{$veiculo->capacidade}}m³</p>
                <p class="lead"><strong>Ano do veículo: </strong>{{$veiculo->ano}}</p>
            </div>
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
                    <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST">
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
