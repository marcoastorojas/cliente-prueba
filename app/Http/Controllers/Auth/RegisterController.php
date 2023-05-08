<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Persona;
use App\Http\Controllers\Controller;
use App\Mail\MensajeBienvenida;
use App\Models\Cupon;
use App\Models\Localpersona;
use App\Models\Puntocange;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Mail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        // dd($data);
        return Validator::make($data, [
            'apellidos' => ['required', 'string', 'max:255'],
            'dni' => ['required', 'string', 'max:8', 'min:8', 'unique:personas'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email:strict,dns', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'rol' => 3, //rol 1 = Admin, 2 = Local, 3 = Consumidor
            'password' => Hash::make($data['password']),
        ]);
        $user->assignRole('cliente');
        // dd($user);

        $persona = Persona::create([
            'user_id' => $user->id,
            'dni' => $data['dni'],
            'nombres' => $data['name'],
            'apellidos' => $data['apellidos'],
            'correo' => $data['email'],
            'estado' => 1,
        ]);
        if ($data['cupon']) {
            $cupon = Cupon::where('codigo', $data['cupon'])->where('estado', 1)->first();
            if ($cupon) {
                $userlocal = new Localpersona();
                $userlocal->persona_id = $persona->id;
                $userlocal->local_id = $cupon->local_id;
                $userlocal->totpuntos = $cupon->puntos;
                $userlocal->save();
    
                $this->registrarhistorial($userlocal, $cupon);
            }
        }
        $this->enviarcorreo($user);

        return $user;
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
            'variante'=>'CP',
            'descripcion'=> 'C. Promcional',
            'cuponid'=> $cupon->id,
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
}
