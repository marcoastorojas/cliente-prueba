<!-- Modal -->
<div wire:ignore.self class="modal fade" id="updateModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Promoción</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <input type="hidden" wire:model="selected_id">
                    <div class="row">
                        @if (Auth()->user()->rol == 2)
                            <div class="form-group col-md-6">
                                <label for="locale_id"></label>
                                <input value="{{$local->titulo}}" type="text" class="form-control"
                                    placeholder="Locale Id" readonly>
                                
                            </div>

                        @else
                            <div class="form-group col-md-6">
                                <label for="locale_id"></label>
                                {{-- <input wire:model="locale_id" type="text" class="form-control" id="locale_id"
                                    placeholder="Locale Id"> --}}
                                <select name="" id="" wire:model="locale_id" class="form-control">
                                    <option value="">seleccione</option>
                                    @foreach ($locales as $item)
                                    <option value="{{$item->id}}">{{$item->titulo}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                        @endif
                        
                        <div class="form-group col-md-6">
                            <label for="titulo"></label>
                            <input wire:model="titulo" type="text" class="form-control" id="titulo"
                                placeholder="Titulo">
                            @error('titulo')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label for="file"></label>
                        <input wire:model="file" type="file" class="form-control" id="file" placeholder="File">
                        @error('file')
                            <span class="error text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if (Auth()->user()->rol == 1)    
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fechaini">Fecha inicio (principal)</label>
                            <input wire:model="fechaini" type="date" class="form-control" id="fechaini"
                                placeholder="Fechaini">
                            @error('fechaini')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="fechafin">Fecha fin (principal)</label>
                            <input wire:model="fechafin" type="date" class="form-control" id="fechafin"
                                placeholder="Fechafin">
                            @error('fechafin')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    @endif
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="lclfechaini">Fecha inicio (negocio)</label>
                            <input wire:model="lclfechaini" type="date" class="form-control" id="lclfechaini"
                                placeholder="Lclfechaini">
                            @error('lclfechaini')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="lclfechafin">Fecha fin (negocio)</label>
                            <input wire:model="lclfechafin" type="date" class="form-control" id="lclfechafin"
                                placeholder="Lclfechafin">
                            @error('lclfechafin')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
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
