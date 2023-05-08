<!-- Modal -->
<div wire:ignore.self class="modal fade" id="categoriacliente" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Categorizar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    {{-- <div class="form-group">
                        <label for="techo"></label>
                        <input wire:model.defer="techo" type="text" class="form-control" id="techo"
                            placeholder="Techo">@error('techo') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    <div class="form-group">
                        <label for="dni">DNI</label>
                        <input wire:model.defer="dni" type="text" class="form-control" id="dni" readonly>
                    </div>
                    <div class="form-group">
                        <label for="nombres">Cliente</label>
                        <input wire:model.defer="nombres" type="text" class="form-control" id="nombres" readonly>
                    </div>
                    <div class="form-group">
                        <label for="puntos">Puntos</label>
                        <input wire:model.defer="puntos" type="text" class="form-control" id="puntos" readonly>
                    </div>
                    <div class="form-group">
                        <label for="Categoria">Categoria</label>
                        <select name="" id="" wire:model.defer="clientecategoria_id" class="form-control">
                            @if ($clicategorias)    
                                <option value="">-seleccione-</option>
                                @foreach ($clicategorias as $item)
                                    <option value="{{$item->id}}">{{$item->categoria}}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    
                    {{-- <div class="form-group">
                        <label for="precio"></label>
                        <input wire:model.defer="precio" type="text" class="form-control" id="precio"
                            placeholder="Precio">@error('precio') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div> --}}
                    {{-- <div class="form-group">
                <label for="local_id"></label>
                <input wire:model="local_id" type="text" class="form-control" id="local_id" placeholder="Local Id">@error('local_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> --}}

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
                <button type="button" wire:click.prevent="asignarclientecetegoria()" class="btn btn-primary"
                    data-dismiss="modal">Actualizar</button>
            </div>
        </div>
    </div>
</div>
