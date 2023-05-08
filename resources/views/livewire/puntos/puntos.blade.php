{{-- <div class="container"> --}}

<div class="content">
    {{-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Añadir Puntos</h5>
        @if (session()->has('message'))
            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                {{ session('message') }} </div>
        @endif
        {!! $no_register !!}
    </div> --}}
    {{-- <div class="nav-wrapper position-relative end-0">
        <ul class="nav nav-fill p-1" role="tablist">
            <li class="nav-item">
                <button type="button" wire:click="acumular()"
                    class="btn bg-gradient-success btn-lg w-95">Acumular</button>
            </li>
            <li class="nav-item">
                <button type="button" wire:click="canjear()" class="btn bg-gradient-danger btn-lg w-95">Canjear</button>
            </li>
        </ul>
    </div> --}}

    @if ($local->titulo == '-' || $local->estado == '0')
        <div style="text-align: center;">
            <br>
            <a href="{{ url('config-comercio') }}" class="btn btn-primary">Configurar Negocio</a>
            <br>
            <p>Solicitar habilitación de cuenta al Administrador.</p>
        </div>
    @else
        <div class="" role="alert">
            <div class="card p-3 {{ $tipopunto == 'A' ? 'bg-gradient-light' : 'bg-gradient-secondary' }}">
                <div class="nav-wrapper position-relative end-0" wire:ignore>
                    <ul class="nav nav-pills nav-fill p-1" role="tablist" style="background: #a39f9f69">
                        
                        @if (Auth::user()->can('negocio_puntos_acumulaciones') || Auth::user()->rol == 2)
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active" data-bs-toggle="tab" href="#profile-tabs-simple"
                                role="tab" aria-controls="profile" aria-selected="true" wire:click="acumular()">
                                <i class="fas fa-arrow-circle-down"></i> ACUMULAR
                            </a>
                        </li>
                        @endif

                        @if (Auth::user()->can('negocio_puntos_canges') || Auth::user()->rol == 2)

                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1" data-bs-toggle="tab" href="#dashboard-tabs-simple"
                                role="tab" aria-controls="dashboard" aria-selected="false" wire:click="canjear()">
                                <i class="fas fa-arrow-circle-up"></i> CANJEAR
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
                {{-- <div class=""> --}}

                <form>
                    <br>
                    <div>
                        <p>
                            <span class="badge bg-gradient-dark">{{ $persona }}</span>
                            <span>{!! $totpuntosss !!}</span>
                            &nbsp;

                            <span class="badge bg-success"
                                {{ $tipopunto == 'A' && $this->puntos > 0 ? '' : 'hidden' }}>+
                                {{ round($this->puntos, 1) }}</span>
                            {{-- <span class="text-info text-sm font-weight-bolder" {{ $tipopunto == 'A' ? '' : 'hidden' }}>+ {{ round($this->puntos, 1) }}</span> --}}
                            {!! $no_register !!}
                        </p>

                    </div>
                    @include('livewire.puntos.create')
                    <div class="input-group input-group-alternative mb-3">

                        {{-- <span class="input-group-text">DNI: </span> --}}
                        <input type="text" wire:model.defer="dni"
                            oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                            maxlength="10" class="form-control" placeholder="DNI o RUT o CE/CPP" aria-label="Buscar por DNI"
                            aria-describedby="button-addon2" wire:keydown.enter.prevent="consultadni">
                            
                        <span class="input-group-text">
                            <button class="btn-sm btn-secondary" wire:click="consultadni" type="button"
                                style="padding: 0.5rem 1rem !important;" id="button-addon2"><i
                                    class="fas fa-search"></i></button>
                            @if ($registro)
                                &nbsp&nbsp
                                <button class="btn-sm btn-secondary" type="button"
                                    style="padding: 0.5rem 1rem !important;" data-toggle="modal"
                                    data-target="#exampleModal" id="button-addon2"><i
                                        class="fas fa-plus"></i></button>

                            @endif
                        </span>
                        

                    </div>
                    <div style="margin-top: -22px">
                        <label for="" class="text-secondary">*Formato RUT (99999999-X)</label>
                    </div>
                    
                    <span>
                    </span>
                    <div class="container row d-flex justify-content-center">

                        @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                        @endif
                    </div>
                    @if ($id_persona != '')
                        <div class="row">



                            @if ($tipopunto == 'C')

                                <div class="form-group col-md-6">
                                    {{-- <label for="puntos"></label> --}}
                                    {{-- <input type="text" value="Puntos: {{round($this->puntos, 1)}}" class="form-control" disabled> --}}
                                    <select wire:model.defer="recompensa" class="form-control">
                                        <option value="">- Seleccione -</option>
                                        @foreach ($local->redenciones as $reden)
                                            <option value="{{ $reden }}"
                                                {{ $totpunto >= $reden->puntos ? '' : 'disabled' }}>
                                                {{ $reden->puntos }} - {{ $reden->titulo }}</option>

                                        @endforeach
                                    </select>
                                    
                                    {{-- <input wire:model.defer="puntos" type="text" class="form-control" id="puntos"
                                        placeholder="Puntos"> --}}
                                    @error('puntos') <span class="error text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif
                            {{-- <div>
                                {{$local->redenciones}}
                            </div> --}}
                            <div class="form-group col-md-4" {{ $tipopunto == 'A' ? '' : 'hidden' }}>
                                {{-- <label for="monto">S/</label> --}}
                                <div class="input-group input-group-alternative mb-4">
                                    <span class="input-group-text">S/ </span>
                                    <input wire:model.lazy="monto" type="number" class="form-control" id="monto"
                                        placeholder="Monto S/ de compra" maxlength="4">
                                </div>
                                @error('monto') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            
                            @if ($comprobante)
                                <div class="form-group col-md-4" {{ $tipopunto == 'A' ? '' : 'hidden' }}>
                                    {{-- <label for="monto">S/</label> --}}
                                    <div class="input-group input-group-alternative mb-4">
                                        {{-- <span class="input-group-text">Nro Comprobante</span> --}}
                                        <input wire:model.lazy="nrocomprobante" type="text" class="form-control" id="nrocomprobante"
                                            placeholder="Nro comprobante">
                                    </div>
                                    @error('nrocomprobante') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            @endif
                            <div class="form-group col-md-4">
                                {{-- <label for="tipopunto"></label> --}}
                                {{-- <input wire:model="tipopunto" type="text" class="form-control" id="tipopunto" placeholder="A o D"> --}}
                                <select wire:model="tipopunto" class="form-control" id="tipopunto" disabled>
                                    <option value="A">Acumular P.</option>
                                    <option value="C">Canjear P.</option>
                                </select>
                                @error('tipopunto') <span class="error text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            @if ($tipopunto == 'C')

                                <div class="form-group col-md-12">
                                    <div style="color:white;">
                                        * IMPORTANTE: el cliente debe presentar su documento de identidad para proceder al canje.
                                    </div>
                                </div>
                            @endif
                        </div>
                        {{-- <div class="form-group" {{ $tipopunto == 'A' ? '' : 'hidden' }}> --}}
                        {{-- <label for="puntos">Puntos: {{ round($this->puntos, 1) }}</label> --}}
                        {{-- <span class="text-info text-sm font-weight-bolder" {{ $tipopunto == 'A' ? '' : 'hidden' }}>+ {{ round($this->puntos, 1) }}</span> --}}
                        {{-- <input type="text" value="Puntos: {{ round($this->puntos, 1) }}" class="form-control"
                                disabled> --}}
                        {{-- <input wire:model.defer="puntos" type="text" class="form-control" id="puntos" disabled
                                placeholder="Puntos">@error('puntos') <span
                                class="error text-danger">{{ $message }}</span> @enderror --}}
                        {{-- </div> --}}

                        <div class="modal-footer">
                            {{-- <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button> --}}
                            <button type="button" wire:click.prevent="store()" wire:loading.attr="disabled"
                                class="btn btn-success"><i class="fas fa-save"></i> Registrar</button>
                        </div>
                    @endif

                </form>

                {{-- </div> --}}
            </div>
        </div>
        <div class="col-md-12 mb-lg-0 mb-4" {{ $id_persona == '' ? 'hidden' : '' }}>
            <div class="card mt-4">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0">
                            <h6>Recompensas</h6>
                        </div>
                        <div class=" mb-4 card-header pb-0" {{ $local->restriccion ? '' : 'hidden' }}>
                            <i class="fas fa-info-circle"
                                style="color: orange"></i>{{ $local->restriccion }}
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center justify-content-center mb-0">
                                    <thead>
                                        <tr>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                Premios</th>
                                            <th
                                                class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                Puntos</th>
                                            {{-- <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                            Avance</th> --}}

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($local->redenciones as $reden)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2">
                                                        <div>
                                                            <img src="{{ asset('back/assets/img/small-logos/regalo.svg') }}"
                                                                class="avatar avatar-sm me-2" alt="spotify">
                                                        </div>
                                                        <div class="my-auto">
                                                            <h6 class="mb-0 text-sm">
                                                                {{ $reden->titulo }}</h6>
                                                            <div class="d-flex align-items-center">
                                                                <span
                                                                    class="me-2 text-xs font-weight-bold">{{ $totpunto >= $reden->puntos ? '100%' : round(($totpunto / $reden->puntos) * 100) . '%' }}</span>
                                                                <div>
                                                                    <div class="progress">
                                                                        <div class="progress-bar {{ $totpunto >= $reden->puntos ? 'bg-gradient-success' : 'bg-gradient-info' }}"
                                                                            role="progressbar" aria-valuenow="60"
                                                                            aria-valuemin="0" aria-valuemax="100"
                                                                            style="width: {{ ($totpunto / $reden->puntos) * 100 }}%;">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <p class="text-sm font-weight-bold mb-0">
                                                        {{ $reden->puntos }}</p>
                                                </td>
                                                {{-- <td class="align-middle text-center">
                                                <div class="d-flex align-items-center">
                                                    <span
                                                        class="me-2 text-xs font-weight-bold">{{ $totpunto >= $reden->puntos ? '100%' : round(($totpunto / $reden->puntos) * 100) . '%' }}</span>
                                                    <div>
                                                        <div class="progress">
                                                            <div class="progress-bar {{ $totpunto > $reden->puntos ? 'bg-gradient-success' : 'bg-gradient-info' }}"
                                                                role="progressbar" aria-valuenow="60" aria-valuemin="0"
                                                                aria-valuemax="100"
                                                                style="width: {{ ($totpunto / $reden->puntos) * 100 }}%;">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td> --}}
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class=" mb-4 card-header pb-0">
                        <i class="fas fa-info-circle" style="color: orange"></i> Si
                        canjeas puntos y recibe una recompensa, esos puntos serán descontados según la
                        recompensa recibida.
                    </div>
                </div>
            </div>
        </div>
    @endif
    {{-- <div class="badge bg-gradient-secondary" role="alert">
        <div class="modal-body" {{ $id_persona == '' ? 'hidden' : '' }}>
            @foreach ($local->redenciones as $reden)
                <div>
                    <label for="">{{ $reden->titulo }} <b>{{ $reden->puntos }} Puntos</b> </label>
                    <div class="progress">
                        <div class="progress-bar {{ $totpunto > $reden->puntos ? 'bg-success' : 'bg-warning' }}"
                            role="progressbar" style="width: {{ ($totpunto / $reden->puntos) * 100 }}%;"
                            aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                            {{ $totpunto >= $reden->puntos ? 'Completado' : ($totpunto / $reden->puntos) * 100 . '%' }}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div> --}}
</div>

{{-- </div> --}}
