<?php

namespace App\Http\Livewire;

use App\Mail\MensajeRecibido;
use App\Models\Locale;
use App\Models\Localpersona;
use App\Models\Persona;
use App\Models\Puntocange;
use App\Models\User;
use App\Models\Userlocal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
// use Illuminate\Support\Str;
// use RealRashid\SweetAlert\Facades\Alert;

class Puntos extends Component
{
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $id_localpersona, $id_persona, $tipopunto = 'A', $monto, $puntos;
    public $local;
    public $dni;
    public $totpuntosss;
    public $totpunto;
    public $persona;
    public $no_register;
    public $email;
    public $subject;
    public $nombrecliente;
    public $nombrenegocio;
    public $motivo;
    public $totpuntoscorreo;
    public $dnitemp;
    public $registro;
    public $user_id;

    public $nombres_completo;
    public $nombrestemp;
    public $apellidostemp;
    public $celulartemp;
    public $estadobusqueda;
    public $nrocomprobante;
    public $comprobante;
    public $recurrencia;
    public $recompensa;
    // public $updateMode = false;

    // protected $listeners = ['consultareniec'];

    public function render()
    {
        // print_r(Auth()->id());
        $local = Locale::where('user_id', Auth()->id())
        // ->with('redenciones')
        ->with(array('redenciones' => function ($query) {
            $query->orderBy('puntos');
        }))
        ->first();
        
        /**
         *  Se agrega esta seccion para controlar a los usuarios empleados en el modulo de roles 
         */
        if(!$local){
            $user_local = Userlocal::where('user_id', Auth()->id())->first();
            $local = $user_local->locale;
        }


        $this->local = $local;
        $this->nombrenegocio = $local->titulo;
        $this->registro = $local->registro;
        $this->comprobante = $local->comprobante;


        return view('livewire.puntos.puntos');
    }
    public function acumular()
    {
        $this->estadobusqueda = '';
        $this->tipopunto = 'A';
    }
    public function canjear()
    {
        $this->tipopunto = 'C';
        $this->puntos = '';
    }

    public function consultadni()
    {
        // $this->tipopunto = 'A';
        $this->totpuntosss = null;
        $this->totpunto = 0;

        // $contains = Str::contains($this->dni, '-');
        // dd($this->dni );

        $persona = Persona::where('dni', $this->dni)
            ->with(array('localperon' => function ($query) {
                $query->where('local_id', $this->local->id);
            }))
            ->first();



        $this->no_register = null;

        if ($persona != null) {
            $this->persona = $persona->nombres . ' ' . $persona->apellidos;
            $this->email = $persona->correo;
            $this->nombrecliente = $persona->nombres;
            $this->id_persona = $persona->id;
            if ($persona->localperon != null) {
                $this->totpuntosss = '<span class="badge bg-warning" style="color: black;">' . round($persona->localperon->totpuntos, 0) . '</span> ';
                $this->totpunto = $persona->localperon->totpuntos;
                $this->id_localpersona = $persona->localperon->id;
                $this->alertadecanjes();
            } else {
                $this->id_localpersona = '';
                $this->no_register = '';
                $this->no_register = '<span class="badge bg-warning" style="color: grey;"> CLiente Nuevo </span> ';
            }
        } else {
            $this->persona = '';
            $this->id_persona = '';
            $this->totpuntosss = '';
            $this->totpunto = 0;
            $this->id_localpersona = ' --- ';
            $this->no_register = '<span class="badge badge-pill badge-md bg-gradient-warning"> No Registrado. </span> ';
        }
        // Alert::success('','Código promocional activado.');
    }

    // public function preSearchDNI()
    // {
    //     $this->updateMode = true;
    // }
    public function consultareniec()
    {
        $this->estadobusqueda = 'Buscando...';
        $token = "d11acbec20b4d89a9e0e14c536091ba01b9d27be822e6e707a0e5528910113a6";

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://apiperu.dev/api/dni/" . $this->dnitemp . "?api_token=" . $token,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_SSL_VERIFYPEER => false
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            echo "cURL Error #:" . $err;
            $this->estadobusqueda = $err;
        } else {
            $persona = json_decode($response);
            // echo $response;
            // dd($persona);
            if ($persona->success == true) {
                $this->dni = $this->dnitemp;
                $this->nombres_completo = $persona->data->nombre_completo;
                $this->dnitemp = $persona->data->numero;
                $this->nombrestemp = $persona->data->nombres;
                $this->apellidostemp = $persona->data->apellido_paterno . ' ' . $persona->data->apellido_materno;
                $this->estadobusqueda = true;
                # code...
            } else {
                $this->nombres_completo = '';
                $this->dnitemp = '';
                $this->nombrestemp = '';
                $this->apellidostemp = '';

                $this->estadobusqueda = false;
            }
        }
    }

    public function store()
    {
        if ($this->local && $this->tipopunto == 'A' && $this->monto > 0) {
            $this->puntos = $this->monto / $this->local->config_monto;
        } elseif ($this->tipopunto == 'C') {
            $this->monto = 0;
            
            $recompensa =json_decode($this->recompensa);
            $this->puntos = $recompensa->puntos;

        } elseif ($this->monto == '' || $this->monto == 0) {
            $this->puntos = 0;
            $this->monto = '';
        }

        if ($this->local->comprobante == 1 && $this->tipopunto == 'A') {
            $this->validate([
                'tipopunto' => 'required',
                'monto' => 'required|max:7',
                'puntos' => 'required',
                'nrocomprobante' => 'required'
            ]);
        }else{
            $this->validate([
                'tipopunto' => 'required',
                'monto' => 'required|max:7',
                'puntos' => 'required'
            ]);
        }

        if ($this->id_persona && $this->id_localpersona) {
            if ($this->tipopunto == 'A' && $this->monto > 0) {
                $userlocal = Localpersona::where('id', $this->id_localpersona)->first();
                $userlocal->totpuntos = $userlocal->totpuntos + $this->puntos;
                $this->totpuntoscorreo = $userlocal->totpuntos;
                $userlocal->recurrencia = $this->getRecurrencia($this->id_localpersona)+'1';
                $userlocal->save();
                $this->subject = 'Acumulando Puntos con ClienteVIP';
                $this->motivo = 'Has recibido ';
                $this->registrarhistorial();
                $this->enviarcorreo();
                // $a = 'mlt';
                if ($this->local->multipuntos == 1) {
                    $userlocalx2 = Localpersona::where('id', $this->id_localpersona)->first();
                    $userlocalx2->totpuntos = $userlocalx2->totpuntos + $this->puntos;
                    $this->totpuntoscorreo = $userlocalx2->totpuntos;
                    $userlocalx2->save();
                    $this->registrarhistorialx2();
                }
            } elseif ($this->tipopunto == 'C') { //cange
                

                $userlocal = Localpersona::where('id', $this->id_localpersona)->first();
                $userlocal->totpuntos = $userlocal->totpuntos - $this->puntos;
                $this->totpuntoscorreo = $userlocal->totpuntos;
                $userlocal->save();
                $this->subject = 'Canjeaste Puntos con ClienteVIP';
                $this->motivo = 'Se realizó un canje de ';
                $this->registrarhistorial();
                $this->enviarcorreo();
            }
        } elseif ($this->id_persona && $this->tipopunto == 'A') {
            $userlocal = new Localpersona();
            $userlocal->persona_id = $this->id_persona;
            $userlocal->local_id = $this->local->id;
            $userlocal->totpuntos = $this->puntos;
            $this->totpuntoscorreo = $userlocal->totpuntos;
            $userlocal->save();
            $this->subject = 'Acumulando Puntos con ClienteVIP';
            $this->motivo = 'Has recibido ';
            $this->id_localpersona = $userlocal->id;
            $this->registrarhistorial();
            $this->enviarcorreo();
            if ($this->local->multipuntos == 1) {
                $userlocalx2 = Localpersona::where('id', $this->id_localpersona)->first();
                $userlocalx2->totpuntos = $userlocalx2->totpuntos + $this->puntos;
                $this->totpuntoscorreo = $userlocalx2->totpuntos;
                $userlocalx2->save();
                $this->registrarhistorialx2();
            }
        }
        $this->resetInput();
        $this->success();
        // session()->flash('message', 'Se registró con éxito.');
    }

    public function getRecurrencia($id)
    {
        // $recurrencia = DB::select('select count(localpersona_id) as totalrecurrencia from puntocanges where localpersona_id = ?', $id);
        $recurrencia = DB::table('puntocanges')->where('localpersona_id', $id)->count();
        // dd($recurrencia);
        return $recurrencia;
    }

    public function registrarcliente()
    {
        $this->validate(
            [
                'dnitemp' => 'required',
                'dni' => 'required|unique:personas',
                'nombres_completo' => 'required',
                'celulartemp' => 'required',
            ],
            [
                'nombres_completo.required' => 'Campo Nombres requerido',
                'celulartemp.required' => 'Campo Celular requerido',
            ]
        );

        $user = User::create([
            'name' => $this->nombres_completo,
            'email' => $this->dnitemp . '@mail.com',
            'rol' => 3, //rol 1 = Admin, 2 = Local, 3 = Consumidor
            'password' => Hash::make($this->celulartemp),
        ]);
        $user->assignRole('cliente');

        Persona::create([
            'user_id' => $user->id,
            'dni' => $this->dnitemp,
            'nombres' => $this->nombrestemp,
            'apellidos' => $this->apellidostemp,
            'celular' => $this->celulartemp,
            'correo' => $this->dnitemp . '@mail.com',
            'estado' => 1
        ]);

        $this->nombres_completo = '';
        $this->dnitemp = '';
        $this->nombrestemp = '';
        $this->apellidostemp = '';
        $this->celulartemp = '';

        $this->estadobusqueda = '';

        // $this->resetInput();
        // $this->updateMode = false;
        $this->emit('closeModal');
        session()->flash('message_register', 'Se registró con exito');
    }
    public function enviarcorreo()
    {
        if ($this->email) {
            $message = [
                'name' => $this->nombrecliente,
                'negocio' => $this->nombrenegocio,
                'email' => $this->email,
                'subject' => $this->subject,
                'puntorecibido' => $this->puntos,
                'totalpuntos' => $this->totpuntoscorreo,
                'motivo' => $this->motivo,
                'tipo' => $this->tipopunto,
            ];
            try {
                Mail::to($this->email)->queue(new MensajeRecibido($message));
            } catch (\Throwable $th) {
                // dd($th->message);
            }
            // return new MensajeRecibido($message);
            // return 'Mensaje enviado';
        }
    }
    private function resetInput()
    {
        $this->id_localpersona = null;
        $this->id_persona = null;
        // $this->tipopunto = 'A';
        $this->monto = null;
        $this->puntos = null;
        $this->no_register = null;
        $this->totpuntosss = null;
        $this->dni = null;
        $this->persona = null;
        $this->subject = null;
        $this->totpuntoscorreo = null;
        $this->email = null;
        $this->nrocomprobante = null;
        $this->recurrencia =null;
    }

    public function registrarhistorial()
    {
        // Puntocange::create([
        //     'localpersona_id' => $this->id_localpersona,
        //     'persona_id' => $this->id_persona,
        //     'tipopunto' => $this->tipopunto,
        //     'monto' => $this->monto,
        //     'puntos' => $this->puntos,
        //     'local' => $this->local->id,
        //     'variante'=>'PT',
        //     'descripcion'=> 'C. Promcional'
        // ]);
        $historialpuntos = new Puntocange();
        $historialpuntos->localpersona_id = $this->id_localpersona;
        $historialpuntos->persona_id = $this->id_persona;
        $historialpuntos->tipopunto = $this->tipopunto;
        $historialpuntos->monto = $this->monto;
        $historialpuntos->puntos = $this->puntos;
        $historialpuntos->local = $this->local->id;
        $historialpuntos->nrocomprobante = $this->nrocomprobante;
        $historialpuntos->user_id = Auth()->id();
        if ($this->tipopunto == 'A') {
            $historialpuntos->variante ='PT';
            $historialpuntos->descripcion = 'Acumulaciones';
        }else{
            $historialpuntos->variante ='PT';
            $historialpuntos->descripcion = 'Canjes';

            if ($this->recompensa) {
                $recompensa =json_decode($this->recompensa);
                $historialpuntos->redencion_id = $recompensa->id;
            }
        }
        $historialpuntos->save();
    }
    public function registrarhistorialx2()
    {
        $historialpuntos = new Puntocange();
        $historialpuntos->localpersona_id = $this->id_localpersona;
        $historialpuntos->persona_id = $this->id_persona;
        $historialpuntos->tipopunto = $this->tipopunto;
        $historialpuntos->monto = $this->monto;
        $historialpuntos->puntos = $this->puntos;
        $historialpuntos->local = $this->local->id;
        $historialpuntos->nrocomprobante = $this->nrocomprobante;
        $historialpuntos->user_id = Auth()->id();
        if ($this->tipopunto == 'A') {
            $historialpuntos->variante ='MLT';
            $historialpuntos->descripcion = 'Prom. Multiplica';
        }
        $historialpuntos->save();
    }
    public function success()
    {
        $this->dispatchBrowserEvent('alert', ['message'=>'Se Registró con éxito']);
    }
    public function alertadecanjes()
    {
        foreach ($this->local->redenciones as $key => $reden) {
            if ($this->totpunto >= $reden->puntos) {   
                $this->dispatchBrowserEvent('canges', ['message'=>$reden->titulo]);
            }
        }
    }
}
