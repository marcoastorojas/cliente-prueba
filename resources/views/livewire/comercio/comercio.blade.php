<div>
    <div class=" py-4">
        <div class="row">

            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Configuración del Negocio</h6>
                        {{-- @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                        @endif --}}
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">

                        <div class="container">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="titulo">Negocio</label>
                                        <input wire:model.defer="titulo" type="text" class="form-control"
                                            id="titulo" placeholder="Titulo">
                                        @error('titulo')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="descripcion">Descripción</label>
                                        <input wire:model.defer="descripcion" type="text" class="form-control"
                                            id="descripcion" placeholder="Descripcion">
                                        @error('descripcion')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="direccion">Dirección</label>
                                        <input wire:model.defer="direccion" type="text" class="form-control"
                                            id="direccion" placeholder="Direccion">
                                        @error('direccion')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="celular">Celular</label>
                                        <input wire:model.defer="celular" type="text" class="form-control"
                                            id="celular" placeholder="Celular">
                                        @error('celular')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="correo">Correo negocio</label>
                                        <input wire:model.defer="correo" type="email" class="form-control"
                                            id="correo" placeholder="Correo negocio">
                                        @error('correo')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <hr>
                                <p>Configuracion para la creacion de usuarios</p>
                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="dominio">Dominio</label>
                                        <input wire:model.defer="dominio" type="text" class="form-control"
                                            id="dominio" placeholder="dominio negocio">
                                        @error('dominio')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>



                                <hr>

                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="config_monto">Confir Monto S/</label>
                                        <input wire:model.defer="config_monto" type="text" class="form-control"
                                            id="config_monto" placeholder="Config Monto" readonly>
                                        @error('config_monto')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="config_punto">Config Puntos</label>
                                        <input wire:model.defer="config_punto" type="text" class="form-control"
                                            id="config_punto" placeholder="Config Punto" readonly>
                                        @error('config_punto')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="tipe_id">Tipo Negocio</label>
                                        <select class="form-control" id="tipe_id" wire:model="tipe_id">
                                            <option value=""> Seleccione </option>
                                            @foreach ($tipos as $item)
                                                <option value="{{ $item->id }}">{{ $item->tipos }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-12">
                                        <label for="restriccion">Restricciónes</label>
                                        <input wire:model.defer="restriccion" type="text" class="form-control"
                                            id="restriccion" placeholder="restriccion">
                                        @error('restriccion')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="nombrecatalogo">Carta / Catalogo</label>
                                        <input wire:model.defer="nombrecatalogo" type="text" class="form-control"
                                            id="nombrecatalogo" placeholder="carta o catalogo">
                                        @error('nombrecatalogo')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-8">
                                        <label for="catalogo">Link Carta/Catálogo</label>
                                        <input wire:model.defer="catalogo" type="text" class="form-control"
                                            id="catalogo" placeholder="Link">
                                        @error('catalogo')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-12">
                                        <label for="logo">Logo</label>
                                        <input wire:model.defer="logo" type="file" class="form-control"
                                            id="logo">
                                        @error('logo')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                        <img src="{{ asset('img/' . $logoshow) }}" width="20%">
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="nombresprop">Nombres</label>
                                        <input wire:model.defer="nombresprop" type="text" class="form-control"
                                            id="nombresprop">
                                        @error('nombresprop')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="apellidosprop">Apellidos</label>
                                        <input wire:model.defer="apellidosprop" type="text" class="form-control"
                                            id="apellidosprop">
                                        @error('apellidosprop')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="celularprop">Celular</label>
                                        <input wire:model.defer="celularprop" type="text" class="form-control"
                                            id="celularprop">
                                        @error('celularprop')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="email">Email</label>
                                        <input wire:model.defer="email" type="email" class="form-control"
                                            id="email" placeholder="Email" readonly>
                                        @error('email')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="password">Contraseña Nueva</label>
                                        <input wire:model.defer="password" type="text" class="form-control"
                                            id="password" placeholder="Contraseña">
                                        <small class="text-secondary" style="font-size: 12px">
                                            Mínimo 6 caracteres.
                                        </small>
                                        @error('password')
                                            <span class="error text-danger">{{ $message }}</span>
                                        @enderror

                                        {{-- <input type="password" class="form-control" placeholder="Contraseña"
                                            aria-label="Password" @error('password') is-invalid @enderror"
                                            name="password" minlength="6" required autocomplete="off"> --}}

                                    </div>
                                    {{-- <div class="col-md-4">
                                        <label for="password">Confirmar Contraseña</label>
                                        <input id="password-confirm" type="password" class="form-control"
                                        placeholder="Repita la contraseña" wire:model.defer="password_confirmation" required
                                        autocomplete="new-password">
                                    </div> --}}
                                </div>
                                <br>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="button" wire:click.prevent="update()"
                                            class="btn btn-warning">Actualizar</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
