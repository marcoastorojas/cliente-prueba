@extends('layouts.app')
@section('content')


    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div>
                        <div class=" py-4">
                            <div class="row">

                                <div class="col-12">
                                    <div class="card mb-4">
                                        @if (!$local)
                                            <br>
                                            <div class="text-center">
                                                <h3>Lo sentimos no tienes un negocio que administrar</h3>

                                            </div>
                                        @else
                                            <div class="card-header pb-0">
                                                <h6>Configuración del Negocio</h6>
                                                {{-- @if (session()->has('message'))
                                                <div wire:poll.4s class="btn btn-sm btn-success" style="margin-top:0px; margin-bottom:0px;">
                                                    {{ session('message') }} </div>
                                            @endif --}}
                                            </div>
                                            <div class="card-body px-0 pt-0 pb-2">

                                                <div class="container">
                                                    <form action="" method="POST" id="local_form"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="titulo">Negocio</label>
                                                                <input name="titulo" type="text" class="form-control"
                                                                    id="titulo" placeholder="Titulo"
                                                                    value="{{ $local->titulo }}">
                                                                @error('titulo')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="descripcion">Descripción</label>
                                                                <input name="descripcion" type="text"
                                                                    class="form-control" id="descripcion"
                                                                    placeholder="Descripcion"
                                                                    value="{{ $local->descripcion }}">
                                                                @error('descripcion')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <label for="direccion">Dirección</label>
                                                                <input name="direccion" type="text" class="form-control"
                                                                    id="direccion" placeholder="Direccion"
                                                                    value="{{ $local->direccion }}">
                                                                @error('direccion')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="celular">Celular</label>
                                                                <input name="celular" type="text" class="form-control"
                                                                    id="celular" placeholder="Celular"
                                                                    value="{{ $local->celular }}">
                                                                @error('celular')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="correo">Correo negocio</label>
                                                                <input name="correo" type="email" class="form-control"
                                                                    id="correo" placeholder="Correo negocio"
                                                                    value="{{ $local->email }}">
                                                                @error('correo')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <p>Configuracion para la creacion de usuarios</p>
                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <label for="dominio">Dominio</label>
                                                                <input name="dominio" type="text" class="form-control"
                                                                    id="dominio" placeholder="dominio negocio"
                                                                    value="{{ $local->dominio }}">
                                                                @error('dominio')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>



                                                        <hr>

                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="config_monto">Confir Monto S/</label>
                                                                <input name="config_monto" type="text"
                                                                    class="form-control" id="config_monto"
                                                                    placeholder="Config Monto" readonly
                                                                    value="{{ $local->config_monto }}">
                                                                @error('config_monto')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="config_punto">Config Puntos</label>
                                                                <input name="config_punto" type="text"
                                                                    class="form-control" id="config_punto"
                                                                    placeholder="Config Punto" readonly
                                                                    value="{{ $local->config_punto }}">
                                                                @error('config_punto')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="tipe_id">Tipo Negocio</label>
                                                                <select class="form-select" id="tipe_id" name="tipe_id">
                                                                    <option value=""> Seleccione </option>
                                                                    @foreach ($tipos as $item)
                                                                        <option value="{{ $item->id }}"
                                                                            {{ $item->id == $local->tipe_id ? 'selected' : '' }}>
                                                                            {{ $item->tipos }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="restriccion">Restricciónes</label>
                                                                <input name="restriccion" type="text"
                                                                    class="form-control" id="restriccion"
                                                                    placeholder="restriccion"
                                                                    value="{{ $local->restriccion }}">
                                                                @error('restriccion')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="nombrecatalogo">Carta / Catalogo</label>
                                                                <input name="nombrecatalogo" type="text"
                                                                    class="form-control" id="nombrecatalogo"
                                                                    placeholder="carta o catalogo"
                                                                    value="{{ $local->nombrecatalogo }}">
                                                                @error('nombrecatalogo')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-8">
                                                                <label for="catalogo">Link Carta/Catálogo</label>
                                                                <input name="catalogo" type="text"
                                                                    class="form-control" id="catalogo"
                                                                    placeholder="Link" value="{{ $local->catalogo }}">
                                                                @error('catalogo')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="row">

                                                                    <div class="col-md-4">
                                                                        <label for="logo">Logo</label>
                                                                        <input name="logo" type="file"
                                                                            class="form-control" id="logo">
                                                                        @error('logo')
                                                                            <span
                                                                                class="error text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                        <img src="{{ asset('img/' . $local->logo) }}"
                                                                            width="20%">
                                                                    </div>

                                                                    <div class="col-md-4">
                                                                        <label for="banner">Banner</label>
                                                                        <input name="banner" type="file"
                                                                            class="form-control" id="banner">
                                                                        @error('banner')
                                                                            <span
                                                                                class="error text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                        <img src="{{ asset('img/' . $local->banner) }}"
                                                                            width="20%">
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <label for="icono_tarjeta">icono_tarjeta</label>
                                                                        <input name="icono_tarjeta" type="file"
                                                                            class="form-control" id="icono_tarjeta">
                                                                        @error('icono_tarjeta')
                                                                            <span
                                                                                class="error text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                        <img src="{{ asset('img/' . $local->icono_tarjeta) }}"
                                                                            width="20%">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="nombresprop">Nombres</label>
                                                                <input name="nombresprop" type="text"
                                                                    class="form-control" id="nombresprop"
                                                                    value="{{ $local->nombresprop }}">
                                                                @error('nombresprop')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="apellidosprop">Apellidos</label>
                                                                <input name="apellidosprop" type="text"
                                                                    class="form-control" id="apellidosprop"
                                                                    value="{{ $local->apellidosprop }}">
                                                                @error('apellidosprop')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="celularprop">Celular</label>
                                                                <input name="celularprop" type="text"
                                                                    class="form-control" id="celularprop"
                                                                    value="{{ $local->celularprop }}">
                                                                @error('celularprop')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">

                                                            <div class="col-md-4">
                                                                <label for="email">Email</label>
                                                                <input name="email" type="email" class="form-control"
                                                                    id="email" placeholder="Email" readonly
                                                                    value="{{ $local->user->email }}">
                                                                @error('email')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="col-md-4">
                                                                <label for="password">Contraseña Nueva</label>
                                                                <input name="password" type="text"
                                                                    class="form-control" id="password"
                                                                    placeholder="Contraseña">
                                                                <small class="text-secondary" style="font-size: 12px">
                                                                    Mínimo 6 caracteres.
                                                                </small>
                                                                @error('password')
                                                                    <span class="error text-danger">{{ $message }}</span>
                                                                @enderror

                                                                {{-- <input type="password" class="form-control" placeholder="Contraseña"
                                                                aria-label="Password" @error('password') is-invalid @enderror"
                                                                name="password" minlength="6" required autocomplete="off"> --}}

                                                            </div>
                                                            {{-- <div class="col-md-4">
                                                            <label for="password">Confirmar Contraseña</label>
                                                            <input id="password-confirm" type="password" class="form-control"
                                                            placeholder="Repita la contraseña" name="password_confirmation" required
                                                            autocomplete="new-password">
                                                        </div> --}}
                                                        </div>
                                                        <br>
                                                        <div class="form-group row">
                                                            <div class="col-sm-10">
                                                                {{-- <button type="button" class="btn btn-warning">Actualizar</button> --}}
                                                                <input type="submit" value="Actualizar"
                                                                    class="btn btn-warning float-right">
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>

                                            </div>
                                        @endif

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </main>
    <script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
    {{-- <script src="{{asset('js/jquery.min.js')}}"></script> --}}
    {{-- <script src="{{asset('js/jquery.loadingModal.min.js')}}"></script>
    <link href="{{ asset('css/jquery.loadingModal.min.css') }}" rel="stylesheet"> --}}

    <script>
        $(document).ready(function() {
            $('#local_form').on('submit', function(event) {
                event.preventDefault();
                // $('body').loadingModal({
                //     text: 'Espere, estamos procesando...',
                //     animation: 'threeBounce',
                //     opacity:'0.7',
                // });
                // $('body').loadingModal({text: 'Showing loader animations...', 'animation': 'wanderingCubes'});
                // $('#load-on').css('display','block');
                $.ajax({
                    url: "{{ route('local.store') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        if (data.message) {
                            alert(data.message);
                            location.reload(true);
                            // $('body').loadingModal('hide');
                        } else {
                            alert(data.error);
                            location.reload(true);
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        alert("error servidor: " + XMLHttpRequest.statusText);
                        // location.reload(true);
                    }
                })
            })

        })
    </script>
@endsection
