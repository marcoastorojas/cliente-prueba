<?php

namespace App\Http\Livewire;

use App\Models\Locale;
use App\Models\Localpersona;
use App\Models\Persona;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Puntocange;
use App\Models\Userlocal;
use Illuminate\Support\Facades\Auth;

class Puntocanges extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $localpersona_id, $persona_id, $tipopunto, $monto, $puntos, $local, $dni; 
    public $totpuntosss;
    public $persona;
    public $no_register;
    public $updateMode = false;

    public function render()
    {
     
        // $local = Locale::where('user_id', Auth()->id())->first();
        
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.puntocanges.view', [
            'puntocanges' => Puntocange::latest()
						->orWhere('localpersona_id', 'LIKE', $keyWord)
						->orWhere('persona_id', 'LIKE', $keyWord)
						->orWhere('tipopunto', 'LIKE', $keyWord)
						->orWhere('monto', 'LIKE', $keyWord)
						->orWhere('puntos', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
    public function consultadni($dni)
    {
        $local = Locale::where('user_id', Auth()->id())->first();
        
         /**
         *  Se agrega esta seccion para controlar a los usuarios empleados en el modulo de roles 
         */
        if (!$local) {
            $user_local = Userlocal::where('user_id', Auth()->id())->first();
            $local = $user_local->locale;
        }
        
        $persona = Persona::where('dni', $dni)
        ->with(array('local'=>function($query) use ($local){
            $query->where('local_id', $local->id);
        }))
        ->first();
        // dd($persona);

        // $this->persona = $persona->nombres;
        // $this->totpuntosss = $persona->locales[0]->totpuntos;
        // $this->localpersona_id = $persona->locales[0]->id;
        // $this->persona_id = $persona->id;
        $this->persona = $persona->nombres;
        $this->persona_id = $persona->id;
        if ($persona->local != null) {
            # code...
            $this->totpuntosss = $persona->local->totpuntos;
            $this->localpersona_id = $persona->local->id;
        }else{
            $this->totpuntosss = '0';
            $this->localpersona_id = $local->id;
            $this->no_register = 'No Está Registrado';
        }
        
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->localpersona_id = null;
		$this->persona_id = null;
		$this->tipopunto = null;
		$this->monto = null;
		$this->puntos = null;
    }

    

    public function store()
    {
        

        $this->validate([
		'localpersona_id' => 'required',
		'persona_id' => 'required',
		'tipopunto' => 'required',
		'monto' => 'required',
		'puntos' => 'required',
        ]);

        Puntocange::create([ 
			'localpersona_id' => $this-> localpersona_id,
			'persona_id' => $this-> persona_id,
			'tipopunto' => $this-> tipopunto,
			'monto' => $this-> monto,
			'puntos' => $this-> puntos
        ]);

        if ($this->tipopunto == 'A') {
            $userlocal = Localpersona::where('id', $this->localpersona_id)->first();
            $userlocal->totpuntos = $userlocal->totpuntos + $this->puntos;
            $userlocal->save();
        }else{
            $userlocal = Localpersona::where('id', $this->localpersona_id)->first();
            $userlocal->totpuntos = $userlocal->totpuntos - $this->puntos;
            $userlocal->save();
        }
        

        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Puntocange Successfully created.');
    }

    public function edit($id)
    {
        $record = Puntocange::findOrFail($id);

        $this->selected_id = $id; 
		$this->localpersona_id = $record-> localpersona_id;
		$this->persona_id = $record-> persona_id;
		$this->tipopunto = $record-> tipopunto;
		$this->monto = $record-> monto;
		$this->puntos = $record-> puntos;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'localpersona_id' => 'required',
		'persona_id' => 'required',
		'tipopunto' => 'required',
		'monto' => 'required',
		'puntos' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Puntocange::find($this->selected_id);
            $record->update([ 
			'localpersona_id' => $this-> localpersona_id,
			'persona_id' => $this-> persona_id,
			'tipopunto' => $this-> tipopunto,
			'monto' => $this-> monto,
			'puntos' => $this-> puntos
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Puntocange Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Puntocange::where('id', $id);
            $record->delete();
        }
    }
}
