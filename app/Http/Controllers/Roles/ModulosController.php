<?php

namespace App\Http\Controllers\Roles;

use App\Models\roles\Modulos;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\User;
use App\Models\Userlocal;
use App\Models\users_modulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModulosController extends Controller
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

    /**
     * Metodo para asignar los modulos a un usuario 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $user = User::where('id', $request->user_id)->first();


            if ($user) {

                users_modulos::where('user_id', $user->id)->delete();

                $modulos =  json_decode($request->modulos);

                foreach ($modulos  as $modulo) {

                    $modulo = users_modulos::create([
                        'user_id' => $user->id,
                        'modulo_id' => $modulo
                    ]);
                }

                return response()->json([

                    'ok' => true,
                ]);
            } else {
                return response()->json([
                    'ok' => false,
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'error' => 'algo salío mal',
                'message' => $e,
            ]);
        }
    }

}
