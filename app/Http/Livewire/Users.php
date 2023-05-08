<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\User;
use App\Models\Persona;
use App\Models\Userlocal;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $rol_id,$q;
    public $roles = [];
    public $updateMode = false;
    public $salida;

    public function render()
    {
        try {
        $this->roles=Role::where('tipo','T')->get();
        $keyWord = '%' . $this->keyWord . '%';
        $usuarios=[];
        return view('livewire.users.view', [
            'usuarios' => Userlocal::join('locales as l','l.id','=','userlocals.local_id')
            ->join('users as u','u.id','=','userlocals.user_id')
            ->join('personas as p','p.user_id','=','u.id')
            ->where('l.user_id', Auth()->id())
            ->whereRaw('p.dni like "'.$keyWord.'"')
            ->select('u.id as id','p.nombres as nombres','p.apellidos as apellidos','p.dni as dni')
            ->paginate(10)]);
        }
        catch (\Exception $e) {
            dd($e);
            //code to handle the exception
        }
    }

    public function buscarUsuario(){
        $keyWord = '%'.$this->q.'%';
            $this->salida=User::join('personas as p','p.user_id','=','users.id')
            ->where('users.rol','!=',2)
            ->whereRaw('p.nombres LIKE "'.$keyWord.'" OR p.apellidos LIKE "'.$keyWord.'" OR p.dni like "'.$keyWord.'"')
            ->select('users.id as id','p.nombres as nombres','p.apellidos as apellidos','p.dni as dni')
            ->first();
    }
}
