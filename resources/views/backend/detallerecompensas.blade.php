@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        @include('layouts.navbar')
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="card">
                                    <div class="card-header mx-4 p-3 text-center">
                                        <div
                                            class="icon icon-shape icon-lg bg-warning shadow text-center border-radius-lg">
                                            @if ($local->logo)
                                                <img src="{{ asset('img/' . $local->logo) }}" alt="profile_image"
                                                    class="w-100 border-radius-lg shadow-sm">
                                            @else
                                                <i class="fas fa-landmark opacity-10"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="card-body pt-0 p-3 text-center">
                                        <div class="card-header pb-0 p-3 ">
                                            <h6 class="mb-0 ">{{ $local->titulo }}</h6>
                                            <span class="text-xs">{{ $local->descripcion }}</span>
                                            <p class="text-xs">{{ $local->direccion }} <br><b>{{ $local->celular }}</b></p>
                                                @foreach ($local->infolocals as $info)
                                                <p class="text-xs">{{ $info->direccion }} <br> <b>{{ $info->celular }}</b></p>
                                                {{-- <p class="text-xs"></p> --}}
                                                @endforeach
                                        </div>
                                    </div>
                                </div>
                                <div class=" mb-4 card-header pb-0">
                                </div>
                                <div class="card h-100">
                                    <div class=" mb-4 card-header pb-0" {{ $local->restriccion ? '' : 'hidden' }}>
                                        <i class="fas fa-info-circle"
                                            style="color: orange"></i>{{ $local->restriccion }}
                                    </div>
                                    
                                    {{-- <hr class="horizontal dark my-3"> --}}
                                    <div class="card-body p-3">
                                        <ul class="list-group">
                                            @foreach ($recompensas as $item)
                                                <li class="list-group-item border-0 d-flex align-items-center px-0 mb-2">
                                                    <div class="avatar me-3">
                                                        @if ($item->foto)
                                                            <a href="#" class="pop">
                                                                <img src="{{ asset('img/' . $item->foto) }}" alt="kal"
                                                                    class="border-radius-lg shadow">
                                                            </a>
                                                        @else
                                                            <img src="{{ asset('back/assets/img/small-logos/producto.svg') }}"
                                                                class="avatar avatar-sm me-2" alt="spotify">
                                                        @endif
                                                    </div>
                                                    <div
                                                        class="d-flex align-items-start flex-column justify-content-center">
                                                        <p class="mb-0 text-xs">Por <b>{{ $item->puntos }}</b> Puntos</p>
                                                        <h6 class="mb-0 text-sm">Canjea: <b>{{ $item->titulo }}</b></h6>
                                                    </div>
                                                    {{-- <a class="btn btn-link pe-3 ps-0 mb-0 ms-auto"
                                                        href="javascript:;">Reply</a> --}}
                                                </li>
                                            @endforeach

                                        </ul>
                                        <small class="d-block text-right mt-3">
                                            <a href="{{ url('negocios') }}"><i class="fas fa-arrow-circle-left"></i>
                                                Regresar</a>
                                        </small>
                                    </div>
                                    <div class="modal fade" id="imagemodal" tabindex="-1" role="dialog"
                                        aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <img src="" class="imagepreview" style="width: 100%;">
                                                <div class="modal-footer">
                                                    <button type="button" class="btn bg-gradient-secondary"
                                                        data-bs-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </main>
    {{-- @include('layouts.theme') --}}
@endsection
