@extends('layouts.app')
@section('styles')
    <style>
        .card .card-body {
            padding: 10px 1.5rem !important;
        }

        .card .card-header {
            padding: 10px 1.5rem !important;
        }
    </style>
@endsection
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
                                    <h4>Listado de beneficios por nivel </h4>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="card-body">

                            @foreach ($niveles as $item)
                                <div class="card py-2 m-2">
                                    <div class="card-header" style="display: flex; justify-content: space-between">
                                        <div>

                                            <h5 class="card-title">{{ $item->titulo }}</h5>
                                            <span> desde {{ $item->min_puntos }} puntos  hasta {{ $item->max_puntos }} puntos </span>
                                        </div>

                                        <div>

                                            <button class="btn btn-warning" onclick="editNivel({{ json_encode($item) }})">
                                                Editar
                                            </button>
                                            <button class="btn btn-warning" onclick="addBeneficio({{ $item->id }})">
                                                Agregar
                                            </button>
                                        </div>

                                    </div>
                                    <hr>
                                    <div class="card-body" style="min-height : 200px">
                                        <div class="row">
                                            @foreach ($item->beneficios as $ben)
                                                <div class="col-md-3">
                                                    <div class="card" style="position: relative">
                                                        <img src="{{ asset('img/' . $ben->images) }}" alt=""
                                                            class="card-img-top"
                                                            style="width: 100%;height: 200px;object-fit: cover;">
                                                        <div class=" card-header">
                                                            <strong>
                                                                {{ $ben->titulo }}
                                                            </strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <p>
                                                                {{ $ben->descripcion }}
                                                            </p>
                                                        </div>
                                                        <button class="btn btn-danger"
                                                            style="position: absolute;top : 5px ; right : 5px"
                                                            onclick="eliminarBeneficio({{$ben->id}})">
                                                            eliminar
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            @endforeach

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
                    <h5 class="modal-title" id="exampleModalLabel">Crear Beneficio</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmRecompensa" name="productForm" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="product_id" id="product_id">
                        <input type="hidden" name="categorizacion_nivel_id" id="categorizacion_nivel_id">
                        <div class="form-group">
                            <label for="title" class="col-sm-2 control-label">Titulo</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="titulo" name="titulo"
                                    placeholder="ingresa titulo" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Imagen</label>
                            <div class="col-sm-12">
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Descripción</label>
                            <div class="col-sm-12">
                                <textarea id="descripcion" name="descripcion" required placeholder="ingresa Descripción" class="form-control"></textarea>
                            </div>
                        </div>
 <div class="form-group">
                            <label class="col-sm-2 control-label">Terminos y Condiciones</label>
                            <div class="col-sm-12">
                                <textarea id="tyc" name="tyc" required placeholder="ingresa Descripción" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" value="create">Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modNivel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Editar Nivel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="frmNivel" name="productForm" class="form-horizontal">
                        @csrf
                        <input type="hidden" name="nivel_id" id="nivel_id">
                        <input type="hidden" name="categorizacion_nivel_id" id="categorizacion_nivel_id">
                        <div class="form-group">
                              <p id="titulo_nivel"></p>
                        </div>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Min Puntos</label>
                            <div class="col-sm-12">
                                <input id="min_puntos" name="min_puntos" type="number" class="form-control" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Max Puntos</label>
                            <div class="col-sm-12">
                                <input  id="max_puntos" name="max_puntos" type="number" class="form-control" />
                            </div>
                        </div>

                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-primary" value="create">Guardar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script>
        let frmRecompensa = document.querySelector("#frmRecompensa");
        let frmNivel = document.querySelector("#frmNivel");

        var modRecompensa = new bootstrap.Modal(document.getElementById('modAddRecompensa'))
        var modNivel = new bootstrap.Modal(document.getElementById('modNivel'))


        frmRecompensa.addEventListener('submit', (e) => {
            e.preventDefault();

            let url = '{{ route('beneficios.updatePhoto') }}';

            fetch(url, {
                method: 'POST',
                body: new FormData(frmRecompensa)
            }).then(c => c.json()).then(c => {
                window.location.reload();
            }).catch(err => {
                alert("Lo sentimos ocurrio un error")
            });
        })

        frmNivel.addEventListener('submit', (e) => {
            e.preventDefault();

            let url = '{{ route('niveles.edit') }}';

            fetch(url, {
                method: 'POST',
                body: new FormData(frmNivel)
            }).then(c => c.json()).then(c => {
                window.location.reload();
            }).catch(err => {
                alert("Lo sentimos ocurrio un error")
            });
        })

        function addBeneficio(id) {
            document.querySelector("#categorizacion_nivel_id").value = id;
            modRecompensa.show();
        }

        function eliminarBeneficio(idBeneficio) {
            Swal.fire({
                title: '¿Estas seguro?',
                text: 'Se eliminara el beneficio permanentemente',
                showDenyButton: true,
                confirmButtonText: 'Eliminar',
                denyButtonText: `cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    eliminar(idBeneficio)
                    // Swal.fire('Saved!', '', 'success')
                }
            })
        }

        const eliminar = (id)=>{

            let url = '{{ route('beneficios.eliminar') }}';

            fetch(url, {
                    method: 'PUT',
                    body: JSON.stringify({ id : id }),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },

                }).then((c) => c.json())
                .then(res => {
                    if (res.ok == true) {
                        window.location.reload()
                    } else {
                        alert('Ocurrio un error')
                    }
                })
                .catch((err) => {
                    alert('Ocurrio un error')
                });

        }

        function editNivel(data = {}){
            modNivel.show();
            titulo
            frmNivel.querySelector("#titulo_nivel").innerText = data.titulo;
            frmNivel.querySelector("#min_puntos").value = data.min_puntos;
            frmNivel.querySelector("#max_puntos").value = data.max_puntos;
            frmNivel.querySelector("#nivel_id").value = data.id;
        }

    </script>
@endsection
