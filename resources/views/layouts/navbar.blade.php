<!-- Navbar -->
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
navbar-scroll="true">
<div class="container-fluid py-1 px-3">
    <nav aria-label="breadcrumb">
        <h6 class="font-weight-bolder mb-0">{{Auth::user()->name }} ->  {{Auth::user()->local ? Auth::user()->local->titulo:''}}</h6>
    </nav>
    <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
        <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
            </div>
        </div>
        <ul class="navbar-nav  justify-content-end">
            @guest
            @else

                {{-- <li class="nav-item d-flex align-items-center">
                    <a href="{{ route('logout') }}" class="nav-link text-body font-weight-bold px-0"
                        onclick="event.preventDefault();
                                                                                                    document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <span class="d-sm-inline d-none">Salir</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li> --}}
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
</nav>
<!-- End Navbar -->