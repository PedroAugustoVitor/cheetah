@extends('layouts.app')
@section('content')
    {!! $map['js'] !!}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Ver informações da corrida') }}</div>

                    <div class="card-body">
                        {!! $map['html'] !!}
                        @if (Auth::user()->role == 'motorista')
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
                            @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
