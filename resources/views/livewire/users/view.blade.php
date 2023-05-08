@section('title', __('Personas'))
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4>
                                Lista de Usuarios Por negocio</h4>
                        </div>
                        {{-- <div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div> --}}
                        @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                        @endif

						<div class="btn btn-sm btn-info" data-toggle="modal" data-target="#userModal">
						<i class="fa fa-plus"></i>  Añadir
						</div>
                    </div>
                </div>
                <div class="card-header">
                    <input wire:model.keydown.lazy='keyWord' type="text" class="form-control" name="search" id="search"
                        placeholder="Buscar por Nombres o DNI">
                </div>

                <div class="card-body">

                    @include('livewire.users.create')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Dni</th>
                                    <th>Nombres</th>
                                    <th>Rol</th>
                                    <th>Correo</th>
                                    {{-- <th>Fechanac</th> --}}
                                    <th>Fecha Creacion</th>
                                    {{-- <th>Estado</th> --}}
                                    <td>Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($usuarios as $use)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $use->dni }}</td>
                                    <td>{{ $use->nombres }}{{ $use->apellidos }}</td>
                                    <td>{{ $use->correo }}</td>
                                    <td>{{ $use->estado }}</td>
                                    <td width="90">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-info btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Actions
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right">
                                        <a data-toggle="modal" data-target="#updateModal" class="dropdown-item" wire:click="edit({{$use->id}})"><i class="fa fa-edit"></i> Edit </a>
                                        <a class="dropdown-item" onclick="confirm('Confirm Delete Tipe id {{$use->id}}? \nDeleted Tipes cannot be recovered!')||event.stopImmediatePropagation()" wire:click="destroy({{$use->id}})">
                                            <i class="fa fa-trash"></i> Delete </a>
                                        </div>
                                    </div>
                                    </td>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $usuarios->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
