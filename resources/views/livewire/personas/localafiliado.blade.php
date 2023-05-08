<!-- Modal -->
<div wire:ignore.self class="modal fade" id="localafiliadoModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Negocios Afiliados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">NOMBRES:</label> {{ $nombres }}, {{ $apellidos }}<br>
                <label for="">{{ $tipodoc }}:</label> {{ $dni }}
                <br>

                {{-- <label for="">Celular:</label> {{ $celular }} --}}
                <div>
                    <hr>
                    @if ($locales)
                        @foreach ($locales as $item)
                            <li>
                                {{-- <button
                                    onclick="confirm('Se eliminará por completo a {{ $item->locale->titulo }}, estás seguro?')||event.stopImmediatePropagation()"
                                    type="button" wire:click="elminarnegoco({{ $item->id }})"
                                    class="btn btn-link text-danger text-gradient px-3 mb-0"><i
                                        class="fa-solid fa-trash-can"></i> Eliminar
                                </button> | --}}
                                <b>{{ $item->locale->titulo }}</b> - Puntos: {{ $item->totpuntos }}
                            </li>
                        @endforeach
                        @if (count($locales) == 0)
                            <label for="" style="color: red">No hay negocios afiliados</label>
                        @endif
                    @endif
                </div>
                @if (session()->has('message_eliminado'))
                    <div wire:poll.0s> Procesando... </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
                {{-- <button type="button" wire:click.prevent="update()" class="btn btn-primary"
                    data-dismiss="modal">Save</button> --}}
            </div>
        </div>
    </div>
</div>
