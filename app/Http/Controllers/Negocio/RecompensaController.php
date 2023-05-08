<?php

namespace App\Http\Controllers\Negocio;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\Redencion;
use Illuminate\Http\Request;

class RecompensaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function getNegocios()
    {
        $negocios = Locale::where('estado',1)->orderBy('titulo', 'ASC')->get();
        return response()->json([
            "status" => 1,
            "msg" => "Hay data",
            "negocios" => $negocios
        ]);
    }

    public function getCompensasId(Request $request)
    {
        // dd($request->idnegocio);
        $listRecompensas = Redencion::where('estado',1)->where('local_id', $request->idnegocio)->orderBy('puntos', 'ASC')->get();
        return response()->json([
            "status" => 1,
            "msg" => "Hay data",
            "listRecompensas" => $listRecompensas
        ]);
    }

    public function liberarFecha(Request $request)
    {
        $recompesa = Redencion::where('id',$request->idrecompensa)->first();
        $recompesa->modificar = null;
        $recompesa->save();

        return response()->json([
            "status" => 1,
            "msg" => "Se liberó con éxito"
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
