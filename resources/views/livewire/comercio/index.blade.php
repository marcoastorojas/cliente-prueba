@extends('layouts.app')
@section('content')

    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    @livewire('comercio')
                </div>
            </div>
        </div>
    </main>
    <script>
        window.addEventListener('alert', event =>{
            toastr.success(event.detail.message);
        })
    </script>
@endsection
