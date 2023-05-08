@extends('layouts.app')
@section('title', __('Dashboard'))
@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        <!-- Navbar -->
        {{-- <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            navbar-scroll="true">
            <div class="container-fluid py-1 px-3">
                <nav aria-label="breadcrumb">
                    <h6 class="font-weight-bolder mb-0">Cliente VIP</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        <div class="input-group">
                        </div>
                    </div>
                    <ul class="navbar-nav  justify-content-end">
                        @guest
                        @else

                            <li class="nav-item d-flex align-items-center">
                                <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span class="d-sm-inline d-none">Salir</span>
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        @endguest
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav> --}}

        <nav class="navbar navbar-main navbar-expand-lg bg-transparent shadow-none position-absolute px-4 w-100 z-index-2">
            <div class="container-fluid py-1">
                <nav aria-label="breadcrumb">
                    {{-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 ps-2 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="text-white opacity-5" href="javascript:;">Pages</a></li>
                        <li class="breadcrumb-item text-sm text-white active" aria-current="page">Profile</li>
                    </ol> --}}
                    <h6 class="text-white font-weight-bolder ms-2">ClienteVIP</h6>
                </nav>
                <div class="collapse navbar-collapse me-md-0 me-sm-4 mt-sm-0 mt-2" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                        {{-- <div class="input-group">
                            <span class="input-group-text text-body"><i class="fas fa-search"
                                    aria-hidden="true"></i></span>
                            <input type="text" class="form-control" placeholder="Type here...">
                        </div> --}}
                    </div>
                    <ul class="navbar-nav justify-content-end">
                        {{-- <li class="nav-item d-flex align-items-center">
                            <a href="{{ route('logout') }}" class="nav-link text-white font-weight-bold px-0" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt"></i>
                                <span class="d-sm-inline d-none">Salir</span>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li> --}}
                        <li class="nav-item d-xl-none ps-3 pe-0 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-white p-0">
                                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                    <div class="sidenav-toggler-inner">
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                        <i class="sidenav-toggler-line bg-white"></i>
                                    </div>
                                </a>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid">
            <div class="page-header min-height-150 border-radius-xl mt-4"
                style="background-image: url('{{ asset('#') }}'); background-position-y: 50%;">
                {{-- back/assets/img/curved-images/curved0.jpg --}}
                <span class="mask" style="background-color: #f9c200 !important;"></span>


                <div class="container">
                    <div class="col-auto row gx-2">
                        <div class="col-auto">
                            <div class="avatar avatar-xl position-relative">
                                <img src="{{ asset('back/assets/img/bruce-mars.png') }}" alt="profile_image"
                                    class="w-800 border-radius-lg shadow-sm">
                            </div>
                        </div>
                        <div class="col-auto my-auto">
                            <div class="h-100">
                                <h5 class="mb-1">
                                    Hola, <strong> {{ Auth::user()->name }} </strong>
                                </h5>
                                <p class="mb-0 font-weight-bold text-sm">
                                    @can('negocio_puntos_canges')
                                    bbbb
                                  @endcan  

                                <h6>Bienvenido/a a <strong>Cliente VIP.
                                        {{-- </strong> Visualiza tus puntos aquí</h6> --}}
                                        </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="card card-body blur shadow-blur mx-2 mt-n7 overflow-hidden">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ asset('back/assets/img/bruce-mars.png') }}" alt="profile_image"
                                class="w-70 border-radius-lg shadow-sm">
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                Hola, <strong> {{ Auth::user()->name }} </strong>
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                            <h6>Bienvenido/a a <strong>Cliente VIP. 
                                </strong> Visualiza tus puntos aquí</h6>
                            </p>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
        <div class="container-fluid py-4">


            {{-- <div>
                <h6>Hola <strong>{{ Auth::user()->name }}, </strong> Visualiza
                    tus PUNTOS aquí</h6>
            </div> --}}
            {{-- <hr class="horizontal dark my-sm-4"> --}}
            {{-- <br> --}}
            {{-- <div class="row my-4">
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Money</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                $53,000
                                                <span class="text-success text-sm font-weight-bolder">+55%</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Today's Users</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                2,300
                                                <span class="text-success text-sm font-weight-bolder">+3%</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">New Clients</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                +3,462
                                                <span class="text-danger text-sm font-weight-bolder">-2%</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-sm-6">
                        <div class="card">
                            <div class="card-body p-3">
                                <div class="row">
                                    <div class="col-8">
                                        <div class="numbers">
                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">Sales</p>
                                            <h5 class="font-weight-bolder mb-0">
                                                $103,430
                                                <span class="text-success text-sm font-weight-bolder">+5%</span>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-4 text-end">
                                        <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                                            <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            <div class="row">
                <div class="col-lg-6">

                    @foreach ($cupones as $cupon)
                        <a href="{{ url('activar-cpromocional/' . $cupon->id) }}">
                            <div class="position-relative">
                                <img src="{{ asset('img/' . $cupon->file) }}" alt="profile_image"
                                    class="w-100 border-radius-lg shadow-sm">
                            </div>
                        </a>
                        <br>
                        <div>
                            <i class="fa-solid fa-circle-info"></i>Info. Contactar al área de soporte: <a
                                href='https://wa.me/51952633245?text=(Cliente VIP Web): Hola, No puedo visualizar mis puntos acumulados anteriormente...'
                                target='../'> Click Aquí</a>
                        </div>
                        <br>
                    @endforeach

                    @if (count($localperson) == 0)

                        <div class="alert alert-dark" role="alert" style="color: white;">
                            <label for="" style="color: white;">Para acumluar puntos:</label>
                            <ul>
                                <li>
                                    En cada compra o pedido en un negocio afiliado a Cliente VIP, comuníca que estás
                                    registrado e indícales tu N° de DNI (luego de hacer el pago).
                                </li>
                                <li>
                                    Verifica tus puntos obtenidos después de cada compra (actualizar plataforma).
                                </li>
                            </ul>
                            <label for="" style="color: white; font-style: italic;">Recuerda por cada S/1 de compra
                                recibirás 1 punto.</label>
                            <div style="text-align: center">
                                <a href="{{ url('/negocios') }}" class="btn btn-warning btn-sm mb-0" style="color: black">
                                    Negocios Afiliados Aquí</a>
                            </div>
                        </div>
                    @else
                        <div class="alert alert-dark" role="alert" style="color: white;">
                            <ul>
                                <li>
                                    Por cada S/ 1 acumulas 1 punto.
                                </li>
                                <li>
                                    ( <i class="fa-solid fa-gift" style="color: orange"></i> ) Negocios donde ya puedes
                                    canjear
                                    una recompensa.
                                </li>
                            </ul>
                        </div>
                        <div class="row my-2">
                            <div>
                            </div>
                            @foreach ($localperson as $item)
                                <div class="col-lg-12 col-md-6 mb-md-0 mb-0">
                                    <div class="card">
                                        <div class="card-body p-3">
                                            <div class="row">
                                                <div class="col-3">
                                                    <a href="{{ url('inforedencion/' . $item->locale->id) }}">
                                                        <div class="avatar avatar-xl position-relative">
                                                            <img src="{{ asset('img/' . $item->locale->logo) }}"
                                                                alt="profile_image"
                                                                class="w-100 border-radius-lg shadow-sm">
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-7">
                                                    <a href="{{ url('inforedencion/' . $item->locale->id) }}">
                                                        <div class="numbers">
                                                            <p class="text-sm mb-0 text-capitalize font-weight-bold">
                                                                {{ $item->locale->titulo }}</p>
                                                            <h5 class="font-weight-bolder mb-0">
                                                                {{ round($item->totpuntos, 0) }}
                                                                <span
                                                                    class="text-success text-sm font-weight-bolder">Puntos</span>
                                                                @foreach ($item->locale->redenciones->take(1) as $reden)
                                                                    @if ($item->totpuntos >= $reden->puntos)
                                                                        <i class="fa-solid fa-gift" style="color: orange"></i>
                                                                    @endif
                                                                @endforeach
                                                            </h5>
                                                        </div>
                                                    </a>
                                                </div>
                                                <div class="col-2 text-end">
                                                    <a href="{{ url('inforedencion/' . $item->locale->id) }}"
                                                        class="icon icon-shape bg-warning shadow text-center border-radius-md">
                                                        {{-- <i class="fas fa-chart-bar"></i> --}}
                                                        <i class="fas fa-angle-right" style="color: black;"></i>
                                                    </a>
                                                    {{-- <div>
                                                        <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                                                    </div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    {{-- <div class="card">
                                <div class="card-header pb-0">
                                    <div class="row">
                                        <div class="col-lg-6 col-7">
                                            <h6>Projects</h6>
                                            <p class="text-sm mb-0">
                                                <i class="fa fa-check text-info" aria-hidden="true"></i>
                                                <span class="font-weight-bold ms-1">30 done</span> this month
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-5 my-auto text-end">
                                            <div class="dropdown float-lg-end pe-4">
                                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v text-secondary"></i>
                                                </a>
                                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another
                                                            action</a></li>
                                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something
                                                            else here</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body px-0 pb-2">
                                    <div class="table-responsive">
                                        <table class="table align-items-center mb-0">
                                            <thead>
                                                <tr>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Comercios</th>
                                                    <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Puntos</th>
                                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex px-2 py-1">
                                                            <div>
                    
                                                                <i class="far fa-building"></i>
                                                            </div>
                                                            <div class="px-2 d-flex flex-column justify-content-center">
                                                                <h6 class="mb-0 text-sm">Soft UI XD Version</h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td class="align-middle text-center text-sm">
                                                        <span class="text-xs font-weight-bold"> $14,000 </span>
                                                    </td>
                                                    <td class="align-middle">
                                                        <div class="progress-wrapper w-75 mx-auto">
                    
                                                            <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                                data-toggle="tooltip" data-original-title="Edit user">
                                                                Edit
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                    
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div> --}}
                                </div>
                            @endforeach
                        </div>
                        <div style="text-align: center">
                            <a href="{{ url('/negocios') }}" class="btn btn-warning btn-sm mb-0" style="color: black">
                                Negocios Afiliados Aquí</a>
                        </div>

                    @endif



                </div>
                {{-- <div class="col-lg-6 col-md-6">
                    <div class="col-lg-12">
                        <div class="card h-100 p-3">
                            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100"
                                style="background-image: url('{{ asset('back/assets/img/acumulapuntos.png') }}');">
                                <span class="mask bg-gradient-dark"></span>
                                <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
                                    <h5 class="text-white font-weight-bolder mb-4 pt-2">Acumula puntos</h5>
                                    <br><br>
                                    <br><br>
                                    <p class="text-white">Recibe recompensas y beneficios; sé un CLIENTE VIP.</p>
                                    <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto"
                                        href="javascript:;">
                                        Ver más
                                        <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            </div>
            <div class="modal hide fade" id="playstore-modal" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <a href="https://clientevip.page.link/CVaw">
                                <img class="img-fluid" src="{{ asset('back/assets/img/abrirenapp.png') }}"
                                    alt="" style="border-radius: 5px 5px 5px 5px;" />
                            </a>
                        </div>
                        {{-- <div class="modal-body" style="background-color:  #f3c414;padding: 5px;border-radius: 0px;">
                            <input id="noShowMore" type="checkbox" onclick="noShowMore(this)">
                            <label for="noShowMore"> No mostrar nunca mas </label>
                        </div> --}}
                        <div class="modal-footer">
                            <div style="background-color: 5px;border-radius: 0px;">
                                <input id="noShowMore" type="checkbox" onclick="noShowMore(this)">
                                <label for="noShowMore"> No mostrar nunca mas </label>
                            </div>
                            <button type="button" class="btn btn-dark" data-dismiss="modal"
                                id="close">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>   

            <br><br><br>
            @include('layouts.footer')
        </div>
    </main>
    {{-- @include('layouts.theme') --}}
@endsection

@section('scripts')
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js"></script>
<script>
    let showModal = localStorage.getItem('noShowMore');
    console.log(showModal)
    if(showModal){
        $('#playstore-modal').modal('hide');
    }else{
        $('#playstore-modal').modal('show');
    }
    function noShowMore(e) {
        localStorage.setItem('noShowMore', e.checked)
    }

    // $(window).on('load', function() {
    //     $('#playstore-modal').modal('show');
    // });

    // $("#close").click(function() {
    //     $('#playstore-modal').modal('hide');
    // });

    
</script>
@endsection
