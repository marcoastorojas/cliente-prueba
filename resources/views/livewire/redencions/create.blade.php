<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crear Nueva Recompensa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    {{-- <div class="form-group">
                        <label for="techo"></label>
                        <input wire:model.defer="techo" type="text" class="form-control" id="techo"
                            placeholder="Nivel">@error('techo') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="titulo"></label>
                        <input wire:model.defer="titulo" type="text" class="form-control" id="titulo"
                            placeholder="Titulo">@error('titulo') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="puntos"></label>
                        <input wire:model.defer="puntos" type="text" class="form-control" id="puntos"
                            placeholder="Puntos">@error('puntos') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    {{-- <div class="form-group">
                        <label for="costo"></label>
                        <input wire:model.defer="costo" type="text" class="form-control" id="costo"
                            placeholder="Costo">@error('costo') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="precio"></label>
                        <input wire:model.defer="precio" type="text" class="form-control" id="precio"
                            placeholder="Precio">@error('precio') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="foto"></label>
                        <input wire:model.defer="foto" type="file" class="form-control" id="foto">@error('puntos')
                        <span class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado"></label>
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
                    {{-- <div class="form-group">
                <label for="local_id"></label>
                <input wire:model="local_id" type="text" class="form-control" id="local_id" placeholder="Local Id">@error('local_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> --}}

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Guardar</button>
            </div>
        </div>
    </div>
</div>
