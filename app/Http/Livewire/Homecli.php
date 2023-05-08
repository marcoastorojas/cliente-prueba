<?php

namespace App\Http\Livewire;

use App\Models\Locale;
use App\Models\Localpersona;
use App\Models\Persona;
use App\Models\Redencion;
use Livewire\Component;

class Homecli extends Component
{
    public $updateMode = false;
    public $redenciones;

    public function render()
    {
        $this->redenciones = [];
        return view('livewire.homecliente.homecli',$this->listar());
    }
    public function listar()
    {
        $peraona = '';
        $localperson = [];
        $persona = Persona::where('user_id', Auth()->id())->first();
        // dd($persona);
        if ($persona != null) {
            $localperson = Localpersona::where('persona_id', $persona->id)
                ->with('locale')
                ->get();
        }else{
            // dd($persona);
            $peraona;
            $localperson = [];
        }
        return compact('persona', 'localperson');
    }
    public function edit($id, $idlocal)
    {
        // dd($id, $idlocal);
        $record = Redencion::where('local_id', $idlocal)->where('estado', 1)->get();
        $this->redenciones = $record;
        // dd($this->redenciones);

        // $this->selected_id = $id; 
		// $this->titulo = $record-> titulo;
		// $this->descripcion = $record-> descripcion;
		// $this->direccion = $record-> direccion;
		// $this->ciudad = $record-> ciudad;
		// $this->celular = $record-> celular;
		// $this->user_id = $record-> user_id;
		// $this->tipe_id = $record-> tipe_id;
		// $this->config_punto = $record-> config_punto;
		// $this->config_monto = $record-> config_monto;
		// $this->estado = $record-> estado;
		
        $this->updateMode = true;
    }
    public function cancel()
    {
        // $this->resetInput();
        $this->updateMode = false;
    }
}
