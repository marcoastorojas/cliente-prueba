<?php

namespace App\Http\Controllers\Categorizacion;

use App\Models\categorizacion\Niveles;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NivelesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos = Niveles::where('local_id', Auth::user()->local->id)->get();
        return view('categorizacion/niveles/index', compact('datos'));
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
     * @param  \App\Models\categorizacion\Niveles  $Niveles
     * @return \Illuminate\Http\Response
     */
    public function show(Niveles $Niveles)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorizacion\Niveles  $Niveles
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        try {
            //
            $nivel = Niveles::where('id', $request->nivel_id)->first();
            $nivel->update([
                'min_puntos' => $request->min_puntos,
                'max_puntos' => $request->max_puntos,
            ]);
            // echo var_dump($nivel);
            // echo $request->nivel_id;
            // echo $request->min_puntos;

            // echo $request->max_puntos;

            return response()->json([
                'ok' => true,
            ]);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
            ]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorizacion\Niveles  $Niveles
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Niveles $Niveles)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorizacion\Niveles  $Niveles
     * @return \Illuminate\Http\Response
     */
    public function destroy(Niveles $Niveles)
    {
        //
    }
}
