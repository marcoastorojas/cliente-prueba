<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('woo/assets/img/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('woo/assets/img/favicons/favicon.png') }}">
    <title>
        ClienteVIP
    </title>
    <meta name="msapplication-TileImage" content="{{ asset('woo/assets/img/favicons/favicon.png') }}">
    <meta name="description" content="ClienteVip, Gana recompensas y cashback por tus consumos">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="{{ asset('back/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ asset('back/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('back/assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-13E2B8MGNL"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-13E2B8MGNL');
    </script>
    {!! htmlScriptTagJsApi(['action' => 'homepage']) !!}
</head>

<body class="g-sidenav-show  bg-gray-100">
    <!-- Navbar -->
    {{-- <nav
        class="navbar navbar-expand-lg position-absolute top-0 z-index-3 w-100 shadow-none my-3  navbar-transparent mt-4">
        <div class="container">
            <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{ url('/') }}">
                <img src="{{ asset('back/assets/img/logo-cv2.png') }}" alt="" width="130" />
            </a>

            <div class="collapse navbar-collapse w-100 pt-3 pb-2 py-lg-0" id="navigation">

            </div>
        </div>
    </nav> --}}
    <!-- End Navbar -->
    <section class="min-vh-100 mb-8" id="app">

        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg">
            <span class="mask bg-gradient-dark opacity-10"></span>

        </div>
        <div class="container">
            <div class="row mt-lg-n10 mt-md-n10 mt-n10">
                <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
                    <div class="card z-index-0">
                        <div class="row justify-content-center">
                            <div class="col-lg-12 text-center mx-auto">
                                
                                <h1 class="text-black mb-2 mt-5">
                                    <a class="navbar-brand font-weight-bolder ms-lg-0 ms-3 text-white" href="{{ url('/') }}">
                                        <img src="{{ asset('back/assets/img/logo-cv2.png') }}" alt="" width="180" />
                                    </a>
                                </h1>
                                
                                <p class="text-lead text-black">Acumúla puntos en los negocios afiliados.
                                </p>
                            </div>
                        </div>

                        {{-- formulario registro --}}
                        <register-component></register-component>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- -------- START FOOTER 3 w/ COMPANY DESCRIPTION WITH LINKS & SOCIAL ICONS & COPYRIGHT ------- -->
    <footer class="footer py-5">
        <div class="container">
            <div class="row">

            </div>
            <div class="row">
                <div class="col-8 mx-auto text-center mt-1">
                    <p class="mb-0 text-secondary">
                        <script>
                            document.write(new Date().getFullYear())
                        </script> ClienteVIP.
                    </p>
                </div>
            </div>
        </div>
    </footer>
    
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
