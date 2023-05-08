@section('title', __('Personas'))
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4>
                                Lista de Clientes en General</h4>
                        </div>
                        {{-- <div wire:poll.60s>
							<code><h5>{{ now()->format('H:i:s') }} UTC</h5></code>
						</div> --}}
                        @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                        @endif

                        {{-- <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
						<i class="fa fa-plus"></i>  Add Personas
						</div> --}}
                    </div>
                </div>
                <div class="card-header">
                    {{-- <input wire:model.keydown.lazy='keyWord' type="text" class="form-control" name="search" id="search"
                        placeholder="Buscar por Nombres o DNI"> --}}
                        
                    <div class="table-responsive">
                        <table class="table table-secondary table-sm">
                            <thead>
                                <tr>
                                    <th>Ciudad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clixciudad as $item)
                                <tr class="">
                                    <td scope="row">
                                        @if ($item->ciudad)
                                        {{$item->ciudad}}
                                        @else
                                        Sin Ciudad (web)
                                        @endif
                                    </td>
                                    <td>{{$item->total}}</td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    <br>
                    <div class="input-group mb-3 ">
                        <input wire:model.keydown.lazy='keyWord' type="text" class="form-control" name="search" id="search"
                        placeholder="Buscar por Nombres o DNI">
                        <select name="" id="" wire:model="selectciudad" class="form-select">
                            <option value="">- Seleccione Ciudad -</option>
                            @foreach ($ciudades as $item)
                                <option value="{{ $item->id }}">{{ $item->ciudad }}</option>
                            @endforeach
                        </select>
                        {{-- <button class="btn btn-outline-secondary mb-0" wire:click="filtrarciudad()" type="button">Filtrar</button> --}}
                    </div>
                    
                </div>

                <div class="card-body">
                    @include('livewire.personas.create')
                    @include('livewire.personas.update')
                    @include('livewire.personas.localafiliado')
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <thead class="thead">
                                <tr>
                                    <td>#</td>
                                    <th>Dni</th>
                                    <th>Nombres</th>
                                    <th>Ciudad</th>
                                    {{-- <th>Celular</th> --}}
                                    <th>Correo</th>
                                    {{-- <th>Fechanac</th> --}}
                                    <th>Fecha Creacion</th>
                                    {{-- <th>Estado</th> --}}
                                    <td>Opciones</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personas as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            {{-- <b>{{ $row->dni }}</b> --}}
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    {{ $row->dni }}
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    style="background-color: rgb(209, 205, 205)">
                                                    <a data-toggle="modal" data-target="#localafiliadoModal"
                                                        class="dropdown-item"
                                                        wire:click="localAfiliado({{ $row->id }})"><i
                                                            class="fa-solid fa-bars-progress"></i> Negocios
                                                        afiliados</a>
                                                    <a data-toggle="modal" data-target="#updateModal"
                                                        class="dropdown-item" wire:click="edit({{ $row->id }})"><i
                                                            class="fa fa-edit"></i> Editar</a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="{{ $row->user->estado==0 ?'text-danger':'' }}"><b>{{ $row->nombres }}, {{ $row->apellidos }}</b>
                                            <br>
                                            {{ $row->tipodoc }}: {{ $row->dni }}
                                        </td>
                                        <td>
                                            @if ($row->ciudade)
                                            {{ $row->ciudade->ciudad }}
                                            @endif
                                        </td>
                                        {{-- <td>{{ $row->celular }}</td> --}}
                                        <td><b><i class="fa-brands fa-whatsapp btn-outline-success"></i> <a href='https://wa.me/{{$row->codpais}}{{$row->celular}}?text=Hola {{ $row->nombres }}, te escribo de *CLIENTE VIP*' target='../' > ({{$row->codpais}}) {{ $row->celular }}</a></b><br>{{ $row->correo }} </td>
                                        <td>{{ $row->created_at }} <br> <b>(EP-{{ $row->estado }})</b> <b class="{{ $row->user->estado==0 ?'text-danger':'text-success' }}">(EU-{{ $row->user->estado }})</b></td>
                                        {{-- <td>{{ $row->fechanac }}</td> --}}
                                        {{-- <td>{{ $row->estado }}</td> --}}
                                        <td width="90">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-dark btn-sm dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Opciones
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right"
                                                    style="background-color: rgb(209, 205, 205)">
                                                    <a data-toggle="modal" data-target="#localafiliadoModal"
                                                        class="dropdown-item"
                                                        wire:click="localAfiliado({{ $row->id }})"><i
                                                            class="fa-solid fa-bars-progress"></i>
                                                        Negocios afiliados</a>
                                                    <a data-toggle="modal" data-target="#updateModal"
                                                        class="dropdown-item"
                                                        wire:click="edit({{ $row->id }})"><i
                                                            class="fa fa-edit"></i> Editar</a>
                                                    {{-- <a class="dropdown-item"
                                                        onclick="confirm('Confirmas eliminar por completo a {{ $row->nombres }}?')||event.stopImmediatePropagation()"
                                                        wire:click="destroy({{ $row->id }})"><i
                                                            class="fa fa-trash"></i> Eliminar </a> --}}
                                                </div>
                                            </div>
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $personas->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
