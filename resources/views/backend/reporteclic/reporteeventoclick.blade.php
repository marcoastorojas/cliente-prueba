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
                                                <h4>Reporte de Eventos Clicks (Banners - Whatsapp) </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <table class="table align-items-left table-bordered table-sm">
                                            <thead>
                                                <th>#</th>
                                                <th>Negocio</th>
                                                <th>Clic Banners</th>
                                                <th>Clic Whatsapp</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($locals as $item)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$item->titulo}}</td>
                                                    <td>
                                                        @if ($item->banners)
                                                        {{$item->banners->cant_cli}}
                                                        <a href="{{ url('grafic-clic-banner/'.$item->id) }}" class="btn">
                                                            <i class="fa-solid fa-chart-simple"></i>
                                                        </a>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->whatsapp)
                                                        {{$item->whatsapp->cant_cli}}
                                                        <a href="{{ url('grafic-clic-whatsapp/'.$item->id) }}" class="btn">
                                                            <i class="fa-solid fa-chart-simple"></i>
                                                        </a>
                                                        @endif
                                                    </td>
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
