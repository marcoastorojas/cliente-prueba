
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imprimir</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-sm-12">
                    <div style="text-align: center">
                        {{-- <img src="/img/logoadv.png" id="imagen" width="20%"> --}}
                        {{-- <img src="{{ public_path('back/assets/img/logo-cv2.png') }}" alt="" width="120" /><br> --}}
                        <img src="{{ asset('back/assets/img/logo-cv2.png') }}" alt="" width="120" /><br>
                        <span>Plataforma de fidelización de clientes.</span> <br>
                        <span>negocios@clientevip.pe</span>

                    </div>
                    <br>
                </div>
                {{-- <div class="col-sm-4" style="text-align: center ">
                    
                    
                </div> --}}
                {{-- <div class="col-sm-4" >
                    <div style="text-align: center">
                        <img src="/img/logoacms.png" id="imagen" width="40%">
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
    {{-- <hr> --}}
    <div class="row">
        
        <table class="table" border="0">
            <tr>
                <td style="width: 50px;">
                    <b>CLIENTE:</b> <br>
                    <b>TELÉFONO:</b> <br>
                    <b>EMAIL:</b> <br>
                </td>
                <td>
                    {{$venta->localplan->locale->titulo}} <br>
                    {{$venta->localplan->locale->celularprop}} <br>
                    {{$venta->localplan->locale->user->email}} <br>
                </td>
                
                <td style="width: 150px;">
                    <b>INVOICE:</b>  <br>
                    <b>FECHA:</b>  <br>
                    <b>VENCIMIENTO:</b>  <br>
                    <b>TOTAL:</b>  <br>
                    <b>ESTADO:</b> 

                </td>
                <td style="width: 150px;">
                    INV-0000{{$venta->nrocomprobante}} <br>
                    {{date( "d-m-Y", strtotime($venta->fecha))}} <br>
                    {{date( "d-m-Y", strtotime($venta->vencimiento))}} <br>
                    S/ {{$venta->total}} <br>
                    @if ($venta->estado == 1)
                        Cancelado
                    @else
                        Pendiente
                    @endif
                </td>
            </tr>
            
        </table>

        {{-- <div class="col-sm-4">
            <div style="text-align: center; font-style: italic;">
                <b>INVOICE: INV-0000{{$venta->nrocomprobante}}</b>
                 
            </div>
        </div>
        <div class="col-sm-4">
            <div style="text-align: center; font-style: italic;">
                <b>FECHA: {{$venta->fecha}}</b>
                
            </div>
        </div>
        <div class="col-sm-4">
            <div style="text-align: center; font-style: italic;">
                <b>VENCIMIENTO: {{$venta->vencimiento}} </b>
                
            </div>
        </div>
        <div class="col-sm-4">
            <div style="text-align: center; font-style: italic;">
                <b>CLIENTE: {{$venta->titulo}} </b>
                
            </div>
        </div> --}}
    </div>
    <br>
    
    <table class="table table-sm table-bordered">
        <thead>
            <tr>
                <th>SERVICIO</th>
                <th class="text-center" style="width: 130px;">TARIFA</th>
                <th class="text-center" style="width: 130px;">CANTIDAD</th>
                <th class="text-center" style="width: 130px;">TOTAL</th>
                
            </tr>

        </thead>
        <tbody>
            @foreach ($detalles as $index => $det)
                <tr>
                    <td>{{$det->descripcion}}</td>
                    <td class="text-right">{{$det->precio}}</td>
                    <td class="text-right">{{$det->cantidad}}</td>
                    <td class="text-right">{{$det->subtotal}}</td>
                    
                    {{-- <td class="text-right">{{number_format($det->diezmo + $det->ofrenda + $det->rnt + $det->libro_misionero + $det->otros,2)}}</td> --}}
                    
                </tr>
            @endforeach
            <tr>
                <th colspan="3" class="text-right">TOTAL</th>                
                <th class="text-right">S/ {{ number_format($venta->total,2)}}</th>
                {{-- <th class="text-right">{{ number_format($ofrendatot,2)}}</th>
                <th class="text-right">{{ number_format($rnttot,2)}}</th>
                <th class="text-right">{{ number_format($librotot,2)}}</th>
                <th class="text-right">{{ number_format($otrostot,2)}}</th> --}}
                {{-- <th class="text-right">{{ number_format($diezmotot + $ofrendatot + $rnttot + $librotot + $otrostot,2)}}</th> --}}
            </tr>
        </tbody>
    </table>

    </div>
    
    
</body>
<script>
    window.print();
</script>
</html>