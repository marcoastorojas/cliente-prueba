@section('title', __('Locales'))
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4>Negocios </h4>
                        </div>

                        @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                        @endif
                        {{-- <div>
                            <input wire:model='keyWord' type="text" class="form-control" name="search" id="search"
                                placeholder="Buscar por título">
                        </div> --}}
                        <div class="btn btn-sm btn-info" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus"></i> Añadir
                        </div>
                    </div>
                </div>
                <div class="card-header">
                    <div class="table-responsive">
                        <table class="table table-secondary table-sm">
                            <thead>
                                <tr>
                                    <th>Ciudad</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($negoxciudad as $item)
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
                        <input wire:model.keydown.lazy='keyWord' type="text" class="form-control" name="search"
                            id="search" placeholder="Buscar por título">
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
                    @include('livewire.locales.create')
                    @include('livewire.locales.update')
                    <div class="table-responsive">
                        <table class="table align-items-center mb-0 table-sm">
                            <thead class="thead">
                                <tr>
                                    <td></td>
                                    <td class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#
                                    </td>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Negocio</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Ciudad</th>
                                    {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Celular</th> --}}
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Fecha Alta</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Fecha Inicio</th>
                                    {{-- <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Id</th> --}}
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Estado</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Opc
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($locales as $row)
                                    <tr>
                                        <td>
                                            <a data-target="#login" class=""
                                                wire:click="impersonate({{ $row }})"><i
                                                    class="fas fa-sign-in-alt"></i></a>
                                        </td>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    @if ($row->logo)
                                                        <img src="{{ asset('img/' . $row->logo) }}"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    @else
                                                        <i class="avatar avatar-sm me-3 fas fa-landmark opacity-10"></i>
                                                    @endif
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $row->titulo }}</h6>
                                                    <p class="text-xs text-secondary mb-0">{{ $row->tipe->tipos }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            {{ $row->ciudade->ciudad }}
                                        </td>
                                        {{-- <td>{{ $row->celular }}</td> --}}
                                        {{-- <td>{{ $row->user_id }}</td> --}}
                                        <td>{{  date('d/m/Y', strtotime($row->created_at)) }}</td>
                                        <td>
                                            @if ($row->localplan)
                                            {{date('d/m/Y', strtotime($row->localplan->fechapago))}}
                                            @endif
                                        </td>
                                        
                                        <td class="align-middle text-center text-sm">
                                            @if ($row->estado == 1)
                                                <span class="badge badge-sm bg-gradient-success">Activo</span>
                                            @else
                                                <span class="badge badge-sm bg-gradient-secondary">Inactivo</span>
                                            @endif
                                        </td>
                                        <td width="90">
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
                                        </td>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $locales->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
