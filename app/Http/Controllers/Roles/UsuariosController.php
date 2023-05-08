<?php

namespace App\Http\Controllers\Roles;

use App\Models\roles\Usuarios;
use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Models\User;
use App\Models\Locale;
use App\Models\roles\Modulos;
use App\Models\Userlocal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

// use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Pagina inicial 
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users_local = [];
        $modulos = [];
        if (Auth::user()->rol == 1) {
            $users_local = Locale::get();
            $modulos = Modulos::where('rol', '2')->get();
        } else {
        }
        if (Auth::user()->rol == 2) {
            $users_local = Userlocal::where('local_id', Auth::user()->local->id)->get();
            $modulos = Modulos::where('rol', '3');
        }
        // echo User::with('permissions')->get();

        return view('roles.usuarios.index', compact('users_local', 'modulos'));
    }


    /**
     * Metodo para almacenar un usuario a negocio
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $local = Locale::where('id', Auth::user()->local->id)->first();

            if (!$local->dominio) {
                return response()->json([
                    'ok' => false,
                    'message' =>  "Por favor configure dominio en el modulo Config. Negocio "
                ]);
            }


            if (!$request->username) {
                return response()->json([
                    'ok' => false,
                    'message' =>  "Ingresa email valido"
                ]);
            }

            $password =  Hash::make($request->password);
            $user = User::where('email', $request->username . '@' . $local->dominio)->first();

            if (!$user) {

                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->username . '@' . $local->dominio,
                    'rol' => 5, //rol 1 = Admin, 2 = Local, 3 = Consumidor
                    'password' => $password,
                ]);
                $user->assignRole('empleado');
            } else {

                $user->update([
                    'name' => $request->name,
                    // 'email' => $request->username . '@' . $local->dominio,
                    'password' => $password,
                    'estado' => $request->estatus,
                ]);
            }
            $user_local =  Userlocal::where('local_id', Auth::user()->local->id)->where('user_id', $user->id)->first();

            if (!$user_local) {

                Userlocal::create([
                    'user_id' => $user->id,
                    'local_id' => Auth::user()->local->id
                ]);
            }


            $persona = Persona::where('correo', $request->username . '@' . $local->dominio)->first();
            if (!$persona) {

                $persona = Persona::create([
                    'user_id' => $user->id,
                    'dni' => '',
                    'nombres' => $request->name,
                    'apellidos' => 'tienda',
                    'correo' =>  $request->username . '@' . $local->dominio,
                    'estado' => $request->status,
                ]);
            }


            return response()->json([
                'ok' => true,
            ]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'ok' => false,
                'error' => 'algo salío mal',
                'message' => $e,
            ]);
        }
    }


    /**
     * Esta funcion la utilizamos para generar y asignar los permisos los permisos 
     *
     * @param  \App\Models\roles\Usuarios  $usuarios
     * @return \Illuminate\Http\Response
     */
    public function permisos(Request $request)
    {
        try {
            $user = User::where('id', $request->user_id)->first();
            if ($user) {

                $user->syncPermissions();

                $permisos =  json_decode($request->permisos);

                foreach ($permisos  as $permiso) {
                    $permission = Permission::where('name', $permiso)->first();
                    if ($permission) {
                    } else {
                        $permission = Permission::create(['name' => $permiso]);
                    }

                    $user->givePermissionTo($permission);
                }

                return response()->json([
                    'ok' => true,
                    'message' => 'Asignado Exitosamente',
                ]);
            } else {

                return response()->json([
                    'ok' => false,
                    'message' => 'No se encontro al usuario',
                ]);
            }
        } catch (Exception $e) {

            return response()->json([
                'ok' => false,
                'error' => 'algo salío mal',
                'message' => $e,
            ]);
        }

        //
    }
}
