<!DOCTYPE html>
<html lang="es-PE" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>ClienteVIP Info</title>
    <meta name="description" content="ClienteVip, Gana recompensas y cashback por tus consumos">
    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('woo/assets/img/favicons/favicon1.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('woo/assets/img/favicons/favicon1.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('woo/assets/img/favicons/favicon1.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('woo/assets/img/favicons/favicon1.png') }}">
    <link rel="manifest" href="{{ asset('woo/assets/img/favicons/manifest.json') }}">
    <meta name="msapplication-TileImage" content="{{ asset('woo/assets/img/favicons/favicon1.png') }}">
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('woo/assets/css/theme.css') }}" rel="stylesheet" />
    
    <!-- Meta Pixel Code -->
    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '670839181176419');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=670839181176419&ev=PageView&noscript=1"
    /></noscript>
    <script>
        fbq('track', 'Lead');
    </script>
    <!-- End Meta Pixel Code -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-13E2B8MGNL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-13E2B8MGNL');
    </script>
    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 100px;
            right: 30px;
            background-color: #fafafa;
            color: rgb(255, 255, 255);
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .float:hover {
            text-decoration: none;
            color: #25d366;
            background-color: rgb(220, 221, 220);
        }

        .my-float {
            margin-top: 16px;
        }

    </style>
    {!! htmlScriptTagJsApi(['action' => 'homepage']) !!}

</head>

<!-- Messenger plugin de chat Code -->
<div id="fb-root"></div>

<!-- Your plugin de chat code -->
<div id="fb-customer-chat" class="fb-customerchat">
</div>

{{-- <script>
    var chatbox = document.getElementById('fb-customer-chat');
    chatbox.setAttribute("page_id", "100444409148890");
    chatbox.setAttribute("attribution", "biz_inbox");

    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v12.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script> --}}


<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" data-navbar-on-scroll="data-navbar-on-scroll">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="{{ asset('back/assets/img/logo-cv3.png') }}" alt="" width="130" />
                </a>
                {{-- Paga con puntos, PP, Ppayer, Ppay --}}
                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation"><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto ms-lg-4 ms-xl-7 border-bottom border-lg-bottom-0 pt-2 pt-lg-0">
                        {{-- <li class="nav-item"><a class="nav-link fw-medium active" aria-current="page"
                                href="#">Sell</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#">Marketplace</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#">Community </a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#">Develop</a></li>
                        <li class="nav-item"><a class="nav-link fw-medium" href="#">Resources </a></li> --}}
                    </ul>
                    <form class="d-flex py-3 py-lg-0">
                        <a class="btn btn-link text-1000 fw-medium order-1 order-lg-0 me-lg-2"
                            href="{{ route('login') }}" role="button">Ingresar</a>
                        {{-- <a class="btn btn-info order-0 me-1" href="{{ route('registrarme') }}"
                            role="button">Regístrate</a> --}}
                        <div class="d-flex align-items-center ps-lg-3 order-3">
                        </div>
                    </form>
                </div>
            </div>
        </nav>
        <section class="py-0 bg-light-gradient">
            <div class="bg-holder"
                style="background-image:url({{ asset('woo/assets/img/illustrations/hero-bg.png') }});background-position:top right;background-size:contain;">
            </div>
            <!--/.bg-holder-->

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-4 col-lg-4 text-center text-md-start pt-8 pt-md-9">
                        <h1 class="display-2 fw-bold fs-4 fs-md-5 fs-xl-6">¡Únete ahora y fideliza a tus clientes!</h1>
                        <p class="mt-3 mb-4">Si eres dueño o administrador de un negocio, completa este formulario y te contactaremos.</p>
                        {{-- <a class="btn btn-lg btn-info rounded-pill me-2" href="{{ route('registrarme') }}"
                            role="button">
                            Regístrate ahora
                        </a><span> o </span>
                        <a class="btn btn-lg btn-info rounded-pill me-2" href="{{ route('login') }}" role="button">
                            Ingresa
                            ›</a> --}}
                    </div>
                    <div class="col-lg-8 col-md-8 order-md-1 pt-8">
                        <div class="">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Consultar información</h5>
                            </div>
                            <div class="modal-body">
                                <form method="POST" id="negocio_form" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="nombres">Nombre</label>
                                            <input type="text" class="form-control" id="nombres"
                                                name="nombres" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellidos">Apellido</label>
                                            <input type="text" class="form-control" id="apellidos"
                                                name="apellidos" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Nombre del negocio</label>
                                            <input type="text" class="form-control" id="" name="negocio" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellidos">Categoría</label>
                                            <select name="categoria_id" id="" class="form-control">
                                                <option value="">-Seleccione categoría-</option>
                                                @foreach ($categorias as $item)
                                                    <option value="{{$item->id}}">{{$item->tipos}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="ciudad">Ciudad</label>
                                            <select name="ciudad_id" id="" class="form-control">
                                                <option value="">-Seleccione ciudad-</option>
                                                @foreach ($ciudades as $item)
                                                    <option value="{{$item->id}}">{{$item->ciudad}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Distrito</label>
                                            <input type="text" class="form-control" id="" name="distrito" required maxlength="100">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="">Celular</label>
                                            <input type="text" class="form-control" id="" name="celular" required maxlength="9">
                                        </div>
                                    </div>
                                    <br>
                                    
                                    <button type="submit" class="btn btn-secondary">Enviar</button>
                                    
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-6">

            {{-- <div class="container">
                <div class="row flex-center">
                    <div class="col-auto text-center my-4">
                        <h1 class="display-3 fw-bold">Registrar mi Negocio</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 mb-5 mb-md-0">
                        <div class="modal-content">
                            <div class="modal-body">
                                <form method="POST" id="" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="nombres">Nombres</label>
                                            <input type="text" class="form-control" id="nombres"
                                                name="nombres" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellidos">Apellidos</label>
                                            <input type="text" class="form-control" id="apellidos"
                                                name="apellidos" required>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Nombre del negocio</label>
                                            <input type="text" class="form-control" id="" name="negocio" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="apellidos">Categoría</label>
                                            <select name="categoria_id" id="" class="form-control">
                                                <option value="">-Seleccione-</option>
                                                @foreach ($categoria as $item)
                                                    <option value="{{$item->id}}">{{$item->tipos}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for="">Celular</label>
                                            <input type="text" class="form-control" id="" name="celular" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="correo">Correo</label>
                                            <input type="email" class="form-control" id="correo" name="correo" required>
                                        </div>
                                    </div>
                                    <br>
                                    <button type="submit" class="btn btn-secondary">Registrar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


        
        {{-- <section class="bg-100 pb-0">
            
            <div class="position-relative text-center">
                <div class="bg-holder"
                    style="background-image:url(undefined);background:url({{ asset('woo/assets/img/gallery/people-bg-shape.png') }}) no-repeat center bottom, url({{ asset('woo/assets/img/gallery/people-bg-dot.png') }}) no-repeat center bottom;">
                </div>
                <img class="img-fluid position-relative z-index-1"
                    src="{{ asset('woo/assets/img/gallery/people.png') }}" alt="" />
            </div>
        </section> --}}
        <section class="py-0">
            {{-- <div class="bg-holder z-index-2"
                style="background-image:url({{ asset('woo/assets/img/illustrations/cta-bg.png') }});background-position:bottom right;background-size:61px 60px;margin-top:15px;margin-right:15px;margin-left:-58px;">
            </div> --}}
            <!--/.bg-holder-->

            <div class="container-fluid px-0">
                <div class="card py-4 border-0 rounded-0" style="background-color: #faca0c">
                    <div class="card-body">
                        <div class="row flex-center">
                            <div class="col-xl-9 d-flex justify-content-center mb-3 mb-xl-0">
                                <h3 class=" fw-bold">Sé uno de nuestros negocios afiliados a Cliente VIP</h3>
                            </div>
                            {{-- <div class="col-xl-9 d-flex justify-content-center mb-3 mb-xl-0">
                                <h2 class=" fw-bold">Únete a ClienteVIP!</h2>
                            </div> --}}
                        </div>
                        <br>
                        <div class="row flex-center">
                            {{-- <div class="col-xl-3 text-center">
                                <a class="btn btn-lg btn-outline-dark rounded-pill"
                                    href="https://forms.gle/DYo9sppCoMhvctRP6" target="../">ÚNETE</a>
                            </div> --}}
                            {{-- <div class="col-xl-3 text-center">
                                <button type="button" class="btn btn-lg btn-outline-dark rounded-pill"
                                    data-toggle="modal" data-target="#staticBackdrop">
                                    Registrar mi Negocio
                                </button>
                            </div> --}}
                        </div>
                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#playstore-modal">
                            Launch demo modal
                        </button> --}}

                        <!-- Modal -->
                        {{-- <div class="modal hide fade" id="playstore-modal" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <a href="https://bit.ly/ClienteVipApp"
                                            target="../">
                                            <img class="img-fluid"
                                                src="{{ asset('back/assets/img/downloadapp2.png') }}" alt=""
                                                style="border-radius: 5px 5px 5px 5px;" />
                                        </a>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-dark" data-dismiss="modal"
                                            id="close">Cerrar</button>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
                            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Registrar mi Negocio abc</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" id="" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="nombres">Nombres</label>
                                                    <input type="text" class="form-control" id="nombres"
                                                        name="nombres" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="apellidos">Apellidos</label>
                                                    <input type="text" class="form-control" id="apellidos"
                                                        name="apellidos" required>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <label for="">Nombre del negocio</label>
                                                <input type="text" class="form-control" id="" name="negocio" required>
                                            </div>
                                            <div class="form-row">
                                                <label for="">Celular</label>
                                                <input type="text" class="form-control" id="" name="celular" required>
                                            </div>
                                            <div class="form-row">
                                                <label for="email">Email</label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                    required>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4">Password</label>
                                                    <input type="password" placeholder="Contraseña" name="password"
                                                        class="form-control" id="inputPassword4" required>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="">Password</label>
                                                    <input id="password-confirm" type="password" class="form-control"
                                                        placeholder="Repita la contraseña" name="password_confirmation"
                                                        required autocomplete="new-password">
                                                </div>
                                            </div>


                                            <br>
                                            {{-- <button type="submit" class="btn btn-primary">Sign in</button> --}}
                                            <button type="submit" class="btn btn-secondary">Registrar</button>
                                            {{-- data-dismiss="modal" --}}
                                        </form>
                                    </div>
                                    {{-- <div class="modal-footer">
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <div>
                            <a href="https://api.whatsapp.com/send?phone=51961102930&text=Hola *Cliente VIP*, deseo más información..."
                                class="float" target="_blank">
                                
                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 418.135 418.135"
                                    style="enable-background:new 0 0 418.135 418.135;" xml:space="preserve">
                                    <g>
                                        <path style="fill:#7AD06D;"
                                            d="M198.929,0.242C88.5,5.5,1.356,97.466,1.691,208.02c0.102,33.672,8.231,65.454,22.571,93.536   L2.245,408.429c-1.191,5.781,4.023,10.843,9.766,9.483l104.723-24.811c26.905,13.402,57.125,21.143,89.108,21.631   c112.869,1.724,206.982-87.897,210.5-200.724C420.113,93.065,320.295-5.538,198.929,0.242z M323.886,322.197   c-30.669,30.669-71.446,47.559-114.818,47.559c-25.396,0-49.71-5.698-72.269-16.935l-14.584-7.265l-64.206,15.212l13.515-65.607   l-7.185-14.07c-11.711-22.935-17.649-47.736-17.649-73.713c0-43.373,16.89-84.149,47.559-114.819   c30.395-30.395,71.837-47.56,114.822-47.56C252.443,45,293.218,61.89,323.887,92.558c30.669,30.669,47.559,71.445,47.56,114.817   C371.446,250.361,354.281,291.803,323.886,322.197z" />
                                        <path style="fill:#7AD06D;"
                                            d="M309.712,252.351l-40.169-11.534c-5.281-1.516-10.968-0.018-14.816,3.903l-9.823,10.008   c-4.142,4.22-10.427,5.576-15.909,3.358c-19.002-7.69-58.974-43.23-69.182-61.007c-2.945-5.128-2.458-11.539,1.158-16.218   l8.576-11.095c3.36-4.347,4.069-10.185,1.847-15.21l-16.9-38.223c-4.048-9.155-15.747-11.82-23.39-5.356   c-11.211,9.482-24.513,23.891-26.13,39.854c-2.851,28.144,9.219,63.622,54.862,106.222c52.73,49.215,94.956,55.717,122.449,49.057   c15.594-3.777,28.056-18.919,35.921-31.317C323.568,266.34,319.334,255.114,309.712,252.351z" />
                                    </g>

                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- ============================================-->
        <!-- <section> begin ============================-->
        {{-- <section class="bg-info pt-0 pb-0">

            <div class="container">
                <div class="row justify-content-sm-between py-6">
                    <div class="col-auto mb-2">
                        <div class="d-flex">
                            <svg class="bi bi-check-circle" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                                fill="#ffffff" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                                <path
                                    d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z">
                                </path>
                            </svg>
                            <p class="mb-0 text-light ms-2">Comercios verificados.</p>
                        </div>
                    </div>
                    <div class="col-auto mb-2">
                        <div class="d-flex">
                            <svg class="bi bi-gear-wide-connected" xmlns="http://www.w3.org/2000/svg" width="26"
                                height="26" fill="#ffffff" viewBox="0 0 16 16">
                                <path
                                    d="M7.068.727c.243-.97 1.62-.97 1.864 0l.071.286a.96.96 0 0 0 1.622.434l.205-.211c.695-.719 1.888-.03 1.613.931l-.08.284a.96.96 0 0 0 1.187 1.187l.283-.081c.96-.275 1.65.918.931 1.613l-.211.205a.96.96 0 0 0 .434 1.622l.286.071c.97.243.97 1.62 0 1.864l-.286.071a.96.96 0 0 0-.434 1.622l.211.205c.719.695.03 1.888-.931 1.613l-.284-.08a.96.96 0 0 0-1.187 1.187l.081.283c.275.96-.918 1.65-1.613.931l-.205-.211a.96.96 0 0 0-1.622.434l-.071.286c-.243.97-1.62.97-1.864 0l-.071-.286a.96.96 0 0 0-1.622-.434l-.205.211c-.695.719-1.888.03-1.613-.931l.08-.284a.96.96 0 0 0-1.186-1.187l-.284.081c-.96.275-1.65-.918-.931-1.613l.211-.205a.96.96 0 0 0-.434-1.622l-.286-.071c-.97-.243-.97-1.62 0-1.864l.286-.071a.96.96 0 0 0 .434-1.622l-.211-.205c-.719-.695-.03-1.888.931-1.613l.284.08a.96.96 0 0 0 1.187-1.186l-.081-.284c-.275-.96.918-1.65 1.613-.931l.205.211a.96.96 0 0 0 1.622-.434l.071-.286zM12.973 8.5H8.25l-2.834 3.779A4.998 4.998 0 0 0 12.973 8.5zm0-1a4.998 4.998 0 0 0-7.557-3.779l2.834 3.78h4.723zM5.048 3.967c-.03.021-.058.043-.087.065l.087-.065zm-.431.355A4.984 4.984 0 0 0 3.002 8c0 1.455.622 2.765 1.615 3.678L7.375 8 4.617 4.322zm.344 7.646l.087.065-.087-.065z">
                                </path>
                            </svg>
                            <p class="mb-0 text-light ms-2">Administra tus puntos.</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex">
                            <svg class="bi bi-shield-lock-fill" xmlns="http://www.w3.org/2000/svg" width="26"
                                height="26" fill="#ffffff" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M8 0c-.69 0-1.843.265-2.928.56-1.11.3-2.229.655-2.887.87a1.54 1.54 0 0 0-1.044 1.262c-.596 4.477.787 7.795 2.465 9.99a11.777 11.777 0 0 0 2.517 2.453c.386.273.744.482 1.048.625.28.132.581.24.829.24s.548-.108.829-.24a7.159 7.159 0 0 0 1.048-.625 11.775 11.775 0 0 0 2.517-2.453c1.678-2.195 3.061-5.513 2.465-9.99a1.541 1.541 0 0 0-1.044-1.263 62.467 62.467 0 0 0-2.887-.87C9.843.266 8.69 0 8 0zm0 5a1.5 1.5 0 0 1 .5 2.915l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99A1.5 1.5 0 0 1 8 5z">
                                </path>
                            </svg>
                            <p class="mb-0 text-light ms-2">Canje de puntos garantizados.</p>
                        </div>
                    </div>
                </div>
                <div class="row flex-center">
                    
                </div>
                <hr class="opacity-25" />
                
            </div>

        </section> --}}
        <!-- <section> close ============================-->
        <!-- ============================================-->




        <!-- ============================================-->
        <!-- <section> begin ============================-->
        <section class="py-2">

            <div class="container">
                <div class="row flex-center">
                    <div class="col-sm-12 col-md-3 text-md-start px-md-0 pt-md-2 text-center">
                        <ul class="list-unstyled list-inline">
                            <li class="list-inline-item mr-3"><a class="text-decoration-none"
                                    href="https://www.facebook.com/clientevip.pe" target="../">
                                    <svg class="bi bi-facebook" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="#272D4E" viewBox="0 0 16 16">
                                        <path
                                            d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                        </path>
                                    </svg></a></li>
                            <li class="list-inline-item mr-3"><a class="text-decoration-none" href="#!">
                                    <svg class="bi bi-instagram" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="#272D4E" viewBox="0 0 16 16">
                                        <path
                                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z">
                                        </path>
                                    </svg></a></li>
                        </ul>
                    </div>
                    <div class="col-sm-12 col-md-6 px-md-0 text-md-center order-1 order-md-0">
                        <div class="text-400 text-center">
                            <p class="mb-0"> &nbsp;
                                {{-- <svg class="bi bi-suit-heart-fill" xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="#7854F7" viewBox="0 0 16 16">
                                    <path
                                        d="M4 1c2.21 0 4 1.755 4 3.92C8 2.755 9.79 1 12 1s4 1.755 4 3.92c0 3.263-3.234 4.414-7.608 9.608a.513.513 0 0 1-.784 0C3.234 9.334 0 8.183 0 4.92 0 2.755 1.79 1 4 1z">
                                    </path>
                                </svg> --}}
                                &nbsp; &nbsp;<a class="text-1000" href="#">Cliente VIP v2.0</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3 text-center text-md-end"> 
                        <a href="https://bit.ly/ClienteVipApp" target="../">
                            <img class="img-fluid" src="{{ asset('woo/assets/img/Google-Play-App-Store.png')}}" height="14" alt="" />
                        </a>
                    </div>
                </div>
            </div><!-- end of .container-->

        </section>
        <!-- <section> close ============================-->
        <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> --}}
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>

    <script src="{{ asset('woo/vendors/@popperjs/popper.min.js') }}"></script>
    <script src="{{ asset('woo/vendors/bootstrap/bootstrap.min.js') }}"></script>
    <script src="{{ asset('woo/vendors/is/is.min.js') }}"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <script src="{{ asset('woo/assets/js/theme.js') }}"></script>

    <script>
        // $(window).on('load', function() {
        //     $('#playstore-modal').modal('show');
        // });

        // $("#close").click(function() {
        //     $('#playstore-modal').modal('hide');
        // });

        $(document).ready(function() {
            $('#negocio_form').on('submit', function(event) {
                event.preventDefault();
                // $('body').loadingModal({
                //     text: 'Espere, estamos procesando...',
                //     animation: 'threeBounce',
                //     opacity:'0.7',
                // });
                // $('#load-on').css('display','block');
                // console.log('in form')
                $.ajax({
                    url: "{{ url('registranegocio') }}",
                    method: "POST",
                    data: new FormData(this),
                    dataType: 'JSON',
                    contentType: false,
                    cache: false,
                    processData: false,
                    success: function(data) {
                        console.log(data);
                        if (data.ok) {
                            alert(data.ok);
                            // toastr.success(data.ok)
                            location.reload(true);
                            // $('body').loadingModal('hide');
                        } else {
                            alert(data.error);
                            // toastr.error(data.error)
                            // location.reload(true);
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        console.log(XMLHttpRequest.responseJSON.errors)
                        console.log(XMLHttpRequest)
                        alert("error servidor: " + XMLHttpRequest.responseJSON.errors);
                        // toastr.error("Contactarse con el administrador");
                        // location.reload(true);
                    }

                    // error: function(reject) {
                    //     console.log(reject);
                    //     if (reject.status === 422) {
                    //         var errors = $.parseJSON(reject.responseText);
                    //         $.each(errors, function(key, val) {
                    //             $("#" + key + "_error").text(val[0]);
                    //         });
                    //     }
                    // }
                })
            })

        })
    </script>

</body>

</html>
