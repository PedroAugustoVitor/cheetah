@extends('layouts.app')
@section('content')
<link href="{{ asset('css/switch-button.css') }}" rel="stylesheet">
{!! $map['js'] !!}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Agendar Corrida') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('corridas.store') }}" aria-label="{{ __('Agendar Corrida') }}">
                        @csrf
                        {!! $map['html'] !!}
                        <div id="directionsDiv"></div>
                        <div class="form-group row">
                            <label for="origem" class="col-md-4 col-form-label text-md-right">{{ __('Origem') }}</label>

                            <div class="col-md-6">
                                <input id="origem" type="text" class="form-control{{ $errors->has('origem') ? ' is-invalid' : '' }}" name="origem" value="{{ old('origem') }}" required>

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
                                <input id="destino" type="text" class="form-control{{ $errors->has('destino') ? ' is-invalid' : '' }}" name="destino" value="{{ old('destino') }}" required>
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
                                <input id="data" type="date" class="form-control{{ $errors->has('data') ? ' is-invalid' : '' }}" name="data" value="{{ old('data') }}" required>

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
                                <input id="hora" type="text" class="form-control{{ $errors->has('hora') ? ' is-invalid' : '' }}" name="hora" value="{{ old('hora') }}" required>

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
                                <input id="volume" type="text" class="form-control{{ $errors->has('volume') ? ' is-invalid' : '' }}" name="volume" value="{{ old('volume') }}" required>

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
                                <input id="peso" type="text" class="form-control{{ $errors->has('peso') ? ' is-invalid' : '' }}" name="peso" value="{{ old('peso') }}" required>

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
                                <!--<checkbox id="fragil" type="text" class="form-control{{ $errors->has('fragil') ? ' is-invalid' : '' }}" name="fragil" value="{{ old('peso') }}" required>-->
                                <label class="switch">
                                    <input type="checkbox" id="fragil" name="fragil" >
                                    <span class="slider round"></span>
                                </label>
                                @if ($errors->has('fragil'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fragil') }}</strong>
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

<script>
    console.log();
</script>
@endsection
