@extends('layouts.app')

@section('styles')
    <style>
        @import url("https://fonts.googleapis.com/css2?family=Poppins&display=swap");

        /*=============== VARIABLES ===============*/

        :root {
            --background-color: #eeeeee;
            --light-grey: #c4c1c1;
            --accent-color: #82d616;
        }

        body {
            font-family: "Poppins", sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            font-size: 16px;
            background-color: var(--background-color);
        }

        .steps-container {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 60px;
            max-width: 90%;
            min-width: 350px;
            margin: 2rem auto
        }

        .steps-container::before {
            content: "";
            background-color: var(--light-grey);
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            height: 4px;
            width: 100%;
            z-index: 0;
        }

        .steps {
            background-color: var(--accent-color);
            position: absolute;
            top: 50%;
            left: 0;
            transform: translateY(-50%);
            height: 4px;
            width: 0%;
            z-index: 0;
            transition: 0.4s ease;
        }

        .circle {
            background: var(--light-grey);
            color: var(--light-grey);
            border-radius: 50%;
            height: 10px;
            width: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 3px solid var(--light-grey);
            transition: 0.4s ease;
        }

        .circle.active {
            border-color: var(--accent-color);
            background-color: #fff;
            color: var(--accent-color);
            scale: 1.1;
        }

        .circle .icon {
            position: absolute;
            font-size: 25px;
            bottom: 25px;
        }

        .circle .caption {
            position: absolute;
            font-size: 14px;
            font-weight: bolder;
            bottom: -30px;
        }

        .btn_step {
            background: var(--bs-warning);
            color: #fff;
            border: 0;
            border-radius: 20px;
            cursor: pointer;
            font-family: inherit;
            font-size: inherit;
            padding: 8px 30px;
            margin: 5px;
        }

        .btn_step:active {
            transform: scale(0.9);
        }

        .btn_step:focus {
            outline: 0;
        }

        .btn_step:disabled {
            background-color: var(--light-grey);
            cursor: not-allowed;
        }

        .step_container {
            display: none;
            min-height: 300px
        }

        .step_container.active {
            display: block;
        }

        .accordion-button:not(.collapsed) {
            color: #0c63e4;
            background-color: #e7f1ff;
            box-shadow: inset 0 -1px 0 rgb(0 0 0 / 13%);
        }

        .accordion-item {
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, .125);
        }
    </style>
@endsection


@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg "
        style="width: 100%">
        @include('layouts.navbar')
        <div class="container-fluid" id="app">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card" style="">
                        <div style="display: flex; justify-content: space-between; align-items: center; padding: .5rem 1rem">
                            <div>

                                <h4>Usuarios </h4>
                                <p>Administra los usuarios con cuentas de negocio</p>
                            </div>
                            <div class="float-left">
                                @if (Auth::user()->rol == 2)
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modUsuario">Agregar Usuario</button>
                                @endif
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-header">
                            <input type="text" class="form-control" id="txtBuscar"
                                placeholder="Buscar por nombre o email">
                        </div>
                        <div class="card-body">

                            <div class="table-responsive" style="max-width: 100%;">

                                <table class="table" id="tblNegocios">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre</th>
                                            <th>Correo</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users_local as $user)
                                            <tr>
                                                <td>{{ $user->user->id }}</td>
                                                <td>{{ $user->user->name }}</td>
                                                <td> {{ $user->user->email }}</td>
                                                <td></td>
                                                {{-- <td> {{ //$user->user->permission }}</td> --}}
                                                <td>
                                                    <button
                                                        class="btn btn-success"onclick="editarUsuario({{ json_encode($user->user) }})">
                                                        Editar</button>

                                                    <button class="btn btn-success"
                                                        onclick="editarModulos({{ json_encode($user->user) }})">
                                                        Modulos
                                                    </button>

                                                    <button class="btn btn-success"
                                                        onclick="editarPermisos({{ json_encode($user->user) }})">
                                                        Permisos
                                                    </button>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="modUsuario" tabindex="-1" aria-labelledby="modUsuarioLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modUsuarioLabel">Datos del empleado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frmRegistro" autocomplete="off">

                    <div class="modal-body">
                        @csrf
                        <input type="hidden" id="user_id" name="user_id" required>

                        <div class="form-group ">
                            <label for="name" class="col-form-label text-md-right">Nombre</label>

                            <div class="">
                                <input id="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" name="name" required
                                    autocomplete="off" autofocus>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="email" class=" col-form-label text-md-right">E-mail</label>

                            <div class="input-group mb-3">
                                <input id="username" type="text" class="form-control" placeholder="Recipient's username"
                                    name="username" aria-label="username" aria-describedby="basic-addon2">
                                <span style="background-color: grey;
                                    color: white;"
                                    class="input-group-text"
                                    id="basic-addon2"><span>@</span>{{ Auth::user()->local ? Auth::user()->local->dominio : 'example.pe' }}
                                </span>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="password" class=" col-form-label text-md-right">Contraseña</label>
                            <div class="">
                                <input id="password" class="form-control" name="password" minlength="6" required
                                    autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="password" class=" col-form-label text-md-right">Estatus</label>
                            <div class="">
                                <select name="estatus" id="estatus" class="form-control" required>
                                    <option value="" selected disabled>-- seleccionar --</option>
                                    <option value="1">Activo</option>
                                    <option value="0">Inactivo</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal fade" id="modPermisos" tabindex="-1" aria-labelledby="modPermisos" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Asignación de permisos </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frmPermisos" autocomplete="off">

                    <div class="modal-body">
                        <div>

                            <p style="line-height: 5px;">
                                Selecciona los permisos para el usuario :
                            </p>
                            <strong> Nombre usuario </strong>
                            <hr>
                        </div>
                        <input type="hidden" id="user_id" name="user_id" required>
                        @csrf
                        <ul class="list-group">

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label for="negocio_puntos_canges"> Canges</label>
                                <input type="checkbox" id="negocio_puntos_canges">
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label for="negocio_puntos_acumulaciones"> Acumulaciones</label>
                                <input type="checkbox" id="negocio_puntos_acumulaciones">
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label for="negocio_clientes"> Clientes</label>
                                <input type="checkbox" id="negocio_clientes">
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label for="negocio_reportes"> Reporte Acumulaciones Cange</label>
                                <input type="checkbox" id="negocio_reportes">
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label for="negocio_promociones"> Promociones</label>
                                <input type="checkbox" id="negocio_promociones">
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label for="negocio_recompensas"> Recompensas</label>
                                <input type="checkbox" id="negocio_recompensas">
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label for="negocio_usuarios"> Usuarios</label>
                                <input type="checkbox" id="negocio_usuarios">
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label for="negocio_niveles"> Niveles</label>
                                <input type="checkbox" id="negocio_niveles">
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label for="negocio_configuraciones"> Configuracion Negocio</label>
                                <input type="checkbox" id="negocio_configuraciones">
                            </li>

                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label for="negocio_gifcards"> Gif Cards</label>
                                <input type="checkbox" id="negocio_gifcards">
                            </li>

                        </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modModulos" tabindex="-1" aria-labelledby="modModulos" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Asignación de modulos </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="frmModulos" autocomplete="off">

                    <div class="modal-body">
                        <div>

                            <p style="line-height: 5px;">
                                Selecciona los modulos a los que el usuario tendra acceso para el usuario :
                            </p>
                            <strong> Nombre usuario </strong>
                            <hr>
                        </div>
                        <input type="hidden" id="user_id" name="user_id" required>
                        @csrf
                        <ul class="list-group">
                            @foreach ($modulos as $modulo)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <label for="modulo_{{ $modulo->id }}"> {{ $modulo->titulo }}</label>
                                    <input type="checkbox" id="modulo_{{ $modulo->id }}">
                                </li>
                            @endforeach
                            @foreach (Auth::user()->modulos as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <label for="modulo_{{ $item->modulo->id }}"> {{ $item->modulo->titulo }}</label>
                                    <input type="checkbox" id="modulo_{{ $item->modulo->id }}">
                                </li>
                            @endforeach

                        </ul>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const frmRegistro = document.querySelector("#frmRegistro");
        const frmPermisos = document.querySelector("#frmPermisos");
        const frmModulos = document.querySelector("#frmModulos");
        const modUsuario = new bootstrap.Modal(document.getElementById('modUsuario'))
        const modPermisos = new bootstrap.Modal(document.getElementById('modPermisos'))
        const modModulos = new bootstrap.Modal(document.getElementById('modModulos'))
        const txtBuscar = document.querySelector("#txtBuscar");

        document.getElementById('modPermisos').addEventListener('hidden.bs.modal', function(event) {
            frmPermisos.reset();
        })

        document.getElementById('modModulos').addEventListener('hidden.bs.modal', function(event) {
            frmModulos.reset();
        })

        txtBuscar.addEventListener('keyup', function(e) {
            e.preventDefault();
            let key = e.target.value;

            let tr = document.querySelectorAll("#tblNegocios tbody tr")

            for (i = 1; i < tr.length; i++) {

                let text = tr[i].innerText;
                if (text.toLowerCase().includes(key.toLowerCase())) {
                    tr[i].style.display = "";

                } else {

                    tr[i].style.display = "none";
                }
            }

        })

        frmRegistro.addEventListener('submit', (e) => {
            e.preventDefault();

            let username = frmRegistro.querySelector("#username");
            username.disabled = false;

            let url = '{{ route('usuarios.store') }}';

            fetch(url, {
                method: 'POST',
                body: new FormData(frmRegistro)
            }).then(c => c.json()).then(res => {

                console.log(res);
                if (res.ok == true) {
                    window.location.reload();
                } else {
                    Swal.fire('', '', {
                        icon: 'error'
                    })
                }
            }).catch(err => {
                alert("Lo sentimos ocurrio un error")
            });
        })

        frmModulos.addEventListener('submit', (e) => {

            e.preventDefault();
            let data = new FormData(frmModulos)

            let inputs = frmModulos.querySelectorAll('input[type="checkbox"]:checked');

            let modulos = [];
            inputs.forEach(element => {
                modulos.push(element.id.replace("modulo_", ""));
            });

            data.append('modulos', JSON.stringify(modulos));

            let url = '{{ route('modulos.store') }}';

            fetch(url, {
                method: 'POST',
                body: data
            }).then(c => c.json()).then(res => {

                if (res.ok == true) {
                    window.location.reload()
                } else {
                    alert('Ocurrio un error')
                }
            }).catch(err => {
                alert("Lo sentimos ocurrio un error")
            });
        })


        function editarUsuario(user_data) {
            console.log(user_data)
            modUsuario.show();
            let user_id = frmRegistro.querySelector("#user_id");
            user_id.value = user_data.id;

            let name = frmRegistro.querySelector("#name");
            name.value = user_data.name;

            let username = frmRegistro.querySelector("#username");
            username.disabled = true;
            username.value = user_data.email.split('@')[0];

            let estatus = frmRegistro.querySelector("#estatus");
            estatus.value = user_data.estado;

            let password = frmRegistro.querySelector("#password");
            password.placeholder = "*********";
        }

        function editarPermisos(user_data) {
            modPermisos.show();

            let user_id = frmPermisos.querySelector("#user_id");
            user_id.value = user_data.id;

            user_data.permission.forEach(element => {
                var element = frmPermisos.querySelector("#" + element.name)
                if (element) {
                    element.checked = true
                }
            });
        }

        function editarModulos(user_data) {
            modModulos.show();

            let user_id = frmModulos.querySelector("#user_id");
            user_id.value = user_data.id;

            user_data.modulos.forEach(element => {
                var element = frmModulos.querySelector("#modulo_" + element.modulo_id)
                if (element) {
                    element.checked = true
                }
            });
        }


        frmPermisos.addEventListener('submit', function(e) {
            e.preventDefault();
            let data = new FormData(frmPermisos)

            let inputs = frmPermisos.querySelectorAll('input[type="checkbox"]:checked');
            let permisos = [];
            inputs.forEach(element => {
                permisos.push(element.id);
            });

            data.append('permisos', JSON.stringify(permisos));

            let url = '{{ route('usuarios.permisos') }}';

            fetch(url, {
                method: 'POST',
                body: data
            }).then(c => c.json()).then(res => {

                if (res.ok == true) {
                    window.location.reload()
                } else {
                    alert('Ocurrio un error')
                }
            }).catch(err => {
                alert("Lo sentimos ocurrio un error")
            });

        })
    </script>
@endsection
