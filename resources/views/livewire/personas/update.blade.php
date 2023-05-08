<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="dni">DNI</label>
                            <input wire:model="dni" type="text" class="form-control" id="dni" placeholder="Dni">
                            @error('dni')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nombres">Nombres</label>
                            <input wire:model="nombres" type="text" class="form-control" id="nombres"
                                placeholder="Nombres">
                            @error('nombres')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apellidos">Apellidos</label>
                            <input wire:model="apellidos" type="text" class="form-control" id="apellidos"
                                placeholder="apellidos">
                            @error('apellidos')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="celular">Celular</label>
                            <input wire:model="celular" type="text" class="form-control" id="celular"
                                placeholder="Celular">
                            @error('celular')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="correo">Correo</label>
                            <input wire:model="correo" type="text" class="form-control" id="correo"
                                placeholder="Correo">
                            @error('correo')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-4">
                            <label for="fechanac">Fecha Nacimiento</label>
                            <input wire:model="fechanac" type="date" class="form-control" id="fechanac"
                                placeholder="Fechanac">
                            @error('fechanac')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="estado">Estado Persona</label>
                            <input wire:model="estado" type="text" class="form-control" id="estado"
                                placeholder="Estado">
                            @error('estado')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-4">
                            <label for="datofake">Para datos falsos o inactivar user (1= activo, 0=inactivo)</label>
                            <input wire:model="datofake" type="text" class="form-control" id="datofake"
                                placeholder="Dato Falso: 0 - 1">
                            @error('datofake')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>


                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary"
                    data-dismiss="modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
