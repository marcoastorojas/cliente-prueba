<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use App\Models\Localpersona;
use App\Models\Persona;
use App\Models\Puntocange;
use Illuminate\Http\Request;

class CuponController extends Controller
{

    public function listarCupones()
    {
        $cupones = Cupon::where('estado', 1)->get();
        // dd($persona);
        return response()->json([
            "status" => 1,
            "msg" => "Listar cupones",
            "data" => $cupones
        ]);
    }

    public function activarCodPro($id)
    {

        // PARA AVISO O COMUNICADO
        return response()->json([
            "status" => 0,
            "msg" => "Aviso o comunicado"
        ]);

        // ACTIVACION DE CUPONES

        // $persona = Persona::where('user_id', auth()->user()->id)->first();
        // $cuponexist = Puntocange::where('cuponid', $id)->where('persona_id', $persona->id)->first();
        
        // if (!$cuponexist) {
        //     $cupon = Cupon::where('id', $id)->where('estado', 1)->first();
        //     $localperson = Localpersona::where('persona_id', $persona->id)->where('local_id', $cupon->local_id)->first();

        //     if ($localperson && $cupon) {
        //         $localperson->totpuntos = $localperson->totpuntos + $cupon->puntos;
        //         $localperson->save();
        //         $this->registrarhistorial($localperson, $cupon);                
        //     }elseif($cupon){
        //         $userlocal = new Localpersona();
        //         $userlocal->persona_id = $persona->id;
        //         $userlocal->local_id = $cupon->local_id;
        //         $userlocal->totpuntos = $cupon->puntos;
        //         $userlocal->save();
        //         $this->registrarhistorial($userlocal, $cupon);
        //     }
        //     return response()->json([
        //         "status" => 1,
        //         "msg" => "Cupon activado"
        //     ]);
        // }else{
        //     return response()->json([
        //         "status" => 0,
        //         "msg" => "Cupon ya existe o no hay cupon disponible"
        //     ]);
        // }
    }

    public function registrarhistorial($data, $cupon)
    {
        Puntocange::create([
            'localpersona_id' => $data->id,
            'persona_id' => $data->persona_id,
            'tipopunto' => 'A',
            'monto' => $cupon->puntos,
            'puntos' => $cupon->puntos,
            'local' => $data->local_id,
            'variante' => 'CP',
            'descripcion' => 'C. Promcional',
            'cuponid' => $cupon->id,
        ]);
    }
}
