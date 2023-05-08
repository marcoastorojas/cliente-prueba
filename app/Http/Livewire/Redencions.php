<?php

namespace App\Http\Livewire;

use App\Models\Locale;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Redencion;
use App\Models\Userlocal;
use Livewire\WithFileUploads;

class Redencions extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $techo, $titulo, $puntos, $estado, $local_id, $foto, $costo, $precio, $imgtemp;
    public $local;
    public $updateMode = false;

    public function render()
    {

        $local = Locale::where('user_id', Auth()->id())->first();
        
        /**
         *  Se agrega esta seccion para controlar a los usuarios empleados en el modulo de roles 
         */
        if (!$local) {
            $user_local = Userlocal::where('user_id', Auth()->id())->first();
            $local = $user_local->locale;
        }

        // dd($local);
        // $this->local = $local;
        $this->local_id = $local->id;

        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.redencions.view', [
            'redencions' => Redencion::where('titulo', 'LIKE', $keyWord)
						// ->orWhere('puntos', 'LIKE', $keyWord)
						// ->orWhere('estado', 'LIKE', $keyWord)
						->Where('local_id', $local->id)
                        ->orderBy('puntos', 'asc')
						->paginate(10),
        ]);
    }
    public function mount()
    {
        $this->estado = 1;
    }
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }

    private function resetInput()
    {
        $this->techo = null;
        $this->titulo = null;
        $this->puntos = null;
        $this->estado = null;
        $this->foto = null;
        $this->local_id = null;
        $this->costo = null;
        $this->precio = null;
    }

    public function store()
    {
        $this->validate([
            'local_id' => 'required',
            'titulo' => 'required',
            'puntos' => 'required',
            'estado' => 'required',
        ]);

        $record = Redencion::create([
            'titulo' => $this->titulo,
            'puntos' => $this->puntos,
            'estado' => $this->estado,
            'local_id' => $this->local_id,
            'costo' => $this->costo,
            'precio' => $this->precio,
            'modificar' => date('Y-m-d', strtotime(date('Y-m-d') . " +" . 1 . "month")),
        ]);
        if ($this->foto) {
            $urltemp = 'redencion/' . time() . '_0.' . $this->foto->getClientOriginalExtension();
            $img = \Image::make($this->foto)->resize(null, 600, function ($constraint) {
                $constraint->aspectRatio();
            })->save('img/' . $urltemp);
            $record->foto = $urltemp;
            $record->save();
        }

        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'Redencion creada.');
    }

    public function edit($id)
    {
        $record = Redencion::findOrFail($id);

        $this->selected_id = $id;
        $this->techo = $record->techo;
        $this->titulo = $record->titulo;
        $this->puntos = $record->puntos;
        $this->imgtemp = $record->foto;
        $this->estado = $record->estado;
        $this->local_id = $record->local_id;
        $this->costo = $record->costo;
        $this->precio = $record->precio;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'local_id' => 'required',
        ]);

        //     $ldate = date('Y-m-d');
        // dd($ldate);
        // $vencimiento = date('Y-m-d', strtotime(date('Y-m-d') . " +" . 1 . "month")); // PHP:  2009-03-31
        // dd($vencimiento);

        if ($this->selected_id) {
            $record = Redencion::find($this->selected_id);
            $record->update([
                'techo' => $this->techo,
                'titulo' => $this->titulo,
                'puntos' => $this->puntos,
                'estado' => $this->estado,
                'costo' => $this->costo,
                'precio' => $this->precio,
                'modificar' => date('Y-m-d', strtotime(date('Y-m-d') . " +" . 1 . "month")),
                // 'local_id' => $this-> local_id
            ]);
            if ($this->foto) {
                $urltemp = 'redencion/' . time() . '_0.' . $this->foto->getClientOriginalExtension();
                $img = \Image::make($this->foto)->resize(null, 600, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('img/' . $urltemp);
                $record->foto = $urltemp;
                $record->save();
            }



            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Redencion actualizada.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Redencion::where('id', $id);
            $record->delete();
        }
    }
}
