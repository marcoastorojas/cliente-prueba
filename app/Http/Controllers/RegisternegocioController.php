<?php

namespace App\Http\Controllers;

use App\Models\Locale;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisternegocioController extends Controller
{

    public function store(Request $request)
    {
        // dd($request->all());

        try {
            DB::beginTransaction();
            $request->validate([
                'nombres' => ['required', 'string', 'max:100'],
                'apellidos' => ['required', 'string', 'max:100'],
                'celular' => ['required', 'string', 'max:20'],
                'email' => ['required', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:6', 'confirmed'],
            ]);

            $user = User::create([
                'name' => $request->nombres . ' ' . $request->apellidos,
                'email' => $request->email,
                'rol' => 2, //rol 1 = Admin, 2 = Local, 3 = Consumidor
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole('comercio');

            $local = new Locale();
            $local->user_id = $user->id;
            $local->tipe_id = 1;
            $local->titulo = '-';
            $local->descripcion = '-';
            $local->config_punto = 1;
            $local->config_monto = 1;
            $local->nombresprop = $request->nombres;
            $local->apellidosprop = $request->apellidos;
            $local->celularprop = $request->celular;
            $local->estado = 0;
            $local->save();
            DB::commit();

            return response()->json([
                'ok' => 'Se registró con éxito'
            ]);
        } 
        
        catch (\Throwable $e) {
            DB::rollback();
            $ups = 'algo salío mal';
            throw $e;
            throw $ups;

            // return redirect()->route('products.index')
            //     ->with('info', 'No se pudo hacer la operación.');

            return response()->json([
                'error' => 'algo salío mal',
                'error_detail' => $e,
            ]);
        }
    }
}
