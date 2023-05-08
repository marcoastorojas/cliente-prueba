<!-- Modal -->
<div wire:ignore.self class="modal fade" id="exampleModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registra Nuevo Cliente</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true close-btn">×</span>
                </button> --}}
            </div>
            <div class="modal-body">
                <form>
                    <div class="input-group input-group-alternative mb-3">
                        {{-- <label for="dni">DNI</label> --}}
                        <input wire:model.defer="dnitemp" type="text" class="form-control" id="dni"
                            wire:keydown.enter.prevent="consultareniec" placeholder="DNI" maxlength="8">
                        <span class="input-group-text">
                            <button class="btn-sm btn-secondary" wire:click="consultareniec" type="button"
                                style="padding: 0.5rem 1rem !important;"><i class="fas fa-search"></i></button>
                        </span>
                    </div>
                    @error('dni') <span class="error text-danger">{{ $message }}</span> @enderror <br>
                    @if ($estadobusqueda)
                        @if ($estadobusqueda == true)
                            <small style="color: green;">Busqueda finalizada.</small>
                        @else
                            <small style="color: red;">DNI incorrecto, no se encontró datos en la RENIEC.</small>
                        @endif
                    @endif
                    {{-- <div wire:loading.remove>
                        Hide Me While Loading...
                    </div> --}}
                    <div class="form-group">
                        <label for="nombresape">Nombres y Apellidos</label>
                        <p>{{ $nombres_completo }} </p>
                        {{-- <input wire:model.defer="nombres_completo" type="text" class="form-control" id="nombresape"
                            placeholder="Nombres y Apellidos" disabled>@error('nombres_completo') <span
                            class="error text-danger">{{ $message }}</span> @enderror --}}
                    </div>

                    <div class="form-group">
                        <label for="celulartemp">Nro Celular</label>
                        <input wire:model.defer="celulartemp" type="text" class="form-control" id="celulartemp"
                            placeholder="Nro Celular" required>@error('celulartemp') <span
                            class="error text-danger">{{ $message }}</span> @enderror
                    </div>

                    {{-- <div class="form-group">
                <label for="local_id"></label>
                <input wire:model="local_id" type="text" class="form-control" id="local_id" placeholder="Local Id">@error('local_id') <span class="error text-danger">{{ $message }}</span> @enderror
            </div> --}}

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Cerrar</button>
                        <button type="button" wire:click.prevent="registrarcliente()"
                            class="btn btn-primary close-modal">Registrar</button>
                    </div>
                </form>
                <div class="container row d-flex justify-content-center">

                    @if (session()->has('message_register'))
                        <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                            {{ session('message_register') }} </div>
                    @endif
                </div>

                {{-- <button id="button#10">click</button>

                <script>
                    let button = document.getElementById('button#10');

                    button.addEventListener('click', function() {

                        window.livewire.emit('consultareniec', 10);
                        button.classList.toggle('bg-green-500')
                        event.preventDefault()
                    })
                </script> --}}
            </div>
        </div>
    </div>
</div>

{{-- <script>
    // window.livewire.on('closeModal', () => {
    //     $('#delete_confirm').modal('hide');
    // });

    window.livewire.on('closeModal', () => {
        $('.exampleModal').modal('hide');
    });
</script> --}}
