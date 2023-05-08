@section('title', __('Localpersonas'))
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4>Clientes </h4>
                        </div>

                        @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                        @endif
                        {{-- <div>
                            <input wire:model.keydown.lazy='keyWord' type="text" class="form-control" name="search"
                                id="search" placeholder="Buscar por Apellido">
                        </div> --}}
                        {{-- <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Add Localpersonas
						</div> --}}
                    </div>
                </div>
                <div class="card-header">
                    <input wire:model.keydown.lazy='keyWord' type="text" class="form-control" name="search"
                        id="search" placeholder="Buscar por Apellidos">
                </div>

                <div class="card-body">
                    @include('livewire.localpersonas.create')
                    @include('livewire.localpersonas.historial')
                    @include('livewire.localpersonas.categoriacliente')
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Puntos</th>
                                    <th>Clientes</th>
                                    <th>DNI</th>
                                    <th>Categoría</th>
                                    {{-- <th>Comercio</th> --}}
                                    <th colspan="2">Opc</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($localpersonas as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }} </td>
                                        <td>
                                            <span class="badge badge-sm bg-gradient-success">{{ $row->totpuntos }}</span>
                                        </td>
                                        <td>{{ $row->apellidos }}, {{ $row->nombres }}</td>
                                        <td>{{ $row->dni }}</td>
                                        <td>
                                            @if ($row->clientecategoria)
                                            {{ $row->clientecategoria['categoria']}}
                                            @endif
                                        </td>
                                        {{-- <td>{{ $row->locale->titulo }}</td> --}}
                                        <td width="90">
                                            <a data-toggle="modal" data-target="#categoriacliente"
                                                        class="dropdown-item" wire:click="getcliente({{ $row }})"><i
                                                            class="fa fa-edit"></i> Categorizar </a>
                                        </td>
                                        <td width="90">
                                            <a data-toggle="modal" data-target="#historialModal" class="btn btn-sm btn-warning"
                                                wire:click="verhistorial({{ $row->id }})"><i class="fa fa-edit"></i>
                                                Ver historial </a>
                                        </td>
                                        {{-- <td width="90">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-info btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Opciones
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a data-toggle="modal" data-target="#updateModal"
                                                        class="dropdown-item" wire:click="edit({{ $row->id }})"><i
                                                            class="fa fa-edit"></i> Editar </a>
                                                    <a class="dropdown-item"
                                                        onclick="confirm('Confirm Delete Localpersona id {{ $row->id }}? \nDeleted Localpersonas cannot be recovered!')||event.stopImmediatePropagation()"
                                                        wire:click="destroy({{ $row->id }})"><i
                                                            class="fa fa-trash"></i> Eliminar </a>
                                                </div>
                                            </div>
                                        </td> --}}
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $localpersonas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
