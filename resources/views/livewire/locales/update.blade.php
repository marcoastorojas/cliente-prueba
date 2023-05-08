<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Negocio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                          <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#tab1a" type="button" role="tab" aria-controls="home" aria-selected="true">Datos del Negocio</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#tab2a" type="button" role="tab" aria-controls="profile" aria-selected="false">Credenciales del Usuario</button>
                        </li>
                        <li class="nav-item" role="presentation">
                          <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#tab3a" type="button" role="tab" aria-controls="contact" aria-selected="false">Planes/Contrato</button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab1a" role="tabpanel" aria-labelledby="home-tab">
                            <input type="hidden" wire:model="selected_id">
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="ruc">Ruc</label>
                                    <input wire:model.defer="ruc" type="text" class="form-control" id="ruc"
                                        placeholder="Ruc">@error('ruc') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="titulo">Titulo</label>
                                    <input wire:model="titulo" type="text" class="form-control" id="titulo"
                                        placeholder="Titulo">@error('titulo') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="descripcion">Descripción</label>
                                    <input wire:model="descripcion" type="text" class="form-control" id="descripcion"
                                        placeholder="Descripcion">@error('descripcion') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                
                            </div>
        
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="direccion">Dirección</label>
                                    <input wire:model="direccion" type="text" class="form-control" id="direccion"
                                        placeholder="Direccion">@error('direccion') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label for="ciudad"></label>
                                    <input wire:model="ciudad" type="text" class="form-control" id="ciudad"
                                        placeholder="Ciudad">@error('ciudad') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div> --}}
                                <div class="form-group col-md-4">
                                    <label for="ciudad_id">Ciudad</label>
                                    <select class="form-control" id="ciudad_id" wire:model="ciudad_id">
                                        <option value=""> Seleccione </option>
                                        @foreach ($ciudades as $item)
                                            <option value="{{ $item->id }}">{{ $item->ciudad }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="celular"></label>
                                    <input wire:model="celular" type="text" class="form-control" id="celular"
                                        placeholder="Celular">@error('celular') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                {{-- <div class="form-group col-md-4">
                                    <label for="user_id"></label>
                                    <input wire:model="user_id" type="text" class="form-control" id="user_id"
                                        placeholder="User Id">@error('user_id') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                    <select class="form-control" id="user_id" wire:model="user_id">
                                        <option value=""> Seleccione </option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div> --}}
                                
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="tipe_id">Categoría</label>
                                    {{-- <input wire:model="tipe_id" type="text" class="form-control" id="tipe_id" placeholder="Tipe Id">@error('tipe_id') <span class="error text-danger">{{ $message }}</span> @enderror --}}
            
                                    <select class="form-control" id="tipe_id" wire:model="tipe_id">
                                        <option value=""> Seleccione </option>
                                        @foreach ($tipos as $item)
                                            <option value="{{ $item->id }}">{{ $item->tipos }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="orm-group col-md-4">
                                    <label for="config_punto"></label>
                                    <input wire:model="config_punto" type="text" class="form-control" id="config_punto"
                                        placeholder="Config Punto">@error('config_punto') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="orm-group col-md-4">
                                    <label for="config_monto"></label>
                                    <input wire:model="config_monto" type="text" class="form-control" id="config_monto"
                                        placeholder="Config Monto">@error('config_monto') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
        
                            </div>
                            {{-- <div class="form-group">
                                <label for="email">Email</label>
                                <input wire:model.defer="email" type="text" class="form-control" id="email"
                                    placeholder="email">@error('email') <span
                                    class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">Contraseña Nueva</label>
                                <input wire:model.defer="password" type="password" class="form-control" id="password"
                                    placeholder="Contraseña">
                                <small class="text-secondary" style="font-size: 12px">
                                    Mínimo 6 caracteres.
                                </small>
                                @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
        
                            </div> --}}
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="correo">Correo Negocio</label>
                                    <input wire:model.defer="correo" type="correo" class="form-control" id="correo"
                                        placeholder="correo Propietario">@error('correo') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab2a" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="nombresprop"></label>
                                    <input wire:model.defer="nombresprop" type="text" class="form-control" id="nombresprop"
                                        placeholder="Nombres">@error('nombresprop') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="apellidosprop"></label>
                                    <input wire:model.defer="apellidosprop" type="text" class="form-control" id="apellidosprop"
                                        placeholder="Apellidos">@error('apellidosprop') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="celularprop"></label>
                                    <input wire:model.defer="celularprop" type="text" class="form-control" id="celularprop"
                                        placeholder="Celular Propietario">@error('celularprop') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="email">Email</label>
                                    <input wire:model.defer="email" type="text" class="form-control" id="email"
                                        placeholder="email">@error('email') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                        <input wire:model="activepass" value="1" type="checkbox">Cambiar Contraseña
                                </div>
                                @if ($activepass)
                                <div class="form-group col-md-6">
                                    <label for="password">Contraseña Nueva</label>
                                    <input wire:model.defer="password" type="text" class="form-control" id="password"
                                        placeholder="Contraseña" autocomplete="off">
                                    <small class="text-secondary" style="font-size: 12px">
                                        Mínimo 6 caracteres.
                                    </small>
                                    @error('password') <span class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                @endif
                                
                            </div>
                            <div class="form-group">
                                <label for="registro">Registrar Clientes</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio3" wire:model="registro"
                                        value="1" required>
                                    <label for="customRadio3" class="custom-control-label">Activo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio4" wire:model="registro"
                                        value="0" required>
                                    <label for="customRadio4" class="custom-control-label">Inactivo</label>
                                </div>
                                @error('registro') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="comprobante">Registra Comprobantes</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio5" wire:model.lazy="comprobante"
                                        value="1" required>
                                    <label for="customRadio5" class="custom-control-label">Activo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio6" wire:model.lazy="comprobante"
                                        value="0" required>
                                    <label for="customRadio6" class="custom-control-label">Inactivo</label>
                                </div>
                                @error('comprobante') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio3" wire:model="estado"
                                        value="1" required>
                                    <label for="customRadio3" class="custom-control-label">Activo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio4" wire:model="estado"
                                        value="0" required>
                                    <label for="customRadio4" class="custom-control-label">Inactivo</label>
                                </div>
                                @error('estado') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-group">
                                <label for="multipuntos">Multiplica Puntos</label>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio7" wire:model="multipuntos"
                                        value="1" required>
                                    <label for="customRadio7" class="custom-control-label">Activo</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input class="custom-control-input" type="radio" id="customRadio8" wire:model="multipuntos"
                                        value="0" required>
                                    <label for="customRadio8" class="custom-control-label">Inactivo</label>
                                </div>
                                @error('multipuntos') <span class="error text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab3a" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="plane_id">Plan</label>
                                    <select class="form-control" id="plane_id" wire:model.defer="plane_id">
                                        <option value=""> Seleccione </option>
                                        @foreach ($planes as $item)
                                            <option value="{{ $item->id }}">{{ $item->plan }} - {{ $item->tarifa }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="fechapago">Fecha Inicio</label>
                                    <input wire:model.defer="fechapago" type="date" class="form-control" id="fechapago"
                                        placeholder="Nombres">@error('fechapago') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="periodo_id">Periodo</label>
                                    <select class="form-control" id="periodo_id" wire:model.defer="periodo_id">
                                        <option value=""> Seleccione </option>
                                        @foreach ($periodos as $item)
                                            <option value="{{ $item->id }}">{{ $item->periodo }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="tarifa">Tarifa por mes (S/) </label>
                                    <input wire:model.defer="tarifa" type="text" class="form-control"
                                        id="tarifa" >@error('tarifa') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="observaciones">Observaciones</label>
                                    <input wire:model.defer="observaciones" type="text" class="form-control"
                                        id="observaciones" >@error('observaciones') <span
                                        class="error text-danger">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary"
                    data-dismiss="modal">Actualizar</button>
            </div>
        </div>
    </div>
</div>
