<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use App\Models\Tipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PartnerController extends Controller
{

    public function index()
    {
        $categorias = DB::table('tipes')
            ->select('id', 'tipos')
            ->where('estado', 1)
            ->orderBy('tipos')
            ->get();
        $ciudades = DB::table('ciudads')
            ->select('id', 'ciudad')
            ->where('estado', 1)
            ->get();

        return view('partners', compact('categorias','ciudades'));
    }


    // public function create()
    // {
    //     //
    // }


    public function store(Request $request)
    {
        // dd($request->all());

        try {
            $request->validate([
                'nombres' => ['required', 'string', 'max:100'],
                'apellidos' => ['required', 'string', 'max:100'],
                'negocio' => ['required', 'string', 'max:100'],
                'categoria_id' => ['required'],
                'celular' => ['required', 'string', 'max:9'],
                'ciudad_id' => ['required'],
                'distrito' => ['required']
            ]);

            DB::beginTransaction();

            $partner = new Partner();
            $partner->nombres = $request->nombres;
            $partner->apellidos = $request->apellidos;
            $partner->negocio = $request->negocio;
            $partner->tipe_id = $request->categoria_id;
            $partner->celular = $request->celular;
            $partner->ciudad_id = $request->ciudad_id;
            $partner->estado = 1;
            $partner->distrito = $request->distrito;
            $partner->save();
            DB::commit();

            return response()->json([
                'ok' => 'Felicitaciones. Está cerca de iniciar un programa de fidelización digital.
                Un asesor se contactará con Ud.'
            ]);
        } catch (\Throwable $e) {
            DB::rollback();
            return response()->json([
                'error' => 'algo salío mal',
                'error_detail' => $e,
            ]);
        }
    }

    public function getLista()
    {
        $listasolicitudes = DB::table('partners')
                    ->leftJoin('ciudads','ciudads.id','=','partners.ciudad_id')
                    ->leftJoin('tipes','tipes.id','=','partners.tipe_id')
                    ->select('partners.*','ciudads.ciudad','tipes.tipos')
                    ->where('partners.estado', 1)
                    ->get();
        // dd($partners);
        return view('backend.crm.infosolicitudes', compact('listasolicitudes'));
    }


    // public function show($id)
    // {
    //     //
    // }


    // public function edit($id)
    // {
    //     //
    // }


    // public function update(Request $request, $id)
    // {
    //     //
    // }


    // public function destroy($id)
    // {
    //     //
    // }
}
