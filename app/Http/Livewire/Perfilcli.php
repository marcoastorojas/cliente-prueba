<?php

namespace App\Http\Livewire;

use App\Models\Locale;
use App\Models\Persona;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Perfilcli extends Component
{
    public $selected_id, $keyWord, $dni, $nombres, $apellidos, $celular, $correo, $fechanac, $user_id, $estado;
    // public $tipos;
    public $users;
    public $password;
    public $updateMode = false;

    public function render()
    {
        // $this->tipos = Tipe::where('estado', 1)->get();
        // return view('livewire.comercio.comercio');
        return view('livewire.perfilcli.perfilcli');
    }
    public function mount()
    {
        $this->getcliente();
        
    }
    public function getcliente()
    {
        $record = Persona::where('user_id', Auth()->id())->firstorfail();
        // dd($record);

        $this->selected_id = $record->id; 
		$this->dni = $record-> dni;
		$this->nombres = $record-> nombres;
		$this->apellidos = $record-> apellidos;
		$this->correo = $record-> correo;
		$this->celular = $record-> celular;
		$this->fechanac = $record-> fechanac;
		$this->estado = $record-> estado;
		
        // $this->updateMode = true;
    }
    public function update()
    {
        $this->validate([
		'dni' => 'required',
		'nombres' => 'required',
		'apellidos' => 'required',
		// 'correo' => 'required',
		// 'celular' => 'required',
		// 'fechanac' => 'required',
		// 'tipe_id' => 'required',
		// 'config_punto' => 'required',
		// 'config_monto' => 'required',
		// 'estado' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Persona::find($this->selected_id);
            $record->update([ 
			'nombres' => $this-> nombres,
			'apellidos' => $this-> apellidos,
			'celular' => $this-> celular,
			// 'ciudad' => $this-> ciudad,
			// 'user_id' => $this-> user_id,
			'fechanac' => $this-> fechanac,
			// 'config_punto' => $this-> config_punto,
			// 'config_monto' => $this-> config_monto,
			// 'estado' => $this-> estado
            ]);

            if ($this->password) {
                $user = User::where('id', Auth()->id())->firstorfail();
                $user->password = Hash::make($this->password);
                $user->save();
            }

            // $this->resetInput();
            // $this->updateMode = false;
			session()->flash('message', 'Se actualizó con éxito.');
        }

        
    }
}
