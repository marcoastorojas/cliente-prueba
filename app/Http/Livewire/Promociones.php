<?php

namespace App\Http\Livewire;

use App\Models\Locale;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Promocione;
use Illuminate\Support\Facades\DB;
use Livewire\WithFileUploads;

class Promociones extends Component
{
    use WithPagination, WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $locale_id, $titulo, $file, $estado, $fechaini, $fechafin, $lclfechaini, $lclfechafin;
    public $updateMode = false;
    public $locales = [];
    public $local;

    public function render()
    {


        if (Auth()->user()->rol == 2) {
            $this->local = Locale::where('user_id', Auth()->id())->first();

            $this->locale_id = $this->local->id;

            $keyWord = '%' . $this->keyWord . '%';
            return view('livewire.promociones.view', [
                'promociones' => Promocione::latest()
                    // ->orWhere('locale_id', 'LIKE', $keyWord)
                    // ->orWhere('titulo', 'LIKE', $keyWord)
                    // ->orWhere('file', 'LIKE', $keyWord)
                    // ->orWhere('estado', 'LIKE', $keyWord)
                    // ->orWhere('fechaini', 'LIKE', $keyWord)
                    // ->orWhere('fechafin', 'LIKE', $keyWord)
                    // ->orWhere('lclfechaini', 'LIKE', $keyWord)
                    // ->orWhere('lclfechafin', 'LIKE', $keyWord)
                    ->Where('locale_id', $this->local->id)
                    ->with('local')
                    ->paginate(10),
            ]);
        } else {
            $this->locales = DB::table('locales')->select('id', 'titulo')->where('estado', 1)->get();
            $keyWord = '%' . $this->keyWord . '%';
            return view('livewire.promociones.view', [
                'promociones' => Promocione::latest()
                    // ->orWhere('locale_id', 'LIKE', $keyWord)
                    ->orWhere('titulo', 'LIKE', $keyWord)
                    ->orWhere('file', 'LIKE', $keyWord)
                    ->orWhere('estado', 'LIKE', $keyWord)
                    ->orWhere('fechaini', 'LIKE', $keyWord)
                    ->orWhere('fechafin', 'LIKE', $keyWord)
                    ->orWhere('lclfechaini', 'LIKE', $keyWord)
                    ->orWhere('lclfechafin', 'LIKE', $keyWord)
                    ->with('local')
                    ->paginate(10),
            ]);
        }
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
        $this->locale_id = null;
        $this->titulo = null;
        $this->file = null;
        $this->estado = null;
        $this->fechaini = null;
        $this->fechafin = null;
        $this->lclfechaini = null;
        $this->lclfechafin = null;
    }

    public function store()
    {
        $this->validate([
            'locale_id' => 'required',
        ]);

        $record = Promocione::create([
            'locale_id' => $this->locale_id,
            'titulo' => $this->titulo,
            // 'file' => $this->file,
            'estado' => $this->estado,
            'fechaini' => $this->fechaini,
            'fechafin' => $this->fechafin,
            'lclfechaini' => $this->lclfechaini,
            'lclfechafin' => $this->lclfechafin
        ]);

        if ($this->file) {
            $urltemp = 'promociones/' . time() . '_0.' . $this->file->getClientOriginalExtension();
            $img = \Image::make($this->file)->resize(null, 374, function ($constraint) {
                $constraint->aspectRatio();
            })->save('img/' . $urltemp);
            $record->file = $urltemp;
            $record->save();
        }

        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'Promocione Successfully created.');
    }

    public function edit($id)
    {
        $record = Promocione::findOrFail($id);

        $this->selected_id = $id;
        $this->locale_id = $record->locale_id;
        $this->titulo = $record->titulo;
        // $this->file = $record->file;
        $this->estado = $record->estado;
        $this->fechaini = $record->fechaini;
        $this->fechafin = $record->fechafin;
        $this->lclfechaini = $record->lclfechaini;
        $this->lclfechafin = $record->lclfechafin;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'locale_id' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Promocione::find($this->selected_id);
            $record->update([
                'locale_id' => $this->locale_id,
                'titulo' => $this->titulo,
                // 'file' => $this-> file,
                'estado' => $this->estado,
                'fechaini' => $this->fechaini,
                'fechafin' => $this->fechafin,
                'lclfechaini' => $this->lclfechaini,
                'lclfechafin' => $this->lclfechafin
            ]);
            if ($this->file) {
                $urltemp = 'redencion/' . time() . '_0.' . $this->file->getClientOriginalExtension();
                $img = \Image::make($this->file)->resize(null, 374, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('img/' . $urltemp);
                $record->file = $urltemp;
                $record->save();
            }

            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Se actualizó con éxito.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Promocione::where('id', $id);
            $record->delete();
        }
    }
}
