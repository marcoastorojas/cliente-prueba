<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('woo/assets/img/favicons/favicon1.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('woo/assets/img/favicons/favicon1.png') }}">
    <title>
        ClienteVIP
    </title>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Nucleo Icons -->
    <link href="{{ asset('back/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('back/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/b9dfd2e376.js" crossorigin="anonymous"></script>
    <link href="{{ asset('back/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ asset('back/assets/css/soft-ui-dashboard.css?v=1.0.3') }}" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
    <link rel="stylesheet" href="{{ asset('back/assets/select2/css/select2.min.css') }}"> --}}
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css"> --}}
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    @yield('styles')
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
    <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 "
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href="{{ url('/home') }}" style="display: grid;text-align: center"> 
                <img src="{{ asset('back/assets/img/logo-cv3.png') }}" class="navbar-brand-img h-100" alt="main_logo">
            </a>
           
            
        </div>
        <hr class="horizontal dark mt-0">
        <div class="collapse navbar-collapse  w-auto  max-height-vh-100 h-100" id="sidenav-collapse-main">
            @include('backend.menu')
        </div>
        {{-- <div class="sidenav-footer mx-3 ">
            <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
                <div class="full-background"
                    style="background-image: url('{{ asset('back/assets/img/curved-images/white-curved.jpeg') }}')">
                </div>
                <div class="card-body text-start p-3 w-100">
                    <div
                        class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                        <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true"
                            id="sidenavCardIcon"></i>
                    </div>
                    <div class="docs-info">
                        <h6 class="text-white up mb-0">Need help?</h6>
                        <p class="text-xs font-weight-bold">Please check our docs</p>
                        <a href="https://www.creative-tim.com/learning-lab/bootstrap/license/soft-ui-dashboard"
                            target="_blank" class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
                    </div>
                </div>
            </div>
            <a class="btn bg-gradient-primary mt-4 w-100"
                href="https://www.creative-tim.com/product/soft-ui-dashboard-pro?ref=sidebarfree" type="button">Upgrade
                to pro</a>
        </div> --}}
    </aside>


    @yield('content')

    @livewireScripts

    <!--   Core JS Files   -->
    <script src="{{ asset('back/assets/js/core/popper.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
    <script src="{{ asset('back/assets/js/plugins/chartjs.min.js') }}"></script>


    {{-- <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script> --}}
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ asset('back/assets/js/soft-ui-dashboard.min.js?v=1.0.3') }}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
    <script src="{{ asset('back/assets/select2/js/select2.full.min.js') }}"></script> --}}
    {{-- <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js" defer></script> --}}
    <script src="{{ asset('js/app_old.js') }}" defer></script>
    @yield('scripts')
    <script>
        const Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.addEventListener('mouseenter', Swal.stopTimer)
            toast.addEventListener('mouseleave', Swal.resumeTimer)
        }
        })


        $(function() {
            $('.pop').on('click', function() {
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                $('#imagemodal').modal('show');
            });
        });
    </script>
    {{-- <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()
        })
        getimpersonate();

        function getimpersonate() {
            @hasanyrole('Admin')
                $.get("{{ route('users.users_impersonate') }}", function (r) {
                var html;
                html += '<option value="">Buscar Restaurante</option>';
                $.each(r, function(i,item){
                html += '<option value="'+item.id+'">'+item.nombres+' ('+item.tienda+')</th>';
                    })
                    $("#userid").html( html );
                    })
                @endhasanyrole
        }

        function impersonate() {
            var userid = $("#userid").val();
            var url = "{{ url('impersonate') }}";
            $.get(url + '/' + userid, function(r) {
                //window.location.replace("/home");
                window.location.href = "/home";
            })
        }
    </script> --}}
    @include('sweetalert::alert')
</body>

</html>
