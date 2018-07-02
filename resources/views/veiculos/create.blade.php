@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Registrar Veículo') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('veiculos.store') }}" aria-label="{{ __('Registrar veículo') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="placa" class="col-md-4 col-form-label text-md-right">{{ __('Placa') }}</label>

                            <div class="col-md-6">
                                <input id="placa" type="text" class="form-control{{ $errors->has('placa') ? ' is-invalid' : '' }}" name="placa" value="{{ old('placa') }}" required autofocus>

                                @if ($errors->has('placa'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('placa') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="cor" class="col-md-4 col-form-label text-md-right">{{ __('Cor') }}</label>

                            <div class="col-md-6">
                                <input id="cor" type="text" class="form-control{{ $errors->has('cor') ? ' is-invalid' : '' }}" name="cor" value="{{ old('cor') }}" required>

                                @if ($errors->has('cor'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('cor') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="ano" class="col-md-4 col-form-label text-md-right">{{ __('Ano') }}</label>

                            <div class="col-md-6">
                                <input id="ano" type="text" class="form-control{{ $errors->has('ano') ? ' is-invalid' : '' }}" name="ano" required>

                                @if ($errors->has('ano'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ano') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="modelo" class="col-md-4 col-form-label text-md-right">{{ __('Modelo') }}</label>

                            <div class="col-md-6">
                                <input id="modelo" type="text" class="form-control" name="modelo" required>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="capacidade" class="col-md-4 col-form-label text-md-right">{{ __('Capacidade') }}</label>

                            <div class="col-md-6">
                                <input id="capacidade" type="text" class="form-control{{ $errors->has('capacidade') ? ' is-invalid' : '' }}" name="capacidade" value="{{ old('capacidade') }}" required>

                                @if ($errors->has('capacidade'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('capacidade') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary">
                                    {{ __('Registrar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
