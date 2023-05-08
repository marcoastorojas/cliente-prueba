<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detalles de Premios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                {{-- <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="form-group">
                        <label for="titulo"></label>
                        <input wire:model="titulo" type="text" class="form-control" id="titulo"
                            placeholder="Titulo">@error('titulo') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="descripcion"></label>
                        <input wire:model="descripcion" type="text" class="form-control" id="descripcion"
                            placeholder="Descripcion">@error('descripcion') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="direccion"></label>
                        <input wire:model="direccion" type="text" class="form-control" id="direccion"
                            placeholder="Direccion">@error('direccion') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="ciudad"></label>
                        <input wire:model="ciudad" type="text" class="form-control" id="ciudad"
                            placeholder="Ciudad">@error('ciudad') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="celular"></label>
                        <input wire:model="celular" type="text" class="form-control" id="celular"
                            placeholder="Celular">@error('celular') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="user_id"></label>
                        <select class="form-control" id="user_id" wire:model="user_id">
                            <option value=""> Seleccione </option>
                            @foreach ($users as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tipe_id"></label>
                        <select class="form-control" id="tipe_id" wire:model="tipe_id">
                            <option value=""> Seleccione </option>
                            @foreach ($tipos as $item)
                                <option value="{{ $item->id }}">{{ $item->tipos }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="config_punto"></label>
                        <input wire:model="config_punto" type="text" class="form-control" id="config_punto"
                            placeholder="Config Punto">@error('config_punto') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="config_monto"></label>
                        <input wire:model="config_monto" type="text" class="form-control" id="config_monto"
                            placeholder="Config Monto">@error('config_monto') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="estado"></label>
                        <input wire:model="estado" type="text" class="form-control" id="estado"
                            placeholder="Estado">@error('estado') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form> --}}
                
                <div class="alert alert-primary" role="alert">
                    {{-- <div class="modal-body" {{ $id_persona == '' ? 'hidden' : '' }}> --}}
                        
                        @foreach ($redenciones as $reden)
                            <div>
                                <label for="">{{ $reden->titulo }} <b>{{ $reden->puntos }} Puntos</b> </label>
                                {{-- <div class="progress">
                                    <div class="progress-bar {{ $totpunto > $reden->puntos ? 'bg-success' : 'bg-warning' }}"
                                        role="progressbar" style="width: {{ ($totpunto / $reden->puntos) * 100 }}%;"
                                        aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                        {{ $totpunto >= $reden->puntos ? 'Completado' : ($totpunto / $reden->puntos) * 100 . '%' }}
                                    </div>
                                </div> --}}
                            </div>
                        @endforeach
                    {{-- </div> --}}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary"
                    data-dismiss="modal">Save</button>
            </div>
        </div>
    </div>
</div>
