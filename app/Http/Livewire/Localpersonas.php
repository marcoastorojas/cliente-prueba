<?php

namespace App\Http\Livewire;

use App\Models\Clientecategoria;
use App\Models\Locale;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Localpersona;
use App\Models\Puntocange;
use App\Models\Userlocal;

class Localpersonas extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $persona_id, $local_id, $movimientos;
    public $idlocalcli, $nombres, $puntos, $dni, $clicategorias, $clientecategoria_id;
    public $updateMode = false;
    public $updateModeclicatego = false;

    public function render()
    {
        $local = Locale::where('user_id', Auth()->id())->first();

        /**
         *  Se agrega esta seccion para controlar a los usuarios empleados en el modulo de roles 
         */
        if(!$local){
            $user_local = Userlocal::where('user_id', Auth()->id())->first();
            $local = $user_local->locale;
        }

		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.localpersonas.view', [
            'localpersonas' => Localpersona::join('personas', 'personas.id', '=', 'localpersonas.persona_id')
                        ->select('localpersonas.id','personas.dni', 'personas.nombres', 'personas.apellidos','localpersonas.totpuntos','localpersonas.clientecategoria_id')
                        ->orderBy('localpersonas.totpuntos','desc')
                        ->orderBy('personas.apellidos')
                        ->with('clientecategoria')
                        // ->with('persona')
                        ->orWhere('personas.apellidos', 'LIKE', $keyWord)
                        // ->orWhere('personas.dni', 'LIKE', $keyWord)
						->Where('local_id', $local->id)
						->paginate(10),
        ]);
        // dd(Localpersona::join('personas', 'personas.id', '=', 'localpersonas.persona_id')
        // ->select('personas.dni', 'personas.nombres', 'personas.apellidos')
        // ->orderBy('personas.apellidos')
        // // ->with('persona')
        // ->orWhere('persona_id', 'LIKE', $keyWord)
        // ->Where('local_id', $local->id)
        // ->paginate(10));
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->persona_id = null;
		$this->local_id = null;
    }

    public function store()
    {
        $this->validate([
		'persona_id' => 'required',
		'local_id' => 'required',
        ]);

        Localpersona::create([ 
			'persona_id' => $this-> persona_id,
			'local_id' => $this-> local_id
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Localpersona Successfully created.');
    }

    public function edit($id)
    {
        $record = Localpersona::findOrFail($id);

        $this->selected_id = $id; 
		$this->persona_id = $record-> persona_id;
		$this->local_id = $record-> local_id;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'persona_id' => 'required',
		'local_id' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Localpersona::find($this->selected_id);
            $record->update([ 
			'persona_id' => $this-> persona_id,
			'local_id' => $this-> local_id
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Localpersona Successfully updated.');
        }
    }
    public function verhistorial($id)
    {
        // $localperson = Localpersona::where('persona_id', Auth()->user()->persona->id)
        // ->where('local_id', $idlocal)
        // ->first();

        // $local = Locale::where('id', $idlocal)
        // ->with('redenciones')
        // ->firstorfail();

        $this->movimientos = Puntocange::where('localpersona_id', $id)
        ->orderBy('id', 'desc')
        ->take(10)
        ->get();
    }

    public function resetInputclicatego()
    {
        $this->idlocalcli = null;
        $this->dni = null;
        $this->nombres = null;
        $this->puntos = null;
    }

    public function getcliente($data)
    {
        $this->idlocalcli = $data['id'];
        $this->dni = $data['dni'];
        $this->nombres = $data['nombres'].' '.$data['apellidos'];
        $this->puntos = $data['totpuntos'];
        $this->clientecategoria_id = $data['clientecategoria_id'];
        // dd($data);
        $this->clicategorias = Clientecategoria::where('estado', 1)->get();
    }

    public function asignarclientecetegoria()
    {
        $locacli = Localpersona::where('id', $this->idlocalcli)->first();
        $locacli->clientecategoria_id = $this->clientecategoria_id;
        $locacli->save();

        $this->resetInputclicatego();
        $this->updateModeclicatego = false;
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Localpersona::where('id', $id);
            $record->delete();
        }
    }
}
