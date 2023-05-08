@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
    <div class="container-fluid">

        <main role="main" class="">
            <div class="row">
                <div class="col-lg-6">
                    <div class="my-3 p-3 bg-white rounded shadow-sm">
                        <h6 class="border-bottom border-gray pb-2 mb-0">Hola <strong>{{ Auth::user()->name }}, </strong>
                            Visualiza
                            tus PUNTOS aquí</h6>
    
                        <div class="media text-muted pt-3 alert alert-warning">
                            <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <h3><strong class="text-gray-dark">{{ $local->titulo }}</strong></h3>
                                    <h3><span class="badge badge-success">{{ $localperson->totpuntos }}</span> Puntos</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="" {{ $local->redenciones->count() > 0 ? '' : 'hidden' }} role="alert">
                        <div class="modal-body">
                            @foreach ($local->redenciones as $reden)
                                <div>
                                    <label for="">{{ $reden->titulo }} <b>{{ $reden->puntos }} Puntos</b> </label>
                                    <div class="progress">
                                        <div class="progress-bar {{ $localperson->totpuntos > $reden->puntos ? 'bg-success' : 'bg-info' }}"
                                            role="progressbar"
                                            style="width: {{ ($localperson->totpuntos / $reden->puntos) * 100 }}%;"
                                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                            {{ $localperson->totpuntos >= $reden->puntos ? 'Completado' : ($localperson->totpuntos / $reden->puntos) * 100 . '%' }}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
    
                        </div>
                    </div>
                </div>
                
                

            </div>
            <small class="d-block text-right mt-3">
                <a href="{{ route('home') }}">Regresar</a>
            </small>
            <br>
            <i class="fas fa-info-circle" style="color: orange"></i> Este gráfico muestra sus puntos totales a la fecha. Si
            canjea puntos y recibe una recompensa, esos puntos serán descontados según la recompensa recibida.
        </main>





    </div>
@endsection
