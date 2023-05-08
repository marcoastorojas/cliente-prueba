<?php

namespace App\Http\Controllers;

use App\Models\categorizacion\Niveles;
use App\Models\Locale;
use App\Models\Redencion;
use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NegocioApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $locales = Locale::where('estado', 1)
        ->with('infolocals')
        ->orderBy('titulo', 'asc')->get();

        // $localestipo = Tipe::where('estado', 1)
        // ->with(array('locales' => function ($query) {
        //     $query->where('estado', 1);
        //     $query->orderBy('titulo', 'asc');
        //     $query->with('infolocals');
        // }))
        // ->get();
        
        return response()->json($locales);
    }

    public function tiposnegocios(Request $request)
    {
        // $locales = Locale::where('estado', 1)
        // ->with('infolocals')
        // ->orderBy('titulo', 'asc')->get();
        $idciudad = '';
        if ($request->idciudad) {
            $idciudad = $request->idciudad;
        }else{
            $idciudad = 1;
        }

        $localestipo = Tipe::where('estado', 1)
        ->orderBy('ordenar', 'asc')
        ->with(array('locales' => function ($query) use($idciudad) {
            $query->where('estado', 1);
            $query->where('ciudad_id', $idciudad);
            $query->orderBy('titulo', 'asc');
            $query->with('infolocals');
            $query->with('Promociones');
            
        }))
        ->get();
        
        return response()->json($localestipo);
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
    public function show($id, Request $request)
    {
        // dd($id);
        $local = Locale::where('id',$id)
        ->where('estado', 1)
        ->first();
        return response()->json($local);
    }

    public function extra_info($id){
        $recompensas = Redencion::where('local_id',$id)->where('estado', 1)->orderBy('puntos','asc')->get();

        $Niveles = Niveles::where('local_id',$id)->with('beneficios')->with('info')->get();

        $promociones = DB::table('promociones')->where('estado', 1)
        ->where('lclfechaini','<=',date('Y-m-d'))
        ->where('lclfechafin','>=',date('Y-m-d'))
        ->where('locale_id',$id)
        ->get();
        
        return response()->json([ "recompensas" => $recompensas , "niveles" => $Niveles , "promociones"=> $promociones]);
    }
    
    public function categorizacion($id){
       
      echo  auth()->user()->id;
        
        return response()->json([ "ok" => true ]);
    }






    public function recompensas($id)
    {
        // dd($id);
        $recompensas = Redencion::where('local_id',$id)->where('estado', 1)->orderBy('puntos','asc')->get();
        return response()->json($recompensas);
    }

    public function promociones($id)
    {
        // dd($id);
        $promociones = DB::table('promociones')->where('estado', 1)
        ->where('lclfechaini','<=',date('Y-m-d'))
        ->where('lclfechafin','>=',date('Y-m-d'))
        ->where('locale_id',$id)
        ->get();
        
        if ($promociones->count()>0) {
            return response()->json([
                "status" => 1,
                "msg" => "Listar promociones",
                "data" => $promociones
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "No hay datos",
                "data" => ""
            ]);
        }
        
        // $recompensas = Redencion::where('local_id',$id)->where('estado', 1)->orderBy('puntos','asc')->get();
        // return response()->json($recompensas);
    }

    public function ciudades()
    {
        // dd($id);
        $ciudades = DB::table('ciudads')->select('id','ciudad')->where('estado', 1)
        ->get();
        
        if ($ciudades->count()>0) {
            return response()->json([
                "status" => 1,
                "msg" => "Listar ciudades",
                "ciudades" => $ciudades
            ]);
        }else{
            return response()->json([
                "status" => 0,
                "msg" => "No hay datos",
                "ciudades" => ""
            ]);
        }
    }

    public function edit($id)
    {
        
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
