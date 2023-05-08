@extends('layouts.app')
@section('content')
<main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    @include('layouts.navbar')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @livewire('users')
            </div>
        </div>
    </div>
</main>
<script>
    window.addEventListener('alert', event => {
        toastr.success(event.detail.message);
    })
    // window.addEventListener('canges', event => {
    //     toastr.info(event.detail.message, 'Recompensa disponible para canjear:');
    // })
</script>
@endsection
