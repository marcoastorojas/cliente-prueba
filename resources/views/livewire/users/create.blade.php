<!-- Modal -->
<div wire:ignore.self class="modal fade" id="userModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Nuevo Rol a usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
            <div class="row">
                <div class="col-12">
                    <div class="input-group">
                        <input type="text" class="form-control form-control-sm" wire:model='q' type="text" class="form-control" name="user-search" id="user-search"
                        placeholder="Buscar por Nombres o DNI" aria-label="Buscar por Nombres o DNI">
                        <div class="input-group-append">
                          <button wire:click='buscarUsuario' class="btn btn-outline-secondary" type="button">Buscar</button>
                        </div>
                      </div>
                </div>
            </div>
				<form>
                    <div class="form-group">
                        <label for="tipos">Persona</label>
                        {{$salida?->nombres}}
                    </div>
                    <div class="form-group">
                        <label for="tipos">ROLES</label>
                        <select class="form-select">
                            @foreach ( $roles as $rol )
                                <option value="{{$rol->id}}">{{$rol->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="descripcion"></label>
                        <input wire:model="descripcion" type="text" class="form-control" id="descripcion" placeholder="Descripcion">@error('descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
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
