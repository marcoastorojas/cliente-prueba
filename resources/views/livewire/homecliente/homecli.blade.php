<div>
    <main role="main" class="container">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            <h6 class="border-bottom border-gray pb-2 mb-0">Hola <strong>{{ Auth::user()->name }}, </strong> Visualiza
                tus PUNTOS aquí</h6>
            {{-- <div class="media text-muted pt-3">
                        <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                            <div class="d-flex justify-content-between align-items-center w-100">
                                <h3><strong class="text-gray-dark">cahcas</strong></h3>
                                <a href="#">Ver Premios</a>
                            </div>
                            <span class="d-block">
                                <h5><span class="badge badge-success">puntos</span> Puntos</h5>
                            </span>
                        </div>
                    </div> --}}
            @include('livewire.homecliente.detalles')

            @foreach ($localperson as $item)
                <div class="media text-muted pt-3">
                    <div class="media-body pb-3 mb-0 small lh-125 border-bottom border-gray">
                        <div class="d-flex justify-content-between align-items-center w-100">
                            <h3><strong class="text-gray-dark">{{ $item->locale->titulo }}</strong></h3>
                            {{-- <a href="#">Ver Premios</a> --}}
                            <a data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $item->id }}, {{ $item->local_id}})"><i
                                    class="fa fa-edit"></i> Ver Premios </a>
                        </div>
                        <span class="d-block">
                            <h5><span class="badge badge-success">{{ $item->totpuntos }}</span> Puntos</h5>
                        </span>
                    </div>
                </div>
            @endforeach
            <small class="d-block text-right mt-3">
                <a href="{{ route('home') }}">Actualizar</a>
            </small>
        </div>
    </main>
</div>
