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

        .btn_next {
            background-color: var(--accent-color) !important;
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
                    <div class="card" style="overflow:scroll; max-height: 90vh">
                        <div class="card-header">
                            <div style="display: flex; justify-content: space-between; align-items: center;">
                                <div>
                                    <h4>Niveles</h4>
                                    @if (empty($niveles) && $categorizacion)
                                    <span>Periodo activo de {{ $categorizacion->periodos }} meses</span><br>
                                    <span>({{$categorizacion->mesesPeriodo}})</span>
                                    @endif
                                </div>
                                @if (empty($niveles) && $categorizacion)
                                    <div class="float-left">
                                        <a class="btn btn-success" href="{{ route('beneficios.index') }}">
                                            Adm Niveles</a>
                                        {{-- <a class="btn btn-success" href="{{ route('beneficios.index') }}">
                                            Periodos</a> --}}
                                    </div>
                                @endif
                            </div>
                        </div>
                        <hr>
                        <div class="card-body" style="min-height: 600px">

                            @if (count($niveles) > 0)
                                <div class="alert alert-danger " role="alert" style="color: white">
                                    Para iniciar el programa es necesario como minino una <a class="alert-link"
                                        href="{{ route('beneficios.index') }}">recompensa</a> por nivel.
                                </div>
                            @endif
                            @if (!$categorizacion)
                                <div class="">
                                    {{-- <img class="d-block mx-auto mb-4" src="/img/logo.jpg" alt="" width="200"
                                        height="200"> --}}
                                    <h3 class="fw-bold text-center">NIVELES DE CLIENTES</h3>
                                    <div class="col-lg-8 mx-auto">
                                        <p class="lead mb-4">Bienvenido al panel de NIVELES, ahora tambien pueden
                                            asignar un nivel a sus clientes, por ejemplo</p>

                                        <ul>
                                            {{-- <li>Cliente VIP regular</li> --}}
                                            <li>Cliente VIP plata</li>
                                            <li>Cliente VIP oro</li>
                                            <li>Cliente VIP Élite</li>
                                        </ul>
                                        {{-- {{ Auth::user()->permission }} --}}

                                        <p class="lead mb-4">Disfruta de este nuevo veneficio que cliente vip tiene para
                                            ti.
                                        </p>
                                        <p class="lead mb-4">Gestiona tus niveles para la categorizacion elije las
                                            mejores
                                            recompensas para cada una y consiente a tus clientes.</p>


                                        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                                            <button type="button" class="btn btn-primary btn-lg px-4 gap-3"
                                                data-bs-toggle="modal" data-bs-target="#modCategorizacion">
                                                configurar
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            @else
                                @if (!$periodoActivo)
                                    <div class="alert alert-success " role="alert" style="color: white">
                                        <h3>!Estamos listos¡</h3>
                                        <p>
                                            Para generar el nuevo periodo clickea iniciar.
                                        </p>
                                        <span>El periodo activo comprende de {{ $periodo['inicio'] }} hasta
                                            {{ $periodo['fin'] }}
                                        </span>
                                        <hr>
                                        <button href="#" class=" btn btn-primary"
                                            id="btnCrearPeriodo">Comenzar</button>
                                    </div>
                                @endif

                                @if ($periodoActivo)
                                    <div>
                                        Periodo de categorizacion {{ $periodoActivo->fecha_inicio }} al
                                        {{ $periodoActivo->fecha_fin }}
                                    </div>
                                    <div class="accordion" id="Niveles">
                                        cargando ....
                                    </div>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Modal -->
    <div class="modal fade" id="modCategorizacion" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="modCategorizacionLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modCategorizacionLabel">Configurar Clasificacioón</h5>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"
                    style="color: black;display: flex;align-items: center;justify-content: center;">X</button>
                                </div>
                <form id="frmComenzar">
                    <div class="modal-body">
                        <div class="text-center">
                            <div class="steps-container">
                                <div class="steps" id="progress"></div>

                                <div class="circle active">
                                    <div class="caption">Niveles</div>
                                </div>
                                <div class="circle">
                                    <div class="caption">Periodos</div>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="steps-slide">
                            <div class="step_container active">
                                <table class="table" id="tblNiveles">
                                    <thead>
                                        <tr>
                                            <th>Nivel</th>
                                            <th>Min Puntos</th>
                                            <th>Max Puntos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {{-- <tr>
                                            <td>
                                                Cliente VIP regular
                                                <input type="hidden" class="form-control" name="code" value="regular">
                                                <input type="hidden" class="form-control" name="level"
                                                    value="Cliente VIP regular">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="min" value="100">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="max" value="299">
                                            </td>

                                        </tr> --}}
                                        <tr>
                                            <td>
                                                Cliente VIP plata
                                                <input type="hidden" class="form-control" name="code" value="1">

                                                <input type="hidden" class="form-control" name="level" value="Cliente VIP plata">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="min" value="300">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="max" value="499">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Cliente VIP oro
                                                <input type="hidden" class="form-control" name="code" value="2">

                                                <input type="hidden" class="form-control" name="level" value="Cliente VIP oro">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="min" value="500">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="max" value="699">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Cliente VIP elite
                                                <input type="hidden" class="form-control" name="code" value="3">

                                                <input type="hidden" class="form-control" name="level" value="Cliente VIP elite">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="min" value="700">
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="max" value="2000">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="step_container">
                                <div class="form-check">
                                    <input class="form-check-input periodo" type="radio" name="periodo" id="periodo1" required
                                        value="3">
                                    <label class="form-check-label" for="periodo1">
                                        Cada 3 meses<br>
                                        <span>(Enero - Marzo, Abril - Junio, Julio - Septiembre, Octubre - Diciembre)</span>
                                        
                                    </label>
                                </div>



                                <div class="form-check">
                                    <input class="form-check-input periodo" type="radio" name="periodo" id="periodo3"  required
                                         value="6">
                                    <label class="form-check-label" for="periodo3">
                                        Cada 6 meses<br>
                                        <span>(Enero - Junio , Julio - Diciembre)</span>
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input class="form-check-input periodo" type="radio" name="periodo" id="periodo2" required
                                         value="12">
                                    <label class="form-check-label" for="periodo2">
                                        Cada 12 meses<br>
                                        <span>(Enero - Diciembre)</span>
                                    </label>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn_step" id="prev">Atras</button>
                        <button type="button" class="btn_step" id="next">Siguiente</button>
                        <button type="submit" class="btn_step btn_next" id="btnContinuar" style="display: none"> Continuar
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>

    <div class="modal" id="modAsignar" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Asignación Manual</h5>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"
                        style="color: black;display: flex;align-items: center;justify-content: center;">X</button>
                </div>
                <form id="frmAsignar">
                    @csrf
                    <div class="modal-body">
                        <div>
                            Asignacion valida solo en el periodo : <br>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Periodo</label>
                            @if ($periodoActivo != '')
                                <input class="form-control"
                                    value=" {{ $periodoActivo->fecha_inicio }} - {{ $periodoActivo->fecha_fin }}" disabled>
                                <input type="hidden" value="{{ $periodoActivo->id }}" class="form-control"
                                    name="periodo">
                            @endif
                            <input type="hidden" class="form-control user_id" name="user_id">
                            <div id="emailHelp" class="form-text">Vigente solo el periodo activo.</div>
                        </div>


                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nivel</label>
                            <select class="form-control" id="cmbNivel" name="nivel_id" required></select>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Justificación</label>
                            <textarea class="form-control" name="observaciones" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
        //area de variavles javascript 
        const progress = document.getElementById("progress");
        const prev = document.getElementById("prev");
        const next = document.getElementById("next");
        const cricles = document.querySelectorAll(".circle");
        const steps = document.querySelectorAll(".step_container");
        const btnContinuar = document.querySelector("#btnContinuar");
        const frmComenzar = document.querySelector("#frmComenzar");
        const btnCrearPeriodo = document.querySelector("#btnCrearPeriodo");
        const NivelesAccordin = document.querySelector("#Niveles")
        const modAsignar = new bootstrap.Modal(document.getElementById('modAsignar'))
        const cmbNivel = document.querySelector("#cmbNivel");
        const frmAsignacion = document.querySelector("#frmAsignar")
        const user_id = document.querySelector("#frmAsignar .user_id")
        let currentActive = 0;

        //fin de area de variables

        //funcion click para next 
        next.addEventListener("click", () => {
            if (currentActive <= cricles.length) {
                currentActive++;
            }
            update();
        });
        //funcion click para prev
        prev.addEventListener("click", () => {
            if (currentActive > 0) {
                currentActive--;
            }
            update();
        });

        function update() {

            cricles.forEach((circle, idx) => {
                // console.log(circle, idx);

                if (idx == currentActive) {
                    circle.classList.add("active");
                } else {
                    circle.classList.remove("active");
                }
            });

            steps.forEach((steps, idx) => {
                console.log(steps, idx);

                if (idx == currentActive) {
                    steps.classList.add("active");
                    btnContinuar.style.display = "block";
                } else {
                    steps.classList.remove("active");
                    btnContinuar.style.display = "none";


                }
            });

            progress.style.width =
                (currentActive / (cricles.length - 1)) * 100 + "%";
            if (currentActive === 0) {
                prev.disabled = true;
                next.disabled = false;
                next.style.display = 'block';

            } else if (currentActive === (cricles.length - 1)) {
                prev.disabled = false;
                next.disabled = true;
                next.style.display = 'none';
            } else {
                prev.disabled = true;
                next.disabled = false;
                next.style.display = 'block';

            }
        }
        //funcion para almacenar los niveles y categorización
        frmComenzar.addEventListener('submit', (e) => {
            e.preventDefault();

            let rows = document.querySelectorAll("#tblNiveles tbody tr")
            let niveles = [];
            rows.forEach(row => {
                let object = {};
                let inputs = row.querySelectorAll("input");
                inputs.forEach(input => {
                    object[input.name] = input.value;
                })
                niveles.push(object);
            })

            var periodo = document.querySelector('.periodo:checked').value;

            let data = {
                periodos: periodo,
                niveles: niveles,
                _token: "{{ csrf_token() }}",
                beneficios: []
            }
            console.log(data);

            let url = '{{ route('categorizacion.comenzar') }}';

            fetch(url, {
                    method: 'POST',
                    body: JSON.stringify(data),
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json'
                    },

                }).then((c) => c.json())
                .then(res => {
                    if (res.ok == true) {
                        window.location.href = '{{ route('beneficios.index') }}';
                    } else {
                        alert('Ocurrio un error')
                    }
                })
                .catch((err) => {
                    alert('Ocurrio un error')
                });
        });

        frmAsignacion.addEventListener('submit', (e) => {
            e.preventDefault();
            let url = '{{ route('categorizacion.asignar') }}';

            fetch(url, {
                method: 'POST',
                body: new FormData(frmAsignacion)
            }).then(c => c.json()).then(c => {
                console.log(c);
                if (c.ok) {
                  
                        Toast.fire({
                        icon: 'success',
                        title: c.message
                        })
                    modAsignar.hide();
                    frmAsignacion.reset();
                    obtenerNivelEmpleados();

                } else {
                    Swal.fire("Lo sentimos ocurrio un error", {
                        icon: 'error'
                    })

                }
            }).catch(err => {
                alert("Lo sentimos ocurrio un error")
            });

        })

        if (btnCrearPeriodo) {

            btnCrearPeriodo.addEventListener('click', (event) => {
                event.preventDefault()

                let timerInterval
                Swal.fire({
                    title: '!Espera estamos¡',
                    html: 'Almacenando información',
                    // timer: 5000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                    },
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        // console.log('I was closed by the timer')
                    }
                })

                @if ($periodo)


                    let data = {
                        "Inicio": '{{ $periodo['inicio'] }}',
                        "fin": '{{ $periodo['fin'] }}',
                        "inicioAnterior": '{{ $periodo['inicioAnterior'] }}',
                        "finAnterior": '{{ $periodo['finAnterior'] }}',
                        "categorizacion": '{{ $categorizacion['id'] }}'
                    }
                @endif
                let url = '{{ route('categorizacion.periodo') }}';

                fetch(url, {
                        method: 'POST',
                        body: JSON.stringify(data),
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
            });
            //funcion para crear el pediodo activo 
        }

        @if ($periodoActivo != '')

            obtenerNivelEmpleados();

            async function obtenerNivelEmpleados() {

                let url = '{{ route('categorizacion.niveles', $periodoActivo->id) }}';

                let response = await fetch(url);
                let data = await response.json();
                NivelesAccordin.innerHTML = '';
                if (data.ok == true) {
                    data.manual.map(usuario => {

                        var index = data.personas.findIndex(c => c.id == usuario.user_id);
                        if (index > 0) {
                            data.personas[index].nivel = usuario.categorizacion_nivel_id;
                            data.personas[index].asignacion = 'manual';


                        }

                    })

                    cmbNivel.innerHTML = '<option value="" selected disabled >-- Selecciona nivel -- </option>';
                    data.niveles.map(u => {
                        cmbNivel.innerHTML += '<option value="' + u.id + '">' + u.titulo + '</option>';

                        var personas = data.personas.filter(c => c.nivel == u.id);
                        let tr = document.createElement('div');
                        tr.classList.add('accordion-item')
                        tr.innerHTML = `<div class="accordion-item">
                                                <h2 class="accordion-header" id="heading${u.id}">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse${u.id}" aria-expanded="false" aria-controls="collapse${u.id}">
                                                   ${u.titulo} (${personas.length})
                                                </button>
                                                </h2>
                                                <div id="collapse${u.id}" class="accordion-collapse collapse" aria-labelledby="heading${u.id}" data-bs-parent="#Niveles">
                                                <div class="accordion-body">
                                                   ${TablaPersonas(personas,u.titulo)}
                                                </div>
                                                </div>
                                    </div>`;
                        NivelesAccordin.appendChild(tr);


                    })
                    var personasSinNivel = data.personas.filter(c => c.nivel == '');
                    let sinNivel = document.createElement('div');
                    sinNivel.classList.add('accordion-item')
                    sinNivel.innerHTML = `<div class="accordion-item">
                                                <h2 class="accordion-header" id="headingsn">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsesn" aria-expanded="false" aria-controls="collapsesn">
                                                  Sin Nivel (${personasSinNivel.length})
                                                </button>
                                                </h2>
                                                <div id="collapsesn" class="accordion-collapse collapse" aria-labelledby="headingsn" data-bs-parent="#Niveles">
                                                <div class="accordion-body">
                                                    ${TablaPersonas(personasSinNivel)}
                                                </div>
                                                </div>
                                    </div>`;
                    NivelesAccordin.appendChild(sinNivel);

                } else {
                    alert('Ocurrio un error')
                }

            }
        @endif

        function TablaPersonas(personas = [], nivel = '') {
            let table = `<table class="table">
                    <theader>
                        <tr>
                            <th>Puntos</th>
                            <th>Nombre</th>
                            <th>DNI</th>
                            <th>DNI</th>
                            <th></th>
                        </tr>
                    </theader><tbody>`
            personas.map(per => {
                // console.log(per);
                table += `<tr>
                        <td> <span class="badge badge-sm bg-gradient-success">${per.totpuntos}</span></td>
                        <td>${per.nombres} ${per.apellidos}</td>
                        <td>${per.dni}</td>
                        <td>${nivel}</td>
                        <td><button class="btn btn-sucess" onclick="Asignar(${per.id})" >${per.asignacion == 'manual' ? 'Reasignar' : 'Asignar'}</button></td>
                    <tr>`
            })

            table += '</tbody></table>';
            return table;
        }

        function Asignar(id) {
            user_id.value = id;
            modAsignar.show()
        }
    </script>
@endsection
