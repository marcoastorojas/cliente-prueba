@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.navbar')
        <!-- End Navbar -->
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row">

                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header mx-4 p-3 text-center">
                                            <div
                                                class="icon icon-shape icon-lg bg-gradient-primary shadow text-center border-radius-lg">
                                                @if ($local->logo)
                                                    <img src="{{ asset('img/' . $local->logo) }}" alt="profile_image"
                                                        class="w-100 border-radius-lg shadow-sm">
                                                @else
                                                    <i class="fas fa-landmark opacity-10"></i>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card-body pt-0 p-3 text-center">
                                            <h6 class="text-center mb-0">{{ $local->titulo }}</h6>
                                            <hr class="horizontal dark my-3">
                                            <span class="text-xs">Total Puntos Actuales:</span>
                                            <h5 class="mb-0"> {{ round($localperson->totpuntos, 0) }}</h5>
                                        </div>

                                    </div>
                                </div>

                            </div>
                            <small class="d-block text-right mt-3">
                                <a href="{{ route('home') }}"><i class="fas fa-arrow-circle-left"></i> Regresar</a>
                            </small>
                        </div>
                        <div class="col-md-12 mb-lg-0 mb-4">
                            <div class="card mt-4">
                                <div class="col-12">
                                    <div class="card mb-4">
                                        <div class="card-header pb-0">
                                            <h6>Recompensas</h6>
                                        </div>
                                        <div class=" mb-4 card-header pb-0" {{ $local->restriccion ? '' : 'hidden' }}>
                                            <i class="fas fa-info-circle"
                                                style="color: orange"></i>{{ $local->restriccion }}
                                        </div>
                                        <div class="card-body px-0 pt-0 pb-2">
                                            <div class="table-responsive p-0">
                                                <table class="table align-items-center justify-content-center mb-0">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Puntos</th>
                                                            <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                                Premios</th>
                                                            {{-- <th
                                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                                Avance</th> --}}

                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($local->redenciones as $reden)
                                                            <tr>
                                                                <td>
                                                                    <div>
                                                                        @if ($reden->foto)
                                                                            <img src="{{ asset('img/' . $reden->foto) }}"
                                                                                alt="profile_image"
                                                                                class="w-20 border-radius-sm avatar-sm me-2">
                                                                        @else
                                                                            <img src="{{ asset('back/assets/img/small-logos/producto.svg') }}"
                                                                                class="avatar avatar-sm me-2"
                                                                                alt="spotify">
                                                                        @endif

                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <p class="text-sm font-weight-bold mb-0">
                                                                        Por <b>{{ $reden->puntos }}</b> Pts.</p>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex px-2">
                                                                        
                                                                        <div class="my-auto">
                                                                            <h6 class="mb-0 text-sm">
                                                                                {{ $reden->titulo }}</h6>
                                                                            <div class="d-flex align-items-center">
                                                                                <span
                                                                                    class="me-2 text-xs font-weight-bold">{{ $localperson->totpuntos >= $reden->puntos ? '100%' : round(($localperson->totpuntos / $reden->puntos) * 100) . '%' }}</span>
                                                                                <div>
                                                                                    <div class="progress">
                                                                                        <div class="progress-bar {{ $localperson->totpuntos >= $reden->puntos ? 'bg-gradient-success' : 'bg-gradient-info' }}"
                                                                                            role="progressbar"
                                                                                            aria-valuenow="60"
                                                                                            aria-valuemin="0"
                                                                                            aria-valuemax="100"
                                                                                            style="width: {{ ($localperson->totpuntos / $reden->puntos) * 100 }}%;">
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                
                                                                {{-- <td class="align-middle text-center">
                                                                    
                                                                </td> --}}
                                                            </tr>
                                                        @endforeach
                                                        {{-- <tr>
                                                            <td>
                                                                <div class="d-flex px-2">
                                                                    <div>
                                                                        <img src="../assets/img/small-logos/logo-invision.svg"
                                                                            class="avatar avatar-sm rounded-circle me-2"
                                                                            alt="invision">
                                                                    </div>
                                                                    <div class="my-auto">
                                                                        <h6 class="mb-0 text-sm">Invision</h6>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                <p class="text-sm font-weight-bold mb-0">$5,000</p>
                                                            </td>
                                                            <td>
                                                                <span class="text-xs font-weight-bold">done</span>
                                                            </td>
                                                            <td class="align-middle text-center">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-center">
                                                                    <span class="me-2 text-xs font-weight-bold">100%</span>
                                                                    <div>
                                                                        <div class="progress">
                                                                            <div class="progress-bar bg-gradient-success"
                                                                                role="progressbar" aria-valuenow="100"
                                                                                aria-valuemin="0" aria-valuemax="100"
                                                                                style="width: 100%;"></div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td class="align-middle">
                                                                <button class="btn btn-link text-secondary mb-0"
                                                                    aria-haspopup="true" aria-expanded="false">
                                                                    <i class="fa fa-ellipsis-v text-xs"></i>
                                                                </button>
                                                            </td>
                                                        </tr> --}}

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div class=" mb-4 card-header pb-0">
                                        <i class="fas fa-info-circle" style="color: orange"></i>Si
                                        canjea puntos y recibe una recompensa, esos puntos serán descontados según la
                                        recompensa recibida.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card h-100 mb-4">
                        <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Historial</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <small></small>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-4 p-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Ultimos movimientos
                            </h6>
                            <ul class="list-group">
                                @foreach ($movimientos as $item)
                                    <li
                                        class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                        <div class="d-flex align-items-center">
                                            @if ($item->tipopunto == 'A')
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-arrow-up"></i></button>
                                            @else
                                                <button
                                                    class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                                    <i class="fas fa-arrow-down"></i></button>
                                            @endif

                                            <div class="d-flex flex-column">
                                                <h6 class="mb-1 text-dark text-sm">
                                                    {{ $item->tipopunto == 'A' ? 'Acumulado' : 'Canjeado' }}</h6>
                                                <span class="text-xs">{{ $item->created_at->format('d-m-Y h:i A') }}</span>
                                            </div>
                                        </div>

                                        @if ($item->tipopunto == 'A')
                                            <div
                                                class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                                + {{ $item->puntos }}
                                            </div>
                                        @else
                                            <div
                                                class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                                - {{ $item->puntos }}
                                            </div>
                                        @endif
                                    </li>
                                @endforeach
                                {{-- <li
                                    class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                    <div class="d-flex align-items-center">
                                        <button
                                            class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center"><i
                                                class="fas fa-arrow-up"></i></button>
                                        <div class="d-flex flex-column">
                                            <h6 class="mb-1 text-dark text-sm">Apple</h6>
                                            <span class="text-xs">27 March 2020, at 04:30 AM</span>
                                        </div>
                                    </div>
                                    <div
                                        class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                        + $ 2,000
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @include('layouts.footer')
        </div>


    </main>
    @include('layouts.theme')
@endsection
