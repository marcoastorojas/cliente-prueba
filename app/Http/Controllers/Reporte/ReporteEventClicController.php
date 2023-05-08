<?php

namespace App\Http\Controllers\Reporte;

use App\Http\Controllers\Controller;
use App\Models\Eventclic;
use App\Models\Locale;
use App\Models\Localpersona;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReporteEventClicController extends Controller
{
    public $fechaini, $fechafin;

    public function index(Request $request)
    {
        $this->fechaini = $request->fechaini;
        $this->fechafin = $request->fechafin;

        $anio_mes = '2022-12';

        $eventosclicks = DB::table('eventclics')
            ->where('estado', 1)
            ->join('locales', 'locales.id', '=', 'eventclics.locale_id')
            ->selectRaw('locales.titulo, eventclics.origen, DATE_FORMAT(eventclics.created_at,"%Y-%m") as fechasclic, COUNT(eventclics.locale_id) as cant_cli')
            ->where(DB::raw('DATE_FORMAT(eventclics.created_at,"%Y-%m")'), $anio_mes)
            ->groupBy('locales.titulo', 'fechasclic', 'eventclics.origen')
            ->orderBy('fechasclic', 'desc')
            ->get();
        // dd($eventosclicks);

        // $locals = DB::table('locales')
        // ->leftjoin('eventclics','locales.id','=','eventclics.locale_id')
        // ->selectRaw('locales.id,locales.titulo,eventclics.origen,COUNT(eventclics.locale_id) as cant_cli')
        // ->where('eventclics.origen','=','BANNER')
        // ->groupBy('locales.titulo','locales.id','eventclics.origen')
        // ->get();
        $locals = DB::table('locales')
            ->select('id','titulo','logo','ciudad_id')
            ->where('estado', 1)
            ->orderBy('titulo','asc')
            ->get();

        $clic_whatsapp = $locals->map(function ($item, $key) {
            // return $item * 2;
            $clicwsp = DB::table('eventclics')
                ->selectRaw('origen,COUNT(clics) as cant_cli')
                ->groupBy('origen')
                ->where('locale_id', $item->id)
                ->where('origen', '=', 'WHATSAPP')
                ->first();
            $item->whatsapp = $clicwsp;
            $clicbanner = DB::table('eventclics')
                ->selectRaw('origen,COUNT(clics) as cant_cli')
                ->groupBy('origen')
                ->where('locale_id', $item->id)
                ->where('origen', '=', 'BANNER')
                ->first();
            $item->banners = $clicbanner;
        });

        $clic_whatsapp->all();

        // dd($locals);
        return view('backend.reporteclic.reporteeventoclick', compact('locals'));
    }

    public function grafic_clic_banner($localid)
    {
        $local = Locale::where('id', $localid)->first();
        $userXmes = Eventclic::select(DB::raw('count(clics) as total'),DB::raw("DATE_FORMAT(created_at,'%m') as mes"))
            ->where('locale_id', $localid)
            ->where('origen', '=', 'BANNER')
            ->whereYear('created_at', 2022)
            ->groupBy('mes')
            ->get();
        // dd($userXmes);
        $xdia =  array();
        foreach ($userXmes as $key => $value) {

            $userXdia = Eventclic::select(DB::raw('count(clics) as total'),DB::raw("DATE_FORMAT(created_at,'%m-%d') as dia"))
                ->where('locale_id', $localid)
                ->whereYear('created_at', 2022)
                ->where('origen', '=', 'BANNER')
                ->whereMonth('created_at', $value->mes)
                ->groupBy('dia')
                ->get();

            // $cantidad = count($personaspremios);
            array_push($xdia, ['mes'=>$value->mes, 'dias' => $userXdia]);
        }
        // dd($xdia);

        // 2023

        $local2 = Locale::where('id', $localid)->first();
        $userXmes2 = Eventclic::select(DB::raw('count(clics) as total'),DB::raw("DATE_FORMAT(created_at,'%m') as mes"))
            ->where('locale_id', $localid)
            ->where('origen', '=', 'BANNER')
            ->whereYear('created_at', 2023)
            ->groupBy('mes')
            ->get();
        // dd($userXmes2);
        $xdia2 =  array();
        foreach ($userXmes2 as $key => $value) {

            $userXdia2 = Eventclic::select(DB::raw('count(clics) as total'),DB::raw("DATE_FORMAT(created_at,'%m-%d') as dia"))
                ->where('locale_id', $localid)
                ->whereYear('created_at', 2023)
                ->where('origen', '=', 'BANNER')
                ->whereMonth('created_at', $value->mes)
                ->groupBy('dia')
                ->get();

            // $cantidad = count($personaspremios);
            array_push($xdia2, ['mes'=>$value->mes, 'dias' => $userXdia2]);
        }
        // dd($xdia2);


        return view('backend.reporteclic.grafic-clic-banner', compact('userXmes','xdia','local','userXmes2','xdia2'));
    }

    public function grafic_clic_whatsapp($localid)
    {
        $local = Locale::where('id', $localid)->first();
        $userXmes = Eventclic::select(DB::raw('count(clics) as total'),DB::raw("DATE_FORMAT(created_at,'%m') as mes"))
            ->where('locale_id', $localid)
            ->where('origen', '=', 'WHATSAPP')
            ->whereYear('created_at', 2022)
            ->groupBy('mes')
            ->get();
        // dd($userXmes);
        $xdia =  array();
        foreach ($userXmes as $key => $value) {

            $userXdia = Eventclic::select(DB::raw('count(clics) as total'),DB::raw("DATE_FORMAT(created_at,'%m-%d') as dia"))
                ->where('locale_id', $localid)
                ->whereYear('created_at', 2022)
                ->where('origen', '=', 'WHATSAPP')
                ->whereMonth('created_at', $value->mes)
                ->groupBy('dia')
                ->get();

            // $cantidad = count($personaspremios);
            array_push($xdia, ['mes'=>$value->mes, 'dias' => $userXdia]);
        }
        // dd($xdia);

        // 2023

        $local2 = Locale::where('id', $localid)->first();
        $userXmes2 = Eventclic::select(DB::raw('count(clics) as total'),DB::raw("DATE_FORMAT(created_at,'%m') as mes"))
            ->where('locale_id', $localid)
            ->where('origen', '=', 'WHATSAPP')
            ->whereYear('created_at', 2023)
            ->groupBy('mes')
            ->get();
        // dd($userXmes2);
        $xdia2 =  array();
        foreach ($userXmes2 as $key => $value) {

            $userXdia2 = Eventclic::select(DB::raw('count(clics) as total'),DB::raw("DATE_FORMAT(created_at,'%m-%d') as dia"))
                ->where('locale_id', $localid)
                ->whereYear('created_at', 2023)
                ->where('origen', '=', 'WHATSAPP')
                ->whereMonth('created_at', $value->mes)
                ->groupBy('dia')
                ->get();

            // $cantidad = count($personaspremios);
            array_push($xdia2, ['mes'=>$value->mes, 'dias' => $userXdia2]);
        }
        // dd($xdia2);


        return view('backend.reporteclic.grafic-clic-whatsapp', compact('userXmes','xdia','local','userXmes2','xdia2'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }
}
