<?php

namespace App\Http\Controllers\Reporte;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\Localpersona;
use App\Models\Puntocange;
use Illuminate\Http\Request;

class ReporteNegociosController extends Controller
{
    
    public $fechaini, $fechafin;

    public function acumulacionesPuntos(Request $request)
    {   
        $this->fechaini = $request->fechaini;
        $this->fechafin = $request->fechafin;

        $repo = Locale::where('estado', 1)
            ->join('localpersonas', 'locales.id', '=', 'localpersonas.local_id')
            ->selectRaw('locales.id, locales.titulo, locales.celularprop, locales.logo, COUNT(localpersonas.local_id) as cant_cli')
            ->groupBy('localpersonas.local_id')
            ->orderBy('cant_cli', 'desc')
            ->get();

        $repo->map(function ($item) {
            $totoperaciones = Puntocange::where('local', $item->id)
            ->whereBetween('created_at', [$this->fechaini, $this->fechafin])
            // ->whereDate('created_at', '=', $ayer)
            ->count();
            // dd($totalpuntos);
            $item->totaloperaciones = $totoperaciones;

            $locperson = Localpersona::where('local_id', $item->id)
                ->select('id', 'local_id', 'persona_id')
                ->with(array('puntocanges' => function ($query) {
                    $query->where('tipopunto', 'A');
                }))
                ->get();
            $val = 0;

            foreach ($locperson as $key => $localper) {
                if (count($localper['puntocanges']) >= 2) {
                    $val = $val + 1;
                }
            }
            $item->recurrentes = $val;
            return $item;
        });



        // $locales =  array();
        // foreach ($repo as $key => $local) {
        //     $val = 0;
        //     foreach ($local['localpersonas'] as $key => $localper) {
        //         if (count($localper['puntocanges']) >= 2) {
        //             $val = $val + 1;
        //         }
        //     }
        //     array_push($locales, ['cantclirecu' => $val, 'localcli' => $local]);
        // }
        // dd($locales);


        // dd($repo);
        // return $locales;

        // $locales = DB::table('localpersonas')
        //     ->join('locales', 'locales.id', '=', 'localpersonas.local_id')
        //     ->selectRaw('locales.id, locales.titulo, locales.logo, localpersonas.local_id, COUNT(localpersonas.local_id) as cantidad')
        //     ->groupBy('localpersonas.local_id')
        //     ->orderBy('cantidad', 'desc')
        //     ->get();
        // dd($locales);
        // return view('backend.admin.reportenegociocliente', compact('locales'));

        return response()->json([
            "status" => 1,
            "msg" => "Hay data",
            "activiades" => $repo
        ]);
    }
}
