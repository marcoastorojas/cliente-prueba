<?php

namespace App\Http\Controllers\Negocio;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NegocioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $tipos = Tipe::where('estado', 1)->get();
        $local = Locale::where('user_id', Auth::user()->id)->first();


        return view('backend.negocios.negocioconfig', compact('local', 'tipos'));
    }


    public function store(Request $request)
    {
        // dd($request->all());
        
        try {
            $request->validate([
                'titulo' => 'required',
                'descripcion' => 'required',
                'direccion' => 'required',
                // 'ciudad' => 'required',
                'celular' => 'required',
                // 'user_id' => 'required',
                'tipe_id' => 'required',
                // 'config_punto' => 'required',
                // 'config_monto' => 'required',
                // 'estado' => 'required',
            ]);
    
            $record = Locale::where('user_id', Auth()->id())->firstorfail();
            $record->update([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'direccion' => $request->direccion,
                'email' => $request->correo,
                'dominio' => $request->dominio,
                'celular' => $request->celular,
                // 'user_id' => $request->user_id,
                'tipe_id' => $request->tipe_id,
                'nombresprop' => $request->nombresprop,
                'apellidosprop' => $request->apellidosprop,
                'celularprop' => $request->celularprop,
                'restriccion' => $request->restriccion,
                'catalogo' => $request->catalogo,
                'nombrecatalogo' => $request->nombrecatalogo,
                // 'config_punto' => $request->config_punto,
                // 'config_monto' => $request->config_monto,
                // 'estado' => $request->estado
            ]);
            
            if ($request->logo) {
                $urltemp = 'logo/' . time() . '_0.' . $request->logo->getClientOriginalExtension();
                $img = \Image::make($request->logo)->resize(null, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('img/' . $urltemp);
                $record->logo = $urltemp;
                $record->save();
            }

            if ($request->banner) {
                $urltemp = 'banner/' . time() . '_0.' . $request->banner->getClientOriginalExtension();
                $img = \Image::make($request->banner)->resize(null, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('img/' . $urltemp);
                $record->banner = $urltemp;
                $record->save();
            }

            if ($request->icono_tarjeta) {
                $urltemp = 'iconotarjeta/' . time() . '_0.' . $request->icono_tarjeta->getClientOriginalExtension();
                $img = \Image::make($request->icono_tarjeta)->resize(null, 250, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('img/' . $urltemp);
                $record->icono_tarjeta = $urltemp;
                $record->save();
            }
            // if ('a'=='a') {
    
            //     // $this->resetInput();
            //     // $this->updateMode = false;
            // }
            if ($request->password != '') {
                $user = User::where('id', Auth()->id())->first();
                $validatedUser = $request->validate([
                    'password' => 'min:6',
                ]);
                $user->password = Hash::make($request->password);
                $user->save();
            }
            
            return response()->json([
                "status" => 1,
                "success" => 'ok',
                'message' => 'Se actualizó los datos.',
            ]);

        } catch (\Throwable $th) {
            throw $th;
        }

        // return back()->withInput();
        // return view('backend.facturacion.imprimirpdf', ['venta' => $ventas, 'detalles' => $detalles]);
    }

    public function update(Request $request, $id)
    {
        
    }
}
