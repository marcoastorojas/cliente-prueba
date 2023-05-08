<?php

namespace App\Http\Livewire;

use App\Models\Tipe;
use App\Models\Locale;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class Comercio extends Component
{
	use WithFileUploads;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $titulo, $descripcion, $direccion, $ciudad, $celular, $user_id, $tipe_id, $config_punto, $config_monto, $estado, $logo, $logoshow;
    public $tipos, $users;
	public $nombresprop, $apellidosprop, $celularprop, $correo, $restriccion, $catalogo, $nombrecatalogo;
	public $email, $password;
    public $updateMode = false;
	//se agrego para la configuracion de roles
	public $dominio;


    public function render()
    {
        $this->tipos = Tipe::where('estado', 1)->get();
        return view('livewire.comercio.comercio');
    }
    public function mount()
    {
        $this->getcomercio();
        
    }
    public function getcomercio()
    {
        $record = Locale::where('user_id', Auth()->id())->firstorfail();
        // dd($record);

        $this->selected_id = $record->id; 
		$this->titulo = $record-> titulo;
		$this->descripcion = $record-> descripcion;
		$this->direccion = $record-> direccion;
		$this->ciudad = $record-> ciudad;
		$this->celular = $record-> celular;
		$this->user_id = $record-> user_id;
		$this->tipe_id = $record-> tipe_id;
		$this->config_punto = $record-> config_punto;
		$this->config_monto = $record-> config_monto;
		$this->estado = $record-> estado;
		$this->correo = $record->email;
		$this->email = $record->user->email;
		$this->nombresprop = $record->nombresprop;
		$this->apellidosprop = $record->apellidosprop;
		$this->celularprop = $record->celularprop;
		$this->restriccion = $record->restriccion;
		$this->logoshow = $record->logo;
		$this->catalogo = $record->catalogo;
		$this->nombrecatalogo = $record->nombrecatalogo;
			// dominio
		$this->dominio = $record->dominio;
		
        // $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
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

        if ($this->selected_id) {
			$record = Locale::find($this->selected_id);
            $record->update([ 
			'titulo' => $this-> titulo,
			'descripcion' => $this-> descripcion,
			'direccion' => $this-> direccion,
			'email' => $this-> correo,
			'dominio' => $this-> dominio,
			'celular' => $this-> celular,
			// 'user_id' => $this-> user_id,
			'tipe_id' => $this-> tipe_id,
			'nombresprop' => $this-> nombresprop,
			'apellidosprop' => $this-> apellidosprop,
			'celularprop' => $this-> celularprop,
			'restriccion' => $this-> restriccion,
			'catalogo' => $this->catalogo,
			'nombrecatalogo' => $this->nombrecatalogo,
			// 'config_punto' => $this-> config_punto,
			// 'config_monto' => $this-> config_monto,
			// 'estado' => $this-> estado
            ]);
			if ($this->logo) {
				$urltemp = 'logo/' . time() . '_0.' . $this->logo->getClientOriginalExtension();
				$img = \Image::make($this->logo)->resize(null, 250, function ($constraint) {
					$constraint->aspectRatio();
				})->save('img/' . $urltemp);
				$record->logo = $urltemp;
				$record->save();
			}

            // $this->resetInput();
            // $this->updateMode = false;
        }
		if ($this->password != '') {
			$user = User::where('id',Auth()->id())->first();
			$validatedUser = $this->validate([
				'password'=>'min:6',
			]);
			$user->password = Hash::make($this->password);
			$user->save();
		}

		$this->success();

		// session()->flash('message', 'Se actualizó con éxito.');
    }
	public function success()
    {
        $this->dispatchBrowserEvent('alert', ['message'=>'Se actualizó con éxito.']);
    }
}
