<?php

namespace App\Http\Controllers\Negocio;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\Puntocange;
use App\Models\Userlocal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportesController extends Controller
{
    public $fechaini, $fechafin;

    public function reporteCanjes(Request $request)
    {
        $this->fechaini = $request->fechaini;
        $this->fechafin = $request->fechafin;

        $local = Locale::where('user_id', Auth()->id())->first();

         /**
         *  Se agrega esta seccion para controlar a los usuarios empleados en el modulo de roles 
         */
        if (!$local) {
            $user_local = Userlocal::where('user_id', Auth()->id())->first();
            $local = $user_local->locale;
        }
        
        // $canjes = DB::table('puntocanges')
        //     ->selectRaw('COUNT(id), DISTINCT(tipopunto)')
        //     // ->where('tipopunto', 'C')
        //     ->where('local', $local->id)
        //     ->whereBetween('created_at', [$this->fechaini, $this->fechafin])
        //     ->groupBy('tipopunto')
        //     ->get();

        $acumulacionycanjes = DB::table('puntocanges')
            ->select('tipopunto', DB::raw('count(*) as total'))
            ->where('local', $local->id)
            ->whereBetween('created_at', [$this->fechaini, $this->fechafin])
            ->groupBy('tipopunto')
            ->get();

        $acumcanjesXdia = Puntocange::select(
            DB::raw('tipopunto'),
            DB::raw('count(id) as total'),
            DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as dia")
        )
            ->where('local', $local->id)
            // ->whereYear('created_at', 2022)
            ->whereBetween('created_at', [$this->fechaini, $this->fechafin])
            ->groupBy('dia', 'tipopunto')
            ->get();



        return response()->json([
            "status" => 1,
            "msg" => "Hay data",
            "acumul_canjes" => $acumulacionycanjes,
            "acumul_canjes_x_dia" => $acumcanjesXdia
        ]);
    }
    public function reporteCanjesDetalles(Request $request)
    {
        $local = Locale::where('user_id', Auth()->id())->first();

         /**
         *  Se agrega esta seccion para controlar a los usuarios empleados en el modulo de roles 
         */
        if (!$local) {
            $user_local = Userlocal::where('user_id', Auth()->id())->first();
            $local = $user_local->locale;
        }
        
        $detalle = DB::table('puntocanges as pc')
            ->leftJoin('personas as p','p.id','=','pc.persona_id')
            ->select('pc.tipopunto', 'pc.puntos','pc.nrocomprobante','pc.created_at','p.nombres', 'p.apellidos', 'p.dni')
            ->where('pc.local', $local->id)
            ->whereDate('pc.created_at', $request->dia)
            ->where('pc.tipopunto', $request->tipopunto)
            ->get();

        return response()->json([
            "status" => 1,
            "msg" => "Hay data",
            "detalles" => $detalle
        ]);
    }
}
