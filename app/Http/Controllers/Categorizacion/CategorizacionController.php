<?php

namespace App\Http\Controllers\Categorizacion;

use App\Http\Controllers\Controller;
use App\Models\categorizacion\Asignacion;
use App\Models\categorizacion\Categorizacion;
use App\Models\categorizacion\Niveles;
use App\Models\categorizacion\Periodos;
use App\Models\User;
use App\Models\Userlocal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategorizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ADD se agrega durante el cambio a roles 

        $local =  Auth::user()->local;
        if (!$local) {
            $user_local = Userlocal::where('user_id', Auth::user()->id)->first();
            $local = $user_local->locale;
        }


        //verificamos si existe el programa de categorización
        $categorizacion = Categorizacion::where('local_id', $local->id)->first();

        $niveles = [];
        $periodoActivo = '';
        $periodo = null;

        if ($categorizacion) {

            //verrificamos los niveles de cada usuarios
            $niv = DB::select('select t1.id,t1.titulo,COUNT(t2.id) as numBeneficios FROM categorizacion_niveles t1
        left join categorizacion_beneficios t2 on t1.id = t2.categorizacion_nivel_id
        where t1.local_id = ' . $local->id .
                ' group by t1.id,t1.titulo,t1.id;');

            // verificamos si existe un periodo activo
            // $periodoActivo = Periodos::where('local_id', $local->id)->where('categorizacion_id', $categorizacion->id)->where('status', '1')->first();
            $periodoActivo = DB::selectOne("select * from categorizacion_periodos t1 where t1.status = 1 and t1.fecha_fin >= CURDATE() and t1.local_id = ". $local->id);

            //obtenemos los datos del periodo.
            $periodo = $this->ObtenerPeriodoActivo($categorizacion->periodos);

            if ($categorizacion->periodos == 3)
                $categorizacion->mesesPeriodo = "Enero - Marzo, Abril - Junio , Julio - Septiembre, Octubre - Diciembre";
            if ($categorizacion->periodos == 6)
                $categorizacion->mesesPeriodo = "Enero - Junio , Julio - Diciembre";
            if ($categorizacion->periodos == 12)
                $categorizacion->mesesPeriodo = "Enero - Diciembre";


            // verificamos si algun nivel no esta configurado
            $niveles = array_filter($niv, function ($obj) {
                if ($obj->numBeneficios == 0) {
                    return true;
                }
            });
        }
        // echo $niveles;

        return view('categorizacion.index', compact('niveles', 'periodoActivo', 'periodo', 'categorizacion'));
    }

    public function ObtenerPeriodoActivo(int $periodo)
    {
        $now = Carbon::now();
        $mesActual = $now->month;
        $añoActual = $now->year;

        $meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

        if ($periodo == 3) {
            if ((1 <= $mesActual) && ($mesActual <= 3)) {
                return array(
                    "inicio" => $añoActual . "-01-01",
                    "fin" => $añoActual . $this->obtenerUltimoDiaMes(3),
                    "inicioAnterior" => ($añoActual - 1) . "-10-01",
                    "finAnterior" => ($añoActual - 1) . $this->obtenerUltimoDiaMes(12),
                );
            }
            if ((4 <= $mesActual) && ($mesActual <= 6)) {
                return array(
                    "inicio" => $añoActual . "-04-01",
                    "fin" => $añoActual . $this->obtenerUltimoDiaMes(6),
                    "inicioAnterior" => $añoActual . "-01-01",
                    "finAnterior" => $añoActual . $this->obtenerUltimoDiaMes(3),
                );
            }
            if ((7 <= $mesActual) && ($mesActual <= 9)) {
                return array(
                    "inicio" => $añoActual . "-07-01",
                    "fin" => $añoActual . $this->obtenerUltimoDiaMes(9),
                    "inicioAnterior" => $añoActual . "-04-01",
                    "finAnterior" => $añoActual . $this->obtenerUltimoDiaMes(6),
                );
            }
            if ((10 <= $mesActual) && ($mesActual <= 12)) {
                return array(
                    "inicio" => $añoActual . "-10-01",
                    "fin" => $añoActual . $this->obtenerUltimoDiaMes(12),
                    "inicioAnterior" => $añoActual . "-07-01",
                    "finAnterior" => $añoActual . $this->obtenerUltimoDiaMes(9),
                );
            }
        }

        if ($periodo == 4) {
            if ((1 <= $mesActual) && ($mesActual <= 4)) {
                return array(
                    "inicio" => $añoActual . "-01-01",
                    "fin" => $añoActual . $this->obtenerUltimoDiaMes(4),
                    "inicioAnterior" => "f",
                    "finAnterior" => "sdf",
                );
            }
            if ((4 <= $mesActual) && ($mesActual <= 8)) {
                return array(
                    "inicio" => $añoActual . "-01-01",
                    "fin" => $añoActual . $this->obtenerUltimoDiaMes(8),
                    "inicioAnterior" => "f",
                    "finAnterior" => "sdf",
                );
            }
            if ((9 <= $mesActual) && ($mesActual <= 12)) {
                return array(
                    "inicio" => $añoActual . "-01-01",
                    "fin" => $añoActual . $this->obtenerUltimoDiaMes(12),
                    "inicioAnterior" => "f",
                    "finAnterior" => "sdf",
                );
            }
        }

        if ($periodo == 6) {
            if ((1 <= $mesActual) && ($mesActual <= 6)) {
                return array(
                    "inicio" => $añoActual . "-01-01",
                    "fin" => $añoActual . $this->obtenerUltimoDiaMes(6),
                    "inicioAnterior" => ($añoActual - 1) . "-07-01",
                    "finAnterior" => ($añoActual - 1) . $this->obtenerUltimoDiaMes(12),
                );
            }
            if ((7 <= $mesActual) && ($mesActual <= 12)) {
                return array(
                    "inicio" => $añoActual . "-07-01",
                    "fin" => $añoActual . $this->obtenerUltimoDiaMes(12),
                    "inicioAnterior" => $añoActual . "-01-01",
                    "finAnterior" => $añoActual . $this->obtenerUltimoDiaMes(7),
                );
            }
        }

        if ($periodo == 12) {
            if ((1 <= $mesActual) && ($mesActual <= 12)) {
                return array(
                    "inicio" => $añoActual . "-01-01",
                    "fin" => $añoActual . $this->obtenerUltimoDiaMes(12),
                    "inicioAnterior" => ($añoActual - 1) . "-01-01",
                    "finAnterior" => ($añoActual - 1) . $this->obtenerUltimoDiaMes(12),
                );
            }
        }
    }

    public function obtenerUltimoDiaMes($mes)
    {
        $month = \DateTime::createFromFormat('n', $mes);
        $month->modify('last day of this month');
        return $month->format('-m-d');
    }

    /* Metodo para comenzar con la configuracion inicial de categorizacion  */
    public function comenzar(Request $request)
    {
        try {

            $local =  Auth::user()->local;
            if (!$local) {
                $user_local = Userlocal::where('user_id', Auth::user()->id)->first();
                $local = $user_local->locale;
            }

            $datos = Niveles::where('local_id', $local->id)->get();
            if ($datos->count() > 0) {
                return response()->json([
                    'ok' => true,
                    'message' => 'Registro aplicado previamente',
                ]);
            }

            DB::beginTransaction();

            $newCate = new Categorizacion();
            $newCate->periodos = $request->periodos;
            $newCate->estatus = 0;
            $newCate->start_date = date('Y-m-d H:i:s');
            $newCate->local_id = $local->id;
            $newCate->user_id = Auth::user()->id;
            $newCate->save();

            foreach ($request->niveles as $cat) {

                $newNivel = new Niveles();
                $newNivel->nivel_id = $cat['code'];
                $newNivel->titulo = $cat['level'];
                $newNivel->descripcion = $newCate->id;
                $newNivel->min_puntos = $cat['min'];
                $newNivel->max_puntos = $cat['max'];
                $newNivel->local_id = $local->id;
                $newNivel->user_id = Auth::user()->id;
                $newNivel->save();
            }
            DB::commit();

            return response()->json([
                'ok' => true,
            ]);
        } catch (Exception $e) {

            return response()->json([
                'ok' => false,
                'error_detail' => $e,
            ]);
        }
    }

    public function periodo(Request $request)
    {
        try {

            $local =  Auth::user()->local;
            if (!$local) {
                $user_local = Userlocal::where('user_id', Auth::user()->id)->first();
                $local = $user_local->locale;
            }


            $periodo_id = 0;

            //verificmos si existe un periodo activo;
            $periodoActivo = Periodos::where('local_id', $local->id)->where('fecha_inicio', $request->Inicio)->where('status', '1')->first();

            if ($periodoActivo) {
                $periodo_id = $periodoActivo->id;
            } else {

                Periodos::where('local_id', $local->id)->where('categorizacion_id', $request->categorizacion)->update(['status' => '0']);
                $periodo = Periodos::create([
                    'categorizacion_id' => $request->categorizacion,
                    'local_id' => $local->id,
                    'fecha_inicio' => $request->Inicio,
                    'fecha_fin' => $request->fin,
                    'fecha_inicio_ant' => $request->inicioAnterior,
                    'fecha_fin_ant' => $request->finAnterior,

                    'descripcion' => "Generacion de pediodo",
                    'status' => true,
                ]);
                $periodo_id = $periodo->id;
            }

            return response()->json([
                'ok' => true,
                'message' => "Se ha generado el periodo exitosamente",
            ]);
        } catch (Exception $e) {
            return response()->json([
                'ok' => false,
                'error_detail' => $e,
            ]);
        }
        //
    }

    public function calcularNiveles($id)
    {
        //ADD se agrega durante el cambio a roles 

        $local =  Auth::user()->local;
        if (!$local) {
            $user_local = Userlocal::where('user_id', Auth::user()->id)->first();
            $local = $user_local->locale;
        }

        // echo $id;
        //aqui vamos a resivir el periodo
        $periodoActivo = Periodos::where('id', $id)->first();

        if (!$periodoActivo) {
            echo 'no se encontro el periodo';
        }

        $asignacion_manual = Asignacion::where('local_id', $local->id)->where('categorizacion_periodo_id', $periodoActivo->id)->get();

        $niveles = Niveles::where('local_id', $local->id)->get();

        $query = 'select *, "" as nivel , "Manual" as asignacion from (select persona_id as id , sum(puntos) as totpuntos  ,personas.nombres,personas.apellidos,personas.dni from puntocanges
        inner join personas on
            puntocanges.persona_id = personas.id
            where
        localpersona_id in (
            SELECT id FROM `localpersonas`
            where local_id = ' . $local->id .'
            group by persona_id, id )
            and puntocanges.tipopunto = "A"
            and puntocanges.created_at BETWEEN "' . $periodoActivo->fecha_inicio_ant . '" and "' . $periodoActivo->fecha_fin_ant . '" 
            group by persona_id,personas.id,personas.nombres,personas.apellidos,personas.dni order by sum(puntos) desc)  as tabla ';

        $personas = DB::select($query);
        for ($i = 0; $i < count($personas); $i++) {
            foreach ($niveles as $nivel) {

                if ($nivel->min_puntos <=  (int)$personas[$i]->totpuntos && $nivel->max_puntos >=  (int)$personas[$i]->totpuntos) {
                    $personas[$i]->nivel = $nivel->id;
                }
            }
        }

        return response()->json([
            'ok' => true,
            'personas' => $personas,
            'niveles' => $niveles,
            'manual' => $asignacion_manual,
        ]);

        // echo json_encode($nivelUsuario);

    }

    public function asignar(Request $request)
    {

        //ADD se agrega durante el cambio a roles 
        $local =  Auth::user()->local;
        if (!$local) {
            $user_local = Userlocal::where('user_id', Auth::user()->id)->first();
            $local = $user_local->locale;
        }

        try {

            $new = Asignacion::create([
                'user_id' => $request->user_id,
                'local_id' => $local->id,
                'fecha' => Carbon::now(),
                'categorizacion_nivel_id' => $request->nivel_id,
                'descripcion' => $request->observaciones,
                'categorizacion_periodo_id' => $request->periodo,
                'create_by' => Auth::user()->id,
            ]);

            return response()->json([
                'ok' => true,
                'message' => 'Asignación éxitosa',
            ]);
        } catch (Exception $e) {

            return response()->json([
                'ok' => false,
                'message' => $e,
            ]);
        }
    }
}
