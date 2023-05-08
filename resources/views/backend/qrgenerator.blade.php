@extends('layouts.app')
@section('content')
    <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
        @include('layouts.navbar')
        <div class="container-fluid">
            <br><br>
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div>
                        <form action="{{ url('qr-generate') }}" method="POST">
                            @csrf
                            Contenido:
                            <input type="text" name="descripcion" required>
                            <button type="submit">Generar QR</button>
                        </form>

                    </div>
                    <br><br>
                    @if ($valor)
                        {!! QrCode::size(400)->style('round')->generate($valor) !!}
                        {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::size(500)->style('round')->generate($valor)) !!} "> --}}
                        {{-- {!! QrCode::size(500)->generate(Request::url()); !!} --}}
                    @endif
                    {{-- <img src="{!!$valor->embedData(QrCode::format('png')->generate('Embed me into an e-mail!'), 'QrCode.png', 'image/png')!!}"> --}}

                    {{-- {!! QrCode::format('png')->merge('https://cdn.icon-icons.com/icons2/2657/PNG/256/facebook_icon_161067.png', .3, true)->generate(); !!} --}}

                    {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('Make me into an QrCode!')) !!} "> --}}

                    {{-- <div class="visible-print text-center">
                        {!! QrCode::size(500)->generate(Request::url()); !!}
                        <p>Scan me to return to the original page.</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </main>
@endsection
