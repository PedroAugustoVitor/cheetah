@extends('layouts.app')
@section('content')
    <link href="{{ asset('css/switch-button.css') }}" rel="stylesheet">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Agendar Corrida') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('corridas.update', $corrida) }}" aria-label="{{ __('Agendar Corrida') }}">
                            @csrf
                            @method('PATCH')
                            <div id="directionsDiv"></div>
                            <div class="form-group row">
                                <label for="origem" class="col-md-4 col-form-label text-md-right">{{ __('Origem') }}</label>

                                <div class="col-md-6">
                                    <input id="origem" type="text" class="form-control{{ $errors->has('origem') ? ' is-invalid' : '' }}" name="origem" value="{{ $corrida->origem }}" required>

                                    @if ($errors->has('origem'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('origem') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="destino" class="col-md-4 col-form-label text-md-right">{{ __('Destino') }}</label>

                                <div class="col-md-6">
                                    <input id="destino" type="text"  class="form-control{{ $errors->has('destino') ? ' is-invalid' : '' }}" name="destino" value="{{ $corrida->destino }}" required>
                                    @if ($errors->has('destino'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('destino') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="data" class="col-md-4 col-form-label text-md-right">{{ __('Data') }}</label>

                                <div class="col-md-6">
                                    <input id="data" type="date" class="form-control{{ $errors->has('data') ? ' is-invalid' : '' }}" name="data" value="{{ $corrida->data }}" required>

                                    @if ($errors->has('data'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('data') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="hora" class="col-md-4 col-form-label text-md-right">{{ __('Hora') }}</label>

                                <div class="col-md-6">
                                    <input id="hora" type="text" class="form-control{{ $errors->has('hora') ? ' is-invalid' : '' }}" name="hora" value="{{ $corrida->hora }}" required>

                                    @if ($errors->has('hora'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('hora') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="volume" class="col-md-4 col-form-label text-md-right">{{ __('Volume') }}</label>

                                <div class="col-md-6">
                                    <input id="volume" type="text" class="form-control{{ $errors->has('volume') ? ' is-invalid' : '' }}" name="volume" value="{{ $corrida->volume }}" required>

                                    @if ($errors->has('volume'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('volume') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="peso" class="col-md-4 col-form-label text-md-right">{{ __('Peso') }}</label>

                                <div class="col-md-6">
                                    <input id="peso" type="text" class="form-control{{ $errors->has('peso') ? ' is-invalid' : '' }}" name="peso" value="{{ $corrida->peso }}" required>

                                    @if ($errors->has('peso'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('peso') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">

                                <label for="fragil" class="col-md-4 col-form-label text-md-right">{{ __('Frágil') }}</label>

                                <div class="col-md-6">
                                    <label class="switch">
                                        <input type="checkbox" id="fragil" name="fragil" {{$corrida->fragil?'checked':'a'}}>
                                        <span class="slider round"></span>
                                    </label>
                                    @if ($errors->has('fragil'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fragil') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <input id="distancia" type="hidden" name="distancia" value="{{ old('distancia') }}" required>
                            <input id="tempo" type="hidden" name="tempo" value="{{ old('tempo') }}" required>
                            <input id="valor" type="hidden" name="valor" value="{{ old('valor') }}" required>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" onclick="updateData()" class="btn btn-primary" data-toggle="modal" data-target="#fecharCorrida" id="btn-finish">
                                        Fechar corrida
                                    </button>
                                </div>
                            </div>
                            <div class="modal fade" id="fecharCorrida" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Confirmar corrida</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <h5 class="card-title">Distância do percurso:</h5>
                                            <p class="card-text" id="percurso">Não calculado</p>
                                            <h5 class="card-title">Duração do percurso:</h5>
                                            <p class="card-text" id="duracao">Não calculado</p>
                                            <h5 class="card-title">Preço:</h5>
                                            <p class="card-text" id="preco">Não calculado</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                            <button type="submit" class="btn btn-outline-primary">
                                                {{ __('Finalizar solicitação') }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB-h1rDFw27LBTrkUerMrMgUwakB2-YmaA&callback=initMap"></script>
@endsection
