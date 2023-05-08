<?php

namespace App\Http\Controllers;

use App\Models\Localpersona;
use App\Models\Puntocange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Locale;

class TemporalController extends Controller
{
    public function index()
    {
        $historial = DB::table('puntocanges')
            ->where('local', null)
            ->get();
            // dd($historial);
        // $historial = Puntocange::where('local', null)->get();

        foreach ($historial as $key => $value) {

            $perslocl = Localpersona::where('id', $value->localpersona_id)->first();
            // dd($perslocl);

            $bla = Puntocange::where('id', $value->id)->first();
            $bla->local = $perslocl->local_id;
            $bla->save();
            // dd($bla);
        }

        // dd($historial);

    }
}
