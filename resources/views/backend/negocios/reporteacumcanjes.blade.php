@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid" id="app">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <div class="float-left">
                                                <h4>Reporte de Acumulaciones y Canjes </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <reporte-acum-canjes></reporte-acum-canjes>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
