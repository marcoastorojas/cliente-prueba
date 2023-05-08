@extends('layouts.app')
@section('styles')
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css"> --}}
@endsection
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid" id="app">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#tab1" type="button" role="tab" aria-controls="home" aria-selected="true">Comprobantes</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#tab2" type="button" role="tab" aria-controls="profile" aria-selected="false">Negocios</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="contact-tab" data-toggle="tab" data-target="#tab3" type="button" role="tab" aria-controls="contact" aria-selected="false">Reportes</button>
                </li>
              </ul>
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab1" role="tabpanel" aria-labelledby="home-tab">
                    <comprobante-component></comprobante-component>
                </div>
                <div class="tab-pane fade" id="tab2" role="tabpanel" aria-labelledby="profile-tab">
                    ...
                </div>
                <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="contact-tab">...</div>
              </div>
            {{-- <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <div class="float-left">
                            <h4>Elaboracion de comprobantes </h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    
                </div>
            </div> --}}
            {{-- <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </main>
    <script src="{{ mix('js/app.js') }}"></script>
@endsection
