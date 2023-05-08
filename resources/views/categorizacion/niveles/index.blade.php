@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div class="float-left">
                                    <h4>Listado de recompensas</h4>
                                </div>

                                <a class="text-secondary" id="save" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-attr="{{ route('recompensas.store', '1') }}">
                                    <i class="fas fa-edit text-gray-300"></i>
                                </a>

                            </div>
                        </div>
                        <div class="card-header">
                            <input wire:model.keydown.lazy="keyWord" type="text" class="form-control" name="search"
                                id="search" placeholder="Buscar por Nombres o DNI">
                        </div>

                        <div class="card-body">
                            <div class="row">
                                @foreach ($datos as $item)
                                    <div class="col-md-4">

                                        <div class="card">
                                            <img style="width: 100%;min-height: 200px;object-fit: contain;"
                                                src="{{ asset('img/' . $item->images) }}"
                                                onerror="this.onerror=null;this.src='https://clientevip.pe/back/assets/img/logo-cv3.png';"
                                                class="card-img-top" alt="...">
                                            <div class="card-body" style="max-height : 200px">
                                                <h5 class="card-title">{{ $item->titulo }}</h5>
                                                <p class="card-text">{{ $item->descripcion }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <div class="modal fade" id="modAddRecompensa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmRecompensa" name="productForm" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="titulo" name="titulo"
                                    placeholder="Enter Title" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">image</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripcion</label>
                            <div class="col-sm-12">
                                <textarea id="descripcion" name="descripcion" required placeholder="Enter Descripcion" class="form-control"></textarea>
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" value="create">Save changes
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        let frmRecompensa = document.querySelector("#frmRecompensa");

        var myModal = new bootstrap.Modal(document.getElementById('modAddRecompensa'), options)


        frmRecompensa.addEventListener('submit', (e) => {
            e.preventDefault();

            let url = '{{ route('recompensas.updatePhoto') }}';

            fetch(url, {
                method: 'POST',
                body: new FormData(frm)
            });
        })
    </script>
@endsection
