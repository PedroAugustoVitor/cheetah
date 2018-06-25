@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
                <h1 class="display-4">Bem-vindo</h1>
                <p class="lead">Agora, escolha qual módulo deseja visitar de acordo com sua sua necessidade.</p>
            </div>
            <div class="container">
                <div class="card-deck mb-3 text-center">
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Parceiros</h4>
                        </div>
                        <div class="card-body">
                            <img class="card-img-top" src="{{ asset('img/driver.png') }}" alt="Card image" >
                            <h1 class="card-title pricing-card-title">120 viagens <small class="text-muted">/ dia</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Cargas selecionadas</li>
                                <li>Valor do frete calculado automaticamente</li>
                                <li>Contato direto com o cliente</li>
                                <li>Clientes selecionados</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-outline-primary">Cemeçar</button>
                        </div>
                    </div>
                    <div class="card mb-4 box-shadow">
                        <div class="card-header">
                            <h4 class="my-0 font-weight-normal">Passageiro</h4>
                        </div>
                        <div class="card-body">
                            <img class="card-img-top" src="{{ asset('img/client.png') }}" alt="Card image">
                            <h1 class="card-title pricing-card-title">50 <small class="text-muted">motoristas disponíveis</small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Segurança</li>
                                <li>Rapidez</li>
                                <li>Preços justos</li>
                                <li>Todos os tipos de carga</li>
                            </ul>
                            <button type="button" class="btn btn-lg btn-block btn-primary">Começar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
