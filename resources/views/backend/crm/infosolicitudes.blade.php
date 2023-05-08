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
                                                <h4>Solicitudes de información </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table align-items-left table-bordered table-sm">
                                            <thead>
                                                <th>#</th>
                                                <th>Nombre y Apellidos</th>
                                                <th>Negocios</th>
                                                <th>Categoria</th>
                                                <th>Ciudad</th>
                                                <th>Distrito</th>
                                                <th>Celular</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($listasolicitudes as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->nombres}} {{$item->apellidos}}</td>
                                                    <td>{{$item->negocio}}</td>
                                                    <td>{{$item->tipos}}</td>
                                                    <td>{{$item->ciudad}}</td>
                                                    <td>{{$item->distrito}}</td>
                                                    <td>{{$item->celular}}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
