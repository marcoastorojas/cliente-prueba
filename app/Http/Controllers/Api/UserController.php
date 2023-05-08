<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\MensajeBienvenida;
use App\Models\Cupon;
use App\Models\Localpersona;
use App\Models\Persona;
use App\Models\Puntocange;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
// use Illuminate\Support\Str;

class UserController extends Controller
{
    public function getCupon(Request $request, $cupn)
    {
        $cupon = Cupon::where('codigo', $cupn)->where('estado', 1)->first();
        if ($cupon) {
            return response()->json([
                "status" => 1,
                "msg" => "Cupon valido"
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Cupon invalido"
            ]);
        }
    }

    public function register(Request $request)
    {
        //update app
        if ($request['v_app'] != "v3.17") {
            # code...
            return response()->json([
                "status" => 2,
                "titulo" => "Actualizaciones disponibles",
                "icon" => "info",
                "msg" => "Actualizar App Cliente VIP desde Play Store. Estamos en constante mejora.",
                "txtbutton" => "Si, actualizar",
            ]);
        }

        // $cupon = Cupon::where('codigo', $request['cupon'])->where('estado', 1)->first();
        // $cupo='';
        // if ($cupon) {
        //     $cupo = true;
        // }else{
        //     $cupo = false;
        // }

        // $input = [
        //     'cupon' => [$cupo],
        // ];
        // $nrodni = '';
        // $dnicodigo = '';

        // if ($request['tipodoc'] == 'RUT') {
        //     $nrodni = Str::before($request['dni'], '-');
        //     $dnicodigo = Str::after($request['dni'], '-');
        //     $request['dni'] = $nrodni;
        // } else {
        //     $nrodni = Str::before($request['dni'], '-');
        //     $dnicodigo = null;
        // }

        $request->validate([
            // 'dni' => ['required', 'regex:/(^([0-9]+)(\d+)?$)/u', 'max:8', 'min:8', 'unique:personas'],
            'dni' => ['required', 'min:8', 'unique:personas'],
            'name' => ['required', 'string', 'max:255'],
            'apellidos' => ['required', 'string', 'max:255'],
            'celular' => ['required'],
            'email' => ['required', 'string', 'email:strict,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            // 'cupon' => [$cupo]
        ]);

        // dd('paso');



        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'rol' => 3, //rol 1 = Admin, 2 = Local, 3 = Consumidor
            'password' => Hash::make($request['password']),
        ]);
        $user->assignRole('cliente');
        // dd($user);
        $token = $user->createToken("auth_token")->plainTextToken;

        $persona = Persona::create([
            'user_id' => $user->id,
            'dni' => $request['dni'],
            'dnicod' => null,
            'nombres' => $request['name'],
            'apellidos' => $request['apellidos'],
            'celular' => $request['celular'],
            'correo' => $request['email'],
            'codpais' => $request['codpais'],
            'tipodoc' => $request['tipodoc'],
            'estado' => 1,
            'ciudad_id' => $request['ciudad_id'],
        ]);

        if ($request->has('cupon') && $request->cupon) {
            $cupon = Cupon::where('codigo', $request['cupon'])->where('estado', 1)->first();
            // $request->validate([
            //     'cupon' => ['string', 'max:3'],
            // ]);
            if ($cupon) {
                $userlocal = new Localpersona();
                $userlocal->persona_id = $persona->id;
                $userlocal->local_id = $cupon->local_id;
                $userlocal->totpuntos = $cupon->puntos;
                $userlocal->save();

                $this->registrarhistorial($userlocal, $cupon);
            }
        }

        // $this->enviarcorreo($user);

        return response()->json([
            "status" => 1,
            "msg" => "Registro de usuario exitoso!",
            'success' => true,
            "token" => $token,
            'message' => 'Registration is completed'
        ]);
    }

    public function registrarhistorial($data, $cupon)
    {
        Puntocange::create([
            'localpersona_id' => $data->id,
            'persona_id' => $data->persona_id,
            'tipopunto' => 'A',
            'monto' => $data->totpuntos,
            'puntos' => $data->totpuntos,
            'local' => $data->local_id,
            'variante' => 'CP',
            'descripcion' => 'C. Promcional',
            'cuponid' => $cupon->id,
        ]);
    }

    public function enviarcorreo($msg)
    {
        if ($msg->email) {
            $message = [
                'name' => $msg->name,
                'email' => $msg->email,
                'subject' => 'Bienvenid@ a ClienteVIP',
            ];
            Mail::to($msg->email)->queue(new MensajeBienvenida($message));
            // return new MensajeRecibido($message);
            // return 'Mensaje enviado';
        }
    }

    public function userProfile()
    {
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        // dd($persona);
        return response()->json([
            "status" => 1,
            "msg" => "Perfil user",
            "data" => $persona
        ]);
    }
    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'apellidos' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            // 'email' => ['required', 'string', 'email', 'max:255', 'unique:users','.$this->id,id'],
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // 'password' => ['required', 'string', 'min:6'],
        ]);

        $persona = Persona::where('user_id', $user->id)->first();
        $persona->nombres = $request->name;
        $persona->apellidos = $request->apellidos;
        $persona->celular = $request->celular;
        $persona->fechanac = $request->fechanac;
        $persona->correo = $request->email;
        $persona->save();

        $user->name = $request->name;
        $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        if ($request->has('password') && $request->password != '') {
            $validatedUser = $request->validate([
                'password' => 'min:6|string',
            ]);
            $user->password = Hash::make($request->password);
        }
        $user->save();
        // dd($persona);
        return response()->json([
            "status" => 1,
            "msg" => "Usuario se acutalizó",
            "data" => $persona
        ]);
    }

    public function prePogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $request->email)->first();
        if (isset($user->id)) {
            return response()->json([
                "status" => 1,
                "msg" => "Usuario existe",
            ]);
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "No hay registro"
            ]);
        }
    }

    public function login(Request $request)
    {
        // if ($request->v_app != 'v3.16') {
        //     return response()->json([
        //         "status" => 0,
        //         "msg" => "Actualizar App Cliente VIP desde Play Store. Estamos en constante mejora. Presione aquí -> <a href='https://play.google.com/store/apps/details?id=pe.clientevip.app' target='../' > Actualizar ahora</a>"
        //     ], 404);
        // }

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();
        if (isset($user->id)) {
            if ($user->estado == 1) {
                if (Hash::check($request->password, $user->password)) {
                    $token = $user->createToken("auth_token")->plainTextToken;
                    return response()->json([
                        "status" => 1,
                        "msg" => "Usuario logeado exitosamente",
                        "token" => $token,
                        "user" => $user->persona
                    ]);
                } else {
                    return response()->json([
                        "status" => 0,
                        "msg" => "la contraseña es incorrecta"
                    ], 404);
                }
            } else {
                return response()->json([
                    "status" => 0,
                    "msg" => "Usuario bloqueado por datos inválidos. Contactarse con el área de Soporte: 952633245 <a href='https://wa.me/51952633245?text=Hola, No puedo ingresar a la plataforma *CLIENTE VIP*' target='../' > Contactar</a>"
                ], 404);
            }
        } else {
            return response()->json([
                "status" => 0,
                "msg" => "Si tienes inconvenientes para ingresar y te registraste entre el 16 y 19 de mayo, comunícate al 952633245 o escríbenos al whatsapp, <a href='https://wa.me/51952633245?text=Hola, No puedo ingresar a la plataforma *CLIENTE VIP*' target='../' > Click Aquí</a>"
            ], 404);
        }
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        // Auth::user()->tokens()->delete();
        return response()->json([
            "status" => 1,
            "msg" => "Cesion cerrado"
        ]);
    }

    public function consultaReniec($dni)
    {
        // clientevip1@tigpe.com
        $token = "c762f731632ee33ba1010f3b16b81b511e92e3dfe7e309c3205caa4271772860";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apiperu.dev/api/dni/" . $dni . "?api_token=" . $token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => false
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            // echo "cURL Error #:" . $err;
            // $this->estadobusqueda = $err;
            return response()->json([
                "status" => 0,
                "msg" => "No existe data",
                "data" => $err
            ]);
        } else {
            $persona = json_decode($response);
            // $pers = (object)[
            //     'nombres' => $persona->data->nombres,
            //     'paterno' => $persona->data->apellido_paterno,
            //     'materno' => $persona->data->apellido_materno
            return response()->json([
                "status" => 1,
                // "success" => $persona,
                "msg" => 'hay data',
                "data" => $persona
            ]);
        }
    }
    public function consultaReniecWeb(Request $request)
    {
        $token = "c762f731632ee33ba1010f3b16b81b511e92e3dfe7e309c3205caa4271772860";
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apiperu.dev/api/dni/" . $request->dni . "?api_token=" . $token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => false
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            // echo "cURL Error #:" . $err;
            // $this->estadobusqueda = $err;
            return response()->json([
                "status" => 0,
                "msg" => "No existe data",
                "data" => $err
            ]);
        } else {
            $persona = json_decode($response);

            if ($persona->success == true) {
                $data = [
                    "nombres" => $persona->data->nombres,
                    "apellido_paterno" => $persona->data->apellido_paterno,
                    "apellido_materno" => $persona->data->apellido_materno,
                    "success" => $persona->success,
                ];
            } else {
                $data = [
                    "nombres" => '',
                    "apellido_paterno" => '',
                    "apellido_materno" => '',
                    "success" => $persona->success,
                ];
            }

            // $persona = $persona->success;
            // if ($persona->success == 'true') {
            //     # code...
            // }else{

            // }
            // $pers = (object)[
            //     'nombres' => $persona->data->nombres,
            //     'paterno' => $persona->data->apellido_paterno,
            //     'materno' => $persona->data->apellido_materno
            return response()->json([
                "status" => 1,
                // "success" => $persona,
                "msg" => 'hay data',
                "data" => $data
            ]);
        }
    }
    public function eliminarcliente()
    {
        $persona = Persona::where('user_id', auth()->user()->id)->first();
        $perso = $persona;

        $pc = Puntocange::where('persona_id', $persona->id)->delete();
        $lp = Localpersona::where('persona_id', $persona->id)->delete();
        $modelr = DB::table('model_has_roles')
            ->where('model_id', $persona->user_id)
            ->delete();
        $persona->delete();
        $user = User::where('id', $perso->user_id)->delete();

        return response()->json([
            "status" => 1,
            "msg" => "Tu cuenta se elimino con éxito"
            // "status" => 2,
            // "msg" => "Comunícate con el area de soporte para su solicitud. Wsp: 952633245",
        ]);
    }

    public function refreshDeviceToken(Request $request)
    {
        $token = $request->device_token;
        if (!$token) {
            return response()->json(["ok" => "false", "msg" => "falta el token 'device_token'"],400);
        }
        $user = User::where('id', auth()->user()->id)->first();
        $user->device_token = $token;
        $user->save();
        return response()->json(["msg" => "token actualizado"]);
    }
}
