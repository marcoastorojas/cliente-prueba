<div>
    <div class="container-fluid py-4">
        <div class="row">

            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Perfil</h6>
                        @if (session()->has('message'))
                            <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                {{ session('message') }} </div>
                        @endif
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">

                        <div class="container">
                            <form>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="nombres">Nombres</label>
                                        <input wire:model.defer="nombres" type="text" class="form-control"
                                            id="nombres" placeholder="nombres">@error('nombres') <span
                                                class="error text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label for="apellidos">Apellidos</label>
                                        <input wire:model.defer="apellidos" type="text" class="form-control"
                                            id="apellidos" placeholder="apellidos">@error('apellidos') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="dni">DNI</label>
                                        <input wire:model.defer="dni" type="text" class="form-control" id="dni"
                                            placeholder="dni" readonly>@error('dni') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="celular">Celular</label>
                                        <input wire:model.defer="celular" type="text" class="form-control"
                                            id="celular" placeholder="Celular">@error('celular') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="fechanac">Fecha de nacimiento</label>
                                        <input wire:model.defer="fechanac" type="date" class="form-control"
                                            id="fechanac" placeholder="">@error('fechanac') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </div>

                                </div>
                                <hr>

                                <div class="row">

                                    <div class="col-md-4">
                                        <label for="correo">Email</label>
                                        <input wire:model.defer="correo" type="text" class="form-control" id="correo"
                                            placeholder="correo">@error('correo') <span
                                            class="error text-danger">{{ $message }}</span> @enderror
                                    </div>
                                    <div class="col-md-4">
                                        <label for="password">Contraseña Nueva</label>
                                        <input wire:model.defer="password" type="text" class="form-control"
                                            id="password" placeholder="Contraseña">
                                            <small class="text-secondary" style="font-size: 12px">
                                                Mínimo 6 caracteres.
                                            </small>
                                            @error('password') <span
                                            class="error text-danger">{{ $message }}</span> @enderror

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
                                            class="btn btn-primary">Actualizar</button>
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
