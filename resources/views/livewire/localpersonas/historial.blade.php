<!-- Modal -->
<div wire:ignore.self class="modal fade" id="historialModal" data-backdrop="static" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Historial de Puntos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span wire:click.prevent="cancel()" aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-lg-12">
                    <div class="card h-100 mb-4">
                        {{-- <div class="card-header pb-0 px-3">
                            <div class="row">
                                <div class="col-md-6">
                                    <h6 class="mb-0">Historial</h6>
                                </div>
                                <div class="col-md-6 d-flex justify-content-end align-items-center">
                                    <i class="far fa-calendar-alt me-2"></i>
                                    <small></small>
                                </div>
                            </div>
                        </div> --}}
                        <div class="card-body pt-4 p-3">
                            <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Ultimos movimientos
                            </h6>
                            <ul class="list-group">
                                @if ($movimientos)
                                    @foreach ($movimientos as $item)
                                        <li
                                            class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                            <div class="d-flex align-items-center">
                                                @if ($item->tipopunto == 'A')
                                                    <button
                                                        class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                                        <i class="fas fa-arrow-down"></i></button>
                                                @else
                                                    <button
                                                        class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                                        <i class="fas fa-arrow-up"></i></button>
                                                @endif

                                                <div class="d-flex flex-column">
                                                    <h6 class="mb-1 text-dark text-sm">
                                                        {{-- {{ $item->tipopunto == 'A' ? 'Acumulado' : 'Canjeado' }} --}}
                                                        {{ $item->descripcion}} | {{ $item->nrocomprobante}}
                                                    </h6>
                                                    <span class="text-xs">{{ $item->created_at->format('d-m-Y h:i A') }}</span>
                                                </div>
                                            </div>

                                            @if ($item->tipopunto == 'A')
                                                <div
                                                    class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                                    + {{ $item->puntos }}
                                                </div>
                                            @else
                                                <div
                                                    class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                                    - {{ $item->puntos }}
                                                </div>
                                            @endif
                                        </li>
                                    @endforeach

                                @endif

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary"
                    data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
