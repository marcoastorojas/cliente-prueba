<?php

namespace App\Http\Livewire;

use App\Models\Ciudad;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Locale;
use App\Models\Localplan;
use App\Models\Tipe;
use App\Models\User;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Locales extends Component
{
	use WithPagination;

	protected $paginationTheme = 'bootstrap';
	public $selected_id, $keyWord, $titulo, $ruc, $descripcion, $direccion, $ciudad, $celular, $user_id, $tipe_id, $config_punto, $config_monto, $estado, $ciudad_id;
	public $tipos, $users, $planes, $periodos, $ciudades;
	public $updateMode = false;
	public $email, $password;
	public $correo, $nombresprop, $apellidosprop, $correoprop, $celularprop, $registro, $activepass, $comprobante;
	public $localplan_id, $plane_id, $fechapago, $periodo_id, $tarifa, $observaciones;
	public $selectciudad = '1';
	public $negoxciudad, $multipuntos;
	// public $locales;


	public function render()
	{
		$this->tipos = Tipe::where('estado', 1)->get();
		$this->ciudades = Ciudad::where('estado', 1)->get();
		// $this->users = User::get();
		$this->planes = DB::table('planes')->select('id', 'plan', 'tarifa')->where('estado', 1)->get();
		$this->periodos = DB::table('periodos')->select('id', 'periodo', 'periodonum')->where('estado', 1)->get();

		$this->negoxciudad = DB::table('locales')
                ->leftJoin('ciudads','locales.ciudad_id','=','ciudads.id')
                 ->select('ciudads.ciudad', DB::raw('count(*) as total'))
                 ->groupBy('ciudads.ciudad')
                 ->orderBy('total','desc')
                 ->get();
                //  dd($this->negoxciudad);
				$keyWord = '%' . $this->keyWord . '%';

				$locales =  Locale::orWhere('titulo', 'LIKE', $keyWord)
				->where('ciudad_id', $this->selectciudad)
				->orderBy('created_at', 'DESC')
				->with('tipe','ciudade','localplan')
				->paginate(10);

		return view('livewire.locales.view', [
			'locales' =>$locales,
		]);
	}

	// public function filtrarciudad()
    // {
    //     $this->resetPage('commentsPage');
    // }

	// public function filtrarciudad2()
	// {
	// 	return view('livewire.locales.view', [
	// 		'locales' => Locale::where('ciudad_id', $this->selectciudad)
	// 			->orderBy('titulo', 'ASC')
	// 			->with('tipe','ciudade')
	// 			->paginate(10, 'commentsPage'),
	// 	]);
	// }
	public function mount()
	{
		$this->estado = 1;
		$this->config_punto = 1;
		$this->config_monto = 1;
		$this->registro = 0;
		$this->comprobante = 0;
	}

	public function cancel()
	{
		$this->resetInput();
		$this->updateMode = false;
	}

	private function resetInput()
	{
		$this->titulo = null;
		$this->ruc = null;
		$this->descripcion = null;
		$this->direccion = null;
		$this->ciudad = null;
		$this->celular = null;
		$this->user_id = null;
		$this->tipe_id = null;
		$this->config_punto = null;
		$this->config_monto = null;
		$this->estado = null;
		$this->email = null;
		$this->password = null;
		$this->nombresprop = null;
		$this->apellidosprop = null;
		$this->correo = null;
		$this->celularprop = null;
		$this->registro = 0;
		$this->activepass = 0;
		$this->comprobante = 0;

		$this->localplan_id = null;
		$this->plane_id = null;
		$this->periodo_id = null;
		$this->fechapago = null;
		$this->tarifa = null;
		$this->observaciones = null;
		$this->ciudad_id = null;
	}

	public function store()
	{
		$this->validate([
			'titulo' => 'required',
			'descripcion' => 'required',
			// 'direccion' => 'required',
			// 'ciudad' => 'required',
			// 'celular' => 'required',
			// 'user_id' => 'required',
			'tipe_id' => 'required',
			'config_punto' => 'required',
			'config_monto' => 'required',
			'estado' => 'required',
			'email' => 'required|email|unique:users',
			'password' => 'required|min:6',
		]);
		$user = User::create([
			'name' => $this->titulo,
			'email' => $this->email,
			'rol' => '2',
			'password' => Hash::make($this->password),
		]);
		$user->assignRole('comercio');

		$locale = Locale::create([
			'titulo' => $this->titulo,
			'ruc' => $this->ruc,
			'descripcion' => $this->descripcion,
			'direccion' => $this->direccion,
			'ciudad' => $this->ciudad,
			'celular' => $this->celular,
			'user_id' => $user->id,
			'tipe_id' => $this->tipe_id,
			'config_punto' => $this->config_punto,
			'config_monto' => $this->config_monto,
			'estado' => $this->estado,
			'email' => $this->correo,
			'password' => $this->password,

			'nombresprop' => $this->nombresprop,
			'apellidosprop' => $this->apellidosprop,
			'celularprop' => $this->celularprop,
			'registro' => $this->registro,
			'comprobante' => $this->comprobante,
			'ciudad_id' => $this->ciudad_id,
		]);
		if ($this->plane_id && $this->periodo_id) {
			$localplan = new Localplan();
			$localplan->locale_id = $locale->id;
			$localplan->plane_id = $this->plane_id;
			$localplan->periodo_id = $this->periodo_id;
			$localplan->fechapago = $this->fechapago;
			$localplan->tarifa = $this->tarifa;
			$localplan->observaciones = $this->observaciones;
			$localplan->save();
		}

		$this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Registrado.');
	}

	public function edit($id)
	{
		$record = Locale::findOrFail($id);

		$this->selected_id = $id;
		$this->titulo = $record->titulo;
		$this->ruc = $record->ruc;
		$this->descripcion = $record->descripcion;
		$this->direccion = $record->direccion;
		$this->ciudad = $record->ciudad;
		$this->celular = $record->celular;
		// $this->user_id = $record-> user_id;
		$this->tipe_id = $record->tipe_id;
		$this->config_punto = $record->config_punto;
		$this->config_monto = $record->config_monto;
		$this->estado = $record->estado;
		$this->correo = $record->email;

		$this->nombresprop = $record->nombresprop;
		$this->apellidosprop = $record->apellidosprop;
		$this->celularprop = $record->celularprop;
		$this->email = $record->user->email;
		$this->registro = $record->registro;
		$this->comprobante = $record->comprobante;
		$this->ciudad_id = $record->ciudad_id;
		$this->multipuntos = $record->multipuntos;

		$localplan = Localplan::where('locale_id', $id)->first();
		if ($localplan) {
			$this->localplan_id = $localplan->id;
			$this->plane_id = $localplan->plane_id;
			$this->periodo_id = $localplan->periodo_id;
			$this->fechapago = $localplan->fechapago;
			$this->tarifa = $localplan->tarifa;
			$this->observaciones = $localplan->observaciones;
		}

		$this->updateMode = true;
	}

	public function update()
	{
		// dd($this->ciudad_id);
		$this->validate([
			'titulo' => 'required',
			'descripcion' => 'required',
			'direccion' => 'required',
			// 'ciudad' => 'required',
			'celular' => 'required',
			// 'user_id' => 'required',
			'tipe_id' => 'required',
			'config_punto' => 'required',
			'config_monto' => 'required',
			'estado' => 'required',
			'ciudad_id' => 'required',
		]);

		if ($this->selected_id) {
			$record = Locale::find($this->selected_id);
			$record->update([
				'titulo' => $this->titulo,
				'ruc' => $this->ruc,
				'descripcion' => $this->descripcion,
				'direccion' => $this->direccion,
				'ciudad' => $this->ciudad,
				'celular' => $this->celular,
				// 'user_id' => $this-> user_id,
				'tipe_id' => $this->tipe_id,
				'config_punto' => $this->config_punto,
				'config_monto' => $this->config_monto,
				'email' => $this->correo,
				'estado' => $this->estado,
				'registro' => $this->registro,
				'comprobante' => $this->comprobante,
				

				'nombresprop' => $this->nombresprop,
				'apellidosprop' => $this->apellidosprop,
				'celularprop' => $this->celularprop,
				'ciudad_id' => $this->ciudad_id,
				'multipuntos' => $this->multipuntos,
				
			]);

			if ($this->localplan_id) {
				$localplan = Localplan::where('id', $this->localplan_id)->first();
				$localplan->plane_id = $this->plane_id;
				$localplan->periodo_id = $this->periodo_id;
				$localplan->fechapago = $this->fechapago;
				$localplan->tarifa = $this->tarifa;
				$localplan->observaciones = $this->observaciones;
				$localplan->save();
			} else if ($this->plane_id && $this->periodo_id) {
				$localplan = new Localplan();
				$localplan->locale_id = $this->selected_id;
				$localplan->plane_id = $this->plane_id;
				$localplan->periodo_id = $this->periodo_id;
				$localplan->fechapago = $this->fechapago;
				$localplan->tarifa = $this->tarifa;
				$localplan->observaciones = $this->observaciones;
				$localplan->save();
			}

			$user = User::where('id', $record->user_id)->first();
			if ($this->email && $user->email != $this->email) {
				$validatedUserE = $this->validate([
					'email' => 'required|email|max:191|unique:users,email,' . $user->id,
				]);
				$user->email = $this->email;
			}
			// $user->email = $this->email;
			if ($this->password) {
				$user->password = Hash::make($this->password);
			}
			$user->save();


			$this->resetInput();
			$this->updateMode = false;
			session()->flash('message', 'Actualizado.');
		}
	}

	public function destroy($id)
	{
		if ($id) {
			$record = Locale::where('id', $id);
			$record->delete();
		}
	}
	public function impersonate($local)
	{

		$user = User::find($local['user_id']);
		// dd($user);
		Auth::user()->impersonate($user);
		return redirect()->route('home');
	}
}
