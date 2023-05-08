<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>Lealtad Soft</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/cover/">



    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity=""
        crossorigin="anonymous">



    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/4.6/assets/img/favicons/apple-touch-icon.png"
        sizes="180x180">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
    <link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
    <meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
    <meta name="theme-color" content="#563d7c">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.6/examples/cover/cover.css" rel="stylesheet">
</head>

<body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Leal Soft</h3>
                <nav class="nav nav-masthead justify-content-center">
                    {{-- <a class="nav-link active" href="#">Home</a>
                    <a class="nav-link" href="#">Quines somos?</a>
                    <a class="nav-link" href="{{ route('login') }}">Login</a> --}}
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading">CIENTOS DE NEGOCIOS PARA ACUMULAR Y CANJEAR PUNTOS</h1>
            <p class="lead">Cada negocio tiene un sistema de recompensas por tus consumos.</p>
            <p class="lead">
                <a href="{{ route('login') }}" class="btn btn-lg btn-secondary">Ingresar</a>
                <a href="{{ route('register') }}" class="btn btn-lg btn-secondary">Regístrate</a>
            </p>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Derechos reservados <a href="#">lealsoft</a>, <a href="#">2021</a>.</p>
            </div>
        </footer>
    </div>



</body>

</html>
