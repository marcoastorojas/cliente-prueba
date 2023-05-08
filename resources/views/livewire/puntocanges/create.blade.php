<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Añadir Puntos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="dni"></label>
                    <input wire:model="dni" type="text" class="form-control" id="dni" placeholder="dni">
                </div>
                <button type="button" wire:click="consultadni({{ $dni }})"
                    class="btn btn-primary close-modal">buscar</button>

                {{-- @if ($userlocal->count() > 0) --}}
                <br>
                <span>Persona: {{ $persona }}</span> <br>
                <span>Total puntos: {{ $totpuntosss }}</span>
                <span>
                    {{$no_register}}
                </span>
                {{-- @else
            <span>Total puntos:</span>
            @endif --}}
                {{-- {{$localpersona_id}} --}}

                <form>
                    <div class="form-group" hidden>
                        <label for="localpersona_id"></label>
                        <input wire:model="localpersona_id" type="text" class="form-control" id="localpersona_id"
                            placeholder="Localpersona Id">@error('localpersona_id') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group" hidden>
                        <label for="persona_id"></label>
                        <input wire:model="persona_id" type="text" class="form-control" id="persona_id"
                            placeholder="Persona Id">@error('persona_id') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="tipopunto"></label>
                        <input wire:model="tipopunto" type="text" class="form-control" id="tipopunto"
                            placeholder="A o D">@error('tipopunto') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="monto"></label>
                        <input wire:model="monto" type="text" class="form-control" id="monto"
                            placeholder="Monto S/ de compra">@error('monto') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="puntos"></label>
                        <input wire:model="puntos" type="text" class="form-control" id="puntos"
                            placeholder="Puntos">@error('puntos') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
