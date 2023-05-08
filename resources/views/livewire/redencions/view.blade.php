@section('title', __('Redencions'))
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4>RECOMPENSAS </h4>
                        </div>

                        @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                        @endif
                        
                        <div class="btn btn-sm btn-warning" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i> Añadir
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <input wire:model.lazy='keyWord' type="text" class="form-control" name="search" id="search"
                        placeholder="Busar redencion">
                </div>

                <div class="card-body">
                    @include('livewire.redencions.create')
                    @include('livewire.redencions.update')
                    <div class="table-responsive">
                        <table class="table table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    {{-- <th>Nivel</th> --}}
                                    <th>Titulo Recompensa</th>
                                    <th>Puntos</th>
                                    <th>Foto</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($redencions as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        {{-- <td>{{ $row->techo }}</td> --}}
                                        <td>{{ $row->titulo }}</td>
                                        <td>{{ $row->puntos }}</td>
                                        <td>
                                            @if ($row->foto)
                                                <img src="{{ asset('img/' . $row->foto) }}" width="15%">
                                            @else
                                            @endif
                                        </td>
                                        <td>
                                            @if ($row->estado == 1) Activo
                                            @else
                                                Inactivo
                                            @endif
                                        </td>
                                        <td width="90">
                                            @if (date('Y-m-d') >= $row->modificar)
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-warning btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Opciones
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a data-toggle="modal" data-target="#updateModal"
                                                        class="dropdown-item" wire:click="edit({{ $row->id }})"><i
                                                            class="fa fa-edit"></i> Editar </a>
                                                    <a class="dropdown-item"
                                                        onclick="confirm('Deseas eliminar?')||event.stopImmediatePropagation()"
                                                        wire:click="destroy({{ $row->id }})"><i
                                                            class="fa fa-trash"></i> Eliminar </a>
                                                </div>
                                            </div>
                                            @else
                                            Se habilitará el {{date('d/m/Y', strtotime($row->modificar))}}
                                            @endif
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $redencions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
