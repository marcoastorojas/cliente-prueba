<?php

namespace App\Http\Livewire;

use App\Models\Ciudad;
use App\Models\Giftcard;
use App\Models\Historial;
use App\Models\Localpersona;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Persona;
use App\Models\Puntocange;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Support\Facades\DB;

class Personas extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $dni, $nombres, $apellidos, $celular, $correo, $fechanac, $estado, $datofake, $tipodoc;
    public $locales = [];
    public $updateMode = false;
    public $ciudades, $clixciudad;
    public $selectciudad = '';

    public function render()
    {
        $this->ciudades = Ciudad::where('estado', 1)->get();

         $this->clixciudad = DB::table('personas')
                ->leftJoin('ciudads','personas.ciudad_id','=','ciudads.id')
                 ->select('ciudads.ciudad', DB::raw('count(*) as total'))
                 ->groupBy('ciudads.ciudad')
                 ->orderBy('total','desc')
                 ->get();
                //  dd($cliciud);

        $keyWord = '%' . $this->keyWord . '%';
        return view('livewire.personas.view', [
            'personas' => Persona::latest()
                ->orWhere('ciudad_id', $this->selectciudad)
                ->orWhere('dni', 'LIKE', $keyWord)
                // ->orWhere('nombres', 'LIKE', $keyWord)
                ->orWhere('apellidos', 'LIKE', $keyWord)
                // ->orWhere('tipodoc', 'LIKE', $keyWord)
                // ->orWhere('celular', 'LIKE', $keyWord)
                // ->orWhere('correo', 'LIKE', $keyWord)
                // ->orWhere('fechanac', 'LIKE', $keyWord)
                // ->orWhere('estado', 'LIKE', $keyWord)
                ->with('user','ciudade')
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
        $this->dni = null;
        $this->nombres = null;
        $this->celular = null;
        $this->correo = null;
        $this->fechanac = null;
        $this->estado = null;
    }

    public function store()
    {
        $this->validate([
            'dni' => 'required',
            'nombres' => 'required',
            'celular' => 'required',
            'correo' => 'required',
            'fechanac' => 'required',
            'estado' => 'required',
        ]);

        Persona::create([
            'dni' => $this->dni,
            'nombres' => $this->nombres,
            'celular' => $this->celular,
            'correo' => $this->correo,
            'fechanac' => $this->fechanac,
            'estado' => $this->estado
        ]);

        $this->resetInput();
        $this->emit('closeModal');
        session()->flash('message', 'Persona Successfully created.');
    }

    public function edit($id)
    {
        $record = Persona::findOrFail($id);

        $this->selected_id = $id;
        $this->dni = $record->dni;
        $this->nombres = $record->nombres;
        $this->apellidos = $record->apellidos;
        $this->celular = $record->celular;
        $this->correo = $record->correo;
        $this->fechanac = $record->fechanac;
        $this->estado = $record->estado;

        $user = User::where('id', $record->user_id)->first();
        $this->datofake = $user->estado;

        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
            'dni' => 'required',
            'nombres' => 'required',
            'correo' => 'required',
            'estado' => 'required',
        ]);

        if ($this->selected_id) {
            $record = Persona::find($this->selected_id);
            $record->update([
                'dni' => $this->dni,
                'nombres' => $this->nombres,
                'apellidos' => $this->apellidos,
                'celular' => $this->celular,
                'correo' => $this->correo,
                'fechanac' => $this->fechanac,
                'estado' => $this->estado
            ]);
            $user = User::where('id', $record->user_id)->first();
            $user->email = $this->correo;
            $user->estado = $this->datofake;
            $user->update();

            $this->resetInput();
            $this->updateMode = false;
            session()->flash('message', 'Persona Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $persona = Persona::where('id', $id)->first();

            $pc = Puntocange::where('persona_id', $persona->id)->delete();
            $lp = Localpersona::where('persona_id', $persona->id)->delete();
            $modelr = DB::table('model_has_roles')
                ->where('model_id', $persona->user_id)
                ->delete();
            $persona->delete();
            $user = User::where('id', $persona->user_id)->delete();
        }
    }

    public function localAfiliado($id)
    {
        $record = Persona::findOrFail($id);

        $this->selected_id = $id;
        $this->dni = $record->dni;
        $this->nombres = $record->nombres;
        $this->apellidos = $record->apellidos;
        $this->celular = $record->celular;
        $this->tipodoc = $record->tipodoc;

        // $this->updateMode = true;

        $localsafiliados = Localpersona::where('persona_id', $record->id)->with('locale')->get();
        $this->locales = $localsafiliados;
        // if ($localsafiliados) {
        // }else{
        //     $this->locales = '';
        // }
        // dd($this->locales);
    }

    public function elminarnegoco($idlocal)
    {
        $historial = DB::table('puntocanges')->where('localpersona_id', $idlocal)->get();
        $locales = DB::table('localpersonas')->where('id', $idlocal)->first();
        // array_push($history, ['local'=>$locales, 'puntos_canje'=>$historial]);
        $history = ['localpersona'=>$locales, 'puntos_canje'=>$historial];

        $hist = new Historial();
        $hist->motivo = 'Eliminacion de Local e historial del cliente';
        $hist->registros = json_encode($history);
        $hist->save();

        DB::table('puntocanges')->where('localpersona_id', $idlocal)->delete();
        DB::table('localpersonas')->delete($idlocal);
        session()->flash('message_eliminado', 'Se elimino el local y su historial.');
        // dd($idlocal);
        $this->success();
    }
    public function success()
    {
        $this->dispatchBrowserEvent('alert', ['message' => 'Se elimino el local y su historial.']);
    }
}
