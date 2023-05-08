<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\categorizacion\Asignacion;
use App\Models\categorizacion\Beneficios;
use App\Models\categorizacion\nivel;
use App\Models\categorizacion\Niveles;
use App\Models\categorizacion\Periodos;
use App\Models\Localpersona;
use App\Models\Persona;
use App\Models\Puntocange;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PuntoController extends Controller
{
    public function puntosLocal()
    {
        // if (Auth()->user()->rol == 2) {
        //     return redirect()->route('puntos');
        // }
        // $local = Locale::where('user_id', )->first();
        $persona = '';
        $localperson = [];
        $persona = Persona::where('user_id', Auth()->id())->first();
        // dd($persona);
        if ($persona != null) {
            $localperson = Localpersona::where('persona_id', $persona->id)
                ->orderBy('totpuntos', 'desc')
                ->with(array('locale.redenciones'=>function($query){
                    $query->orderBy('puntos', 'asc');
                }))
                ->with('locale.infolocals')
                
                ->get();
            $localperson->map(function ($item) use ($persona) {
               
               
               
                $puntosmin = DB::table('redencions')
                    ->where('local_id', $item->local_id)
                    ->min('puntos');
                if ($item->totpuntos >= $puntosmin) {
                    $item->recompensa = 1;
                } else {
                    $item->recompensa = 0;
                }

                //Primero necesitamos ver si tenemos periodo activo en el local 
                error_log($item->local_id);

                $periodoActivo = DB::selectOne("select * from categorizacion_periodos t1 where t1.status = 1 and t1.fecha_fin >= CURDATE() and t1.local_id = ". $item->local_id);
                // verificacion asignacion manual 

                if($periodoActivo){

                    // revisamos si no existe una asignacion manual 
                    $nivel = DB::selectOne("SELECT t3.*,t2.min_puntos,t2.max_puntos, t2.id as id_nivel FROM categorizacion_asignacion_nivel t1
                    inner join categorizacion_niveles t2 on t1.categorizacion_nivel_id = t2.id
                    inner join niveles t3 on t3.id = t2.nivel_id
                    where t1.categorizacion_periodo_id = ". $periodoActivo->id ." and t1.user_id = ".Auth()->id());

                    if($nivel){
                        $beneficios = Beneficios::where('categorizacion_nivel_id' , $nivel->id_nivel)->get();
                        $nivel->beneficios = $beneficios;
                        return $item;
                    }

                    // si no tiene una asignacion manual obtenemos el 
                    $query = 'select *, "" as nivel , "Manual" as asignacion from (select persona_id as id , sum(puntos) as totpuntos ,personas.nombres,personas.apellidos,personas.dni from puntocanges
                    inner join personas on
                        puntocanges.persona_id = personas.id
                        where
                    localpersona_id in (
                        SELECT id FROM `localpersonas`
                        where local_id = ' . $item->local_id .'  and persona_id = '. $persona->id .'
                        group by persona_id, id )
                        and puntocanges.tipopunto = "A"
                        and puntocanges.created_at BETWEEN "' . $periodoActivo->fecha_inicio_ant . '" and "' . $periodoActivo->fecha_fin_ant . '" 
                        group by persona_id,personas.id,personas.nombres,personas.apellidos,personas.dni order by sum(puntos) desc)  as tabla ';
            
                    $puntosPeriodo = DB::selectOne($query);


                    if($puntosPeriodo){

                        $nivel = DB::selectOne('SELECT t2.*,t1.min_puntos,t1.max_puntos, t1.id as id_nivel FROM `categorizacion_niveles` t1 
                        inner join niveles t2 on t2.id = t1.nivel_id
                        where t1.local_id = '.$item->local_id.' and ('.$puntosPeriodo->totpuntos.' >= t1.min_puntos and  '.$puntosPeriodo->totpuntos.' <= t1.max_puntos);');
    
                        $beneficios = Beneficios::where('categorizacion_nivel_id' , $nivel->id_nivel)->get();
                        $nivel->beneficios = $beneficios;  
                        $item->nivel = $nivel;
                    }


                }


                return $item;
            });
        } else {
            $persona;
            $localperson = [];
        }

        return response()->json([
            "status" => 1,
            "msg" => "Consulta de puntos",
            "persona" => $persona,
            "puntoslocal" => $localperson
        ]);
    }

    public function infoPuntosDetalle($idlocalpersona)
    {
        // $localperson = Localpersona::where('persona_id', Auth()->user()->persona->id)
        //     ->where('local_id', $idlocal)
        //     ->first();
        $disclaimer = "* Sujeto a modificaciones por el Negocio.";
        

        $movimientos = Puntocange::where('localpersona_id', $idlocalpersona)
            ->select('tipopunto','puntos','descripcion','created_at')
            ->orderBy('id', 'desc')
            ->take(10)
            ->get();

        return response()->json([
            "status" => 1,
            "msg" => "Consulta de movimientos",
            "movimientos" => $movimientos,
            "disclaimer" => $disclaimer
        ]);
    }
}
