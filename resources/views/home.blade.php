@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')
    <div class="container-fluid">
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
              <h1 class="display-4">BIENVENIDO/A</h1>
              <p class="lead">Desde hoy, tus consumos te generarán puntos y recompensas en tus lugares y negocios favoritos. </p>
            </div>
          </div>

        <main role="main" class="container alert alert-primary">
            <div class="my-3 p-3 bg-white rounded shadow-sm">
                <h6 class="border-bottom border-gray pb-2 mb-0">Hola <strong>{{ Auth::user()->name }}, </strong> Visualiza
                    tus PUNTOS aquí</h6>
                @foreach ($localperson as $item)
                    <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 large lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <h3><strong class="text-gray-dark">{{ $item->locale->titulo }}</strong></h3>
                                <a href="{{url('inforedencion/'.$item->locale->id)}}">Ver Premios</a>
                            </div>
                            <span class="d-flex justify-content-between align-items-center">
                                <h5><span class="badge badge-success">{{ $item->totpuntos }}</span> Puntos</h5>
                                <div>
                                    @foreach ($item->locale->redenciones as $reden)
                                    @if ($item->totpuntos >= $reden->puntos)
                                    <i class="fas fa-gift" style="color: orange"></i>
                                    @endif
                                    @endforeach
                                </div>
                            </span>
                        </div>
                    </div>
                @endforeach
                <small class="d-block text-right mt-3">
                    <a href="{{ route('home') }}">Actualizar</a>
                </small>
                <i class="fas fa-gift" style="color: orange"></i> Negocios donde ya puedes canjear una recompensa.
            </div>
        </main>
        
    </div>
@endsection
