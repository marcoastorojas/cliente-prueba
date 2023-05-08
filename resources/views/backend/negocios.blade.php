@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.navbar')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header pb-0 px-3">
                            <h6 class="mb-0">Negocios Afiliados</h6><br>
                            {{-- <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                                <div class="input-group">
                                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Buscar por nombre de negocio...">
                                    <button class="btn btn-dark mb-1 px-4 py-3"><i class="fas fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div> --}}
                        </div>
                        <div class="card-body pt-4 p-3">
                            <ul class="list-group">
                                @foreach ($tipolocals as $tipes)
                                    @if (count($tipes->locales) > 0)
                                        <div class="alert alert-dark" role="alert" style="color: white;">
                                            <span class="badge badge-warning">{{ count($tipes->locales) }}</span> |
                                            {{ $tipes->tipos }}
                                        </div>
                                    @endif
                                    @foreach ($tipes->locales as $item)
                                        <li class="list-group-item border-0 d-flex p-2 mb-2 bg-gray-200 border-radius-lg">
                                            <div class="p-2 d-flex flex-column">
                                                <a href="{{ route('recompensas', $item->id) }}">
                                                    <div class="avatar avatar-xl position-relative">

                                                        <img src="{{ asset('img/' . $item->logo) }}" onerror="this.onerror=null;this.src='https://clientevip.pe/back/assets/img/logo-cv3.png';"   alt="profile_image"
                                                            class="w-100 border-radius-lg shadow-sm">
                                                    </div>
                                                </a>
                                                <a href="{{ route('recompensas', $item->id) }}" class="btn btn-white"
                                                    style="color: black;">
                                                    Ver <i class="fas fa-gift"></i>
                                                </a>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="mb-3 text-xl">{{ $item->titulo }}</h6>
                                                {{-- <hr> --}}
                                                <p class="text-xs text-dark ms-sm-0 font-weight-bold">{{ $item->descripcion }}</p>
                                                <span class="mb-2 text-sm"><i class="fa-solid fa-location-dot" style="color: rgb(255, 170, 0)"></i> <span
                                                        class="text-dark font-weight-bold ms-sm-2">{{ $item->direccion }}</span></span>
                                                <span class="mb-2 text-sm"><i class="fa-brands fa-whatsapp text-success"></i> <span
                                                        class="text-dark ms-sm-2 font-weight-bold">{{ $item->celular }}</span></span>

                                                @foreach ($item->infolocals as $info)
                                                    <hr>
                                                    <span class="mb-2 text-sm"><i class="fa-solid fa-location-dot" style="color: rgb(255, 170, 0)"></i> <span
                                                            class="text-dark font-weight-bold ms-sm-2">{{ $info->direccion }}</span></span>
                                                    <span class="mb-2 text-sm"><i class="fa-brands fa-whatsapp text-success"></i> <span
                                                            class="text-dark ms-sm-2 font-weight-bold">{{ $item->celular }}</span></span>
                                                @endforeach
                                                {{-- <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                                    class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Ver
                                                Recompensas</a> --}}


                                            </div>
                                            {{-- <div class="ms-auto text-end">
                                            <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i
                                                class="far fa-trash-alt me-2"></i>Ver Recompensas</a>
                                            <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i
                                                    class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Ver
                                                Recompensas</a>
                                        </div> --}}

                                        </li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                @foreach ($locales as $item)
                                    <div class="col-md-4 mt-md-0 mt-4">
                                        <div class="card">
                                            <div class="card-header mx-4 p-3 text-center">
                                                <div
                                                    class="icon icon-shape icon-lg bg-warning shadow text-center border-radius-lg">
                                                    @if ($item->logo)
                                                        <img src="{{ asset('img/' . $item->logo) }}" alt="profile_image"
                                                            class="w-100 border-radius-lg shadow-sm">
                                                    @else
                                                        <i class="fas fa-landmark opacity-10"></i>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="card-body pt-0 p-3 text-center">
                                                <h6 class="text-center mb-0">{{ $item->titulo }}</h6>
                                                <span class="text-xs">{{ $item->descripcion }}</span>
                                                <p class="text-xs">{{ $item->direccion }}
                                                    <br><b>{{ $item->celular }}</b>
                                                </p>
                                                @foreach ($item->infolocals as $info)
                                                    <p class="text-xs">{{ $info->direccion }} <br>
                                                        <b>{{ $info->celular }}</b>
                                                    </p>
                                                @endforeach
                                                <a href="{{ route('recompensas', $item->id) }}" class="btn btn-warning"
                                                    style="color: black;">
                                                    <i class="fas fa-gift"></i>
                                                    Ver recompensa</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>

            </div> --}}
        </div>
    </main>
    @include('layouts.theme')
@endsection
