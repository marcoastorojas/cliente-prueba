@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <div style="display: flex; justify-content: space-between; align-items: center;">
                                            <div class="float-left">
                                                <h4>Reporte Clientes por Negocio </h4>
                                            </div>

                                            {{-- @if (session()->has('message'))
                                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                                {{ session('message') }} </div>
                                        @endif --}}
                                            {{-- <div>
                                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                                placeholder="Buscar por título">
                                        </div> --}}
                                            {{-- <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                                            <i class="fa fa-plus"></i> Añadir
                                        </div> --}}
                                        </div>
                                    </div>
                                    {{-- <div class="card-header">
                                    <div>
                                        <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                            placeholder="Buscar por título">
                                    </div>
                                </div> --}}

                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table align-items-center mb-0 table-sm">
                                                <thead class="thead">
                                                    <tr>
                                                        {{-- <td></td> --}}
                                                        <td
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            #</td>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Negocio</th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Total clientes</th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Cantidad Recurrentes</th>
                                                        <th
                                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                            Enviar Reporte</th>
                                                        {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Id</th> --}}
                                                        {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Estado</th> --}}
                                                        {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opc</th> --}}
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($locales as $row)
                                                        <tr>
                                                            {{-- <td>
                                                                <a data-target="#login" class=""
                                                                    wire:click="impersonate({{ $row }})"><i
                                                                        class="fas fa-sign-in-alt"></i></a>
                                                            </td> --}}
                                                            <td>
                                                                {{ $loop->iteration }}
                                                                
                                                            </td>
                                                            <td>
                                                                <div class="d-flex px-2 py-1">
                                                                    <div>
                                                                        @if ($row['localcli']['logo'])
                                                                            <img src="{{ asset('img/' . $row['localcli']['logo']) }}"
                                                                                class="avatar avatar-sm me-3" alt="user1">
                                                                        @else
                                                                            <i
                                                                                class="avatar avatar-sm me-3 fas fa-landmark opacity-10"></i>
                                                                        @endif
                                                                    </div>
                                                                    <div class="d-flex flex-column justify-content-center">
                                                                        <h6 class="mb-0 text-sm">{{ $row['localcli']['titulo'] }}</h6>
                                                                        {{-- <p class="text-xs text-secondary mb-0">{{ $row->tipe->tipos }}</p> --}}
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>
                                                                {{-- {{ $row->localcli->cant_cli }} --}}
                                                                {{ $row['localcli']['cant_cli'] }}
                                                                {{-- @foreach ($row->localpersonas as $item)
                                                                    {{$item->cantidad}}
                                                                @endforeach --}}
                                                            </td>
                                                            <td>
                                                                {{$row['cantclirecu']}}
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('userxdianegocio',$row['localcli']['id']) }}" class="btn">
                                                                    <i class="fa-solid fa-chart-simple"></i>
                                                                </a>
                                                                <a href="{{ route('enviarrepo', $row['localcli']['id']) }}" class="btn">
                                                                    <i class="fa-solid fa-paper-plane"></i>
                                                                </a>
                                                            </td>
                                                            {{-- <td>{{ $row->user_id }}</td> --}}
                                                            {{-- <td class="align-middle text-center text-sm">
                                                            @if ($row->estado == 1)
                                                                <span class="badge badge-sm bg-gradient-success">Activo</span>
                                                            @else
                                                                <span class="badge badge-sm bg-gradient-secondary">Inactivo</span>
                                                            @endif
                                                        </td> --}}
                                                            {{-- <td width="90">
                                                            <div class="btn-group">
                                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                    Opciones
                                                                </button>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <a data-toggle="modal" data-target="#updateModal"
                                                                        class="dropdown-item" wire:click="edit({{ $row->id }})"><i
                                                                            class="fa fa-edit"></i> Edit </a>
                                                                    <a class="dropdown-item"
                                                                        onclick="confirm('Confirm Delete Locale id {{ $row->id }}? \nDeleted Locales cannot be recovered!')||event.stopImmediatePropagation()"
                                                                        wire:click="destroy({{ $row->id }})"><i
                                                                            class="fa fa-trash"></i> Eliminar </a>
                                                                </div>
                                                            </div>
                                                        </td> --}}
                                                    @endforeach
                                                </tbody>
                                            </table>
                                            {{-- {{ $locales->links() }} --}}
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
@endsection
