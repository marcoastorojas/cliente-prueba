<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tipe;

class Tipes extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $tipos, $descripcion, $estado, $ordenar;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.tipes.view', [
            'tipes' => Tipe::orderBy('ordenar', 'asc')
						->orWhere('tipos', 'LIKE', $keyWord)
						->orWhere('descripcion', 'LIKE', $keyWord)
						->orWhere('estado', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->tipos = null;
		$this->descripcion = null;
		$this->estado = null;
    }

    public function store()
    {
        $this->validate([
		'tipos' => 'required',
		'descripcion' => 'required',
		'estado' => 'required',
        ]);

        Tipe::create([ 
			'tipos' => $this-> tipos,
			'descripcion' => $this-> descripcion,
			'estado' => $this-> estado,
            'ordenar' => $this-> estado
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Tipe Successfully created.');
    }

    public function edit($id)
    {
        $record = Tipe::findOrFail($id);

        $this->selected_id = $id; 
		$this->tipos = $record-> tipos;
		$this->descripcion = $record-> descripcion;
		$this->estado = $record-> estado;
        $this->ordenar = $record->ordenar;

		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'tipos' => 'required',
		'descripcion' => 'required',
		'estado' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Tipe::find($this->selected_id);
            $record->update([ 
			'tipos' => $this-> tipos,
			'descripcion' => $this-> descripcion,
			'estado' => $this-> estado,
            'ordenar' => $this-> ordenar
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Actualizado.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Tipe::where('id', $id);
            $record->delete();
        }
    }
}
