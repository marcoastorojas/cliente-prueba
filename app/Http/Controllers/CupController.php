<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\Localpersona;
use App\Models\Persona;
use App\Models\Puntocange;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class CupController extends Controller
{
    public function activarCodPro($id)
    {
        // dd($id);

        Alert::info('', 'Cliente VIP');
        return back()->withInput();

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

        //     Alert::success('','Código promocional activado.');
        //     return redirect()->route('home');
        // }else{
        //     Alert::info('', 'Código Promocional ya fue activado');
        //     return back()->withInput();
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
