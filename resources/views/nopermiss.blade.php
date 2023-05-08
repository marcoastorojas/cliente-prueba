@extends('layouts.app')

@section('styles')

@endsection


@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg "
        style="width: 100%">
        @include('layouts.navbar')
        <div class="container-fluid" id="app">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card" style="">
                        <div class="px-4 py-5 my-5 text-center">
                            {{-- <img class="d-block mx-auto mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
                            <h1 class="display-5 fw-bold">CLIENTE VIP</h1>
                            <div class="col-lg-6 mx-auto">
                                <p class="lead mb-4">Estimado usuario tenemos un inconveniente, al parecer no tienes permisos o no cuentas con acceso a este modulo.</p>
                                <p>
                                    Para mayor información contáctese con el área de soporte. <br>
                                    <a href="https://wa.me/51952633245?text=Hola, No puedo ingresar a la plataforma *CLIENTE VIP*" target="../" class="btn btn-success btn-sm px-2"> <i class="fa-brands fa-whatsapp"></i> Contactar</a>
                                    <a href="https://clientevip.pe" class="btn btn-secondary btn-sm px-2"> <i class="fa-brands fa-whatsapp"></i> Ir al inicio</a>
                                </p>
                                {{-- <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                    <button type="button" class="btn btn-primary btn-lg px-4 gap-3">Primary button</button>
                                    <button type="button" class="btn btn-outline-secondary btn-lg px-4">Secondary</button>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    @endsection











    

    