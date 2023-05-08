@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="float-left">
                                    <h4>Reporte Clientes con Recompensas por Negocio </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                @foreach (collect($localperonas)->sortByDesc('cantidad') as $row)
                    <div class="accordion" id="accordionExample">
                        <div class="card" style="background-color: rgb(235, 235, 236);">
                            <div class="" id="headingTwo{{$loop->iteration}}">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left collapsed" type="button"
                                        data-toggle="collapse" data-target="#collapseTwo{{ $loop->iteration }}"
                                        aria-expanded="false" aria-controls="collapseTwo" style=" color: #344767 !important;">
                                        {{ $loop->iteration }} -
                                        <b>{{ $row['local']->titulo }} -
                                            ( {{ $row['cantidad'] }} )</b>
                                    </button>
                                </h2>
                            </div>
                            <div id="collapseTwo{{ $loop->iteration }}" class="collapse"
                                aria-labelledby="headingTwo{{$loop->iteration}}" data-parent="#accordionExample">
                                <div class="card-body">
                                    @if ($row['cantidad'] > 0)
                                        <table class="table" border="1">
                                            <thead>
                                                <th>#</th>
                                                <th>Nombres</th>
                                                <th>Apellidos</th>
                                                <th>Correo</th>
                                                <th>Celular</th>
                                                <th>Puntos</th>
                                            </thead>
                                            <tbody>
                                                @foreach ($row['clientes'] as $cli)
                                                    <tr>
                                                        <td>{{ $loop->iteration }}
                                                        </td>
                                                        <td>{{ $cli->nombres }}</td>
                                                        <td>{{ $cli->apellidos }}</td>
                                                        <td>{{ $cli->correo }}</td>
                                                        <td><i class="fa-brands fa-whatsapp btn-outline-success"></i> <a href='https://wa.me/51{{$cli->celular}}?text=Hola {{ $cli->nombres }}, te escribo de *CLIENTE VIP*. Hasta la fecha tienes acumulado un total de *{{ $cli->totpuntos }}* Puntos en *{{ $row['local']->titulo }}* y ya puedes Canjear tus Recompensas. Para más información ingresa a nuestra plataforma Cliente VIP.' target='../' > {{ $cli->celular }}</a></td>
                                                        <td>{{ $cli->totpuntos }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                @endforeach
            </div>
        </div>
    </main>
@endsection
