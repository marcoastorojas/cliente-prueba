<?php

namespace App\Http\Controllers\comprobantes;

use App\Http\Controllers\Controller;
use App\Models\Detalleventa;
use App\Models\Localplan;
use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use PDF;
use Barryvdh\DomPDF\Facade\Pdf;

class FacturacionController extends Controller
{

    public function listarcabeceras()
    {
        // echo date( "Y-m-d", strtotime( "2009-01-31 +1 day" ) ),"\n"; // PHP:  2009-03-03
        // echo date( "Y-m-d", strtotime( "2022-05-31 +3 month" ) ),"\n"; // PHP:  2009-03-31
        // SELECT DATE_ADD( '2009-01-31', INTERVAL 1 MONTH ); // MySQL:  2009-02-28

        // $locales = DB::table('locales')->select('id', 'titulo', 'direccion', 'celular', 'email')
        //     ->where('estado', 1)
        //     ->orderBy('titulo', 'asc')
        //     ->get();

        $planes = DB::table('planes')->select('id', 'plan', 'tarifa')
            ->where('estado', 1)
            ->get();
        $localplans = Localplan::with('locale.user', 'plane', 'periodo')->get();


        $nroinvoice = DB::table('ventas')->where('estadoventa', 1)->max('nrocomprobante');
        // $nroinvoice = DB::table('ventas')->latest()->first();

        return response()->json([
            "status" => 1,
            "msg" => "hay data",
            "locales" => $localplans,
            "planes" => $planes,
            "nroinvoice" => $nroinvoice
        ]);
    }
    public function convertirperidos(Request $request)
    {
        // dd($request->all());

        $resul1 = date("Y-m-d", strtotime($request->fecha . " +" . $request->periodo . "month")); // PHP:  2009-03-31
        $resul2 = date("d/m/Y", strtotime($request->fecha . " +" . $request->periodo . "month")); // PHP:  2009-03-31
        $resul3 = date("d/m/Y", strtotime($request->fecha)); // PHP:  2009-03-31
        $vencimiento = date("Y-m-d", strtotime($request->fecha . " +15 day")); // PHP:  2009-03-31
        return response()->json([
            "status" => 1,
            "fechafin" => $resul1,
            "fechainiformato" => $resul3,
            "fechafinformato" => $resul2,
            "vencimiento" => $vencimiento
        ]);
    }
    public function convertirfechavenc(Request $request)
    {
        $resul1 = date("Y-m-d", strtotime($request->vencimiento . " +10 day")); // PHP:  2009-03-31
        return response()->json([
            "status" => 1,
            "fechavencimiento" => $resul1,
        ]);
    }

    public function listventas()
    {
        // $ventas = DB::table('ventas as v')
        //     // ->join('locales as l', 'v.locale_id', '=', 'l.id')
        //     ->select('v.id', 'v.nrocomprobante', 'v.fecha', 'v.vencimiento', 'v.estado', 'v.total')
        //     ->get();
        $ventas = Venta::with('localplan.locale','detalleventa')
            ->where('estadoventa', 1)
            ->orderBy('nrocomprobante', 'desc')
            ->get();
        return response()->json([
            "status" => 1,
            "msg" => "hay data",
            "listventas" => $ventas
        ]);
    }
    public function register(Request $request)
    {
        $decibe = $request->all();
        // dd($decibe);
        DB::beginTransaction();
        try {
            $venta = new Venta();
            $venta->nrocomprobante = $request['nrocomprobante'];
            $venta->localplan_id = $request['idlocalplan'];
            $venta->fecha = $request['fecha'];
            $venta->vencimiento = $request['vencimiento'];
            $venta->total = $request['detalles']['subtotal'];
            $venta->estado = $request['estado'];
            $venta->estadoventa = 1;
            $venta->save();

            $detalle = new Detalleventa();
            $detalle->venta_id = $venta->id;
            $detalle->plan = $request['detalles']['plan'];
            $detalle->periodo = $request['detalles']['periodo'];
            $detalle->fechaini = $request['detalles']['fechaini'];
            $detalle->fechafin = $request['detalles']['fechafin'];
            $detalle->descripcion = $request['detalles']['descripcion'];
            $detalle->cantidad = $request['detalles']['cantidad'];
            $detalle->precio = $request['detalles']['precio'];
            $detalle->subtotal = $request['detalles']['subtotal'];
            $detalle->save();

            // $localplan = Localplan::where('id', $request['idlocalplan'])->first();
            // $detalle->fechapago = $request['detalles']['fechafin'];

            DB::table('localplans')->where('id', $request['idlocalplan'])
                ->update(['fechapago' => $request['detalles']['fechafin']]);

            DB::commit();

            return response()->json([
                "status" => 1,
                "msg" => "se registró",
                "listventas" => $venta
            ]);
        } catch (\Throwable $th) {
            // throw $th;
            DB::rollback();
            return response()->json([
                "status" => 0,
                "success" => 'ok',
                'message' => $th,
            ]);
        }
    }

    public function imprimir(Request $request)
    {
        // $pdf = App::make('dompdf.wrapper');
        // $pdf = PDF::loadView('pdf.invoice', $data);
        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();

        // $ventas = DB::table('ventas as v')
        //     ->join('locales as l', 'v.locale_id', '=', 'l.id')
        //     ->select('v.id', 'v.nrocomprobante', 'v.fecha', 'v.vencimiento', 'l.titulo', 'l.celular', 'l.direccion', 'l.email', 'v.estado', 'v.total')
        //     ->where('v.id', $request->idventa)
        //     ->first();

        $ventas = Venta::where('id', $request->idventa)
            ->with('localplan.locale.user')
            ->first();
        // dd($ventas);
        $detalles = Detalleventa::where('venta_id', $request->idventa)->get();

        // $pdf = App::make('dompdf.wrapper');
        // $pdf = Pdf::loadView('backend.facturacion.imprimirpdf', ['venta'=>$ventas, 'detalles'=>$detalles]);

        return view('backend.facturacion.imprimirpdf', ['venta' => $ventas, 'detalles' => $detalles]);

        // $pdf->loadHTML('<h1>Test</h1>');
        // return $pdf->stream();
    }

    public function eliminarventa(Request $request)
    {
        try {
            // $detalle = DB::table('detalle')
            //     ->where('venta_id', $request->idventa)
            //     ->delete();

            // $venta = DB::table('ventas')
            //     ->where('id', $request->idventa)
            //     ->delete();

            $venta = Venta::where('id', $request->idventa)->first();
            $venta->estadoventa = 0;
            $venta->save();

            return response()->json([
                "status" => 1,
                "success" => 'ok',
                'message' => 'El Comprobante se eliminó con éxito.',
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function cancelarfactura(Request $request)
    {
        try {
            $venta = Venta::where('id', $request->idventa)->first();
            $venta->estado = 1;
            $venta->save();

            return response()->json([
                "status" => 1,
                "success" => 'ok',
                'message' => 'El ESTADO se actualizó con éxito.',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }
}
