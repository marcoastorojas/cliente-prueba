<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Eventclic;
use Illuminate\Http\Request;

class EventoclicsController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $idnegocio = $request->idnegocio;
        $idpromociones = $request->idpromocion;
        $origen = $request->origen;

        $eventclic = new Eventclic();
        $eventclic->locale_id = $idnegocio;
        $eventclic->promocion_id = $idpromociones;
        $eventclic->clics = 1;
        $eventclic->origen = $origen;
        $eventclic->save();

        return response()->json([
            "status" => 1,
            "msg" => "registrar banner click"
        ]);
    }

   
}
