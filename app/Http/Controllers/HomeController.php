<?php

namespace App\Http\Controllers;

use App\Models\Cupon;
use App\Models\Locale;
use App\Models\Localpersona;
use App\Models\Persona;
use App\Models\Puntocange;
use App\Models\Redencion;
use App\Models\Tipe;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
// use Spatie\Permission\Models\Role;
// use RealRashid\SweetAlert\Facades\Alert;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     // $this->middleware('auth');
    //     $this->middleware(['role:admin|comercio|cliente','validar_info']);
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth()->user()->rol == 2 || Auth()->user()->rol == 5 ) {
            return redirect()->route('puntos');
        }
        // return redirect()->away('https://bit.ly/ClienteVipApp');
        // $local = Locale::where('user_id', )->first();
        $peraona = '';
        $localperson = [];
        $persona = Persona::where('user_id', Auth()->id())->first();
        // dd($persona);
        if ($persona != null) {
            $localperson = Localpersona::where('persona_id', $persona->id)
                ->orderBy('totpuntos', 'desc')
                ->with('locale.redenciones')
                ->get();
            $cupones = Cupon::where('estado', 1)->get();
        } else {
            // dd($persona);
            $peraona;
            $localperson = [];
            $cupones = [];
        }
        // ->with(array('locales'=>function($query) use ($local){
        //     $query->where('local_id', $local->id);
        // }))
        // ->first();
        // Alert::success('','Código promocional activado.');


        return view('backend/home', compact('persona', 'localperson', 'cupones'));
    }
    public function inforedencion($idlocal)
    {

        $localperson = Localpersona::where('persona_id', Auth()->user()->persona->id)
            ->where('local_id', $idlocal)
            ->first();

        $local = Locale::where('id', $idlocal)
            ->with('redenciones')
            ->with(array('redenciones' => function ($query) {
                $query->orderBy('puntos');
            }))
            ->firstorfail();

        $movimientos = Puntocange::where('localpersona_id', $localperson->id)
            ->orderBy('id', 'desc')
            ->take(5)
            ->get();


        return view('backend.detalles', compact('localperson', 'local', 'movimientos'));
    }
    public function negocios()
    {
        // $locales = Locale::where('estado', 1)->with('infolocals')->get();
        $tipolocals = Tipe::where('estado', 1)
        // ->with('locales.infolocals')
        ->with(array('locales' => function ($query) {
            $query->where('estado', 1);
            $query->with('infolocals');
        }))
        ->get();

        return view('backend.negocios', compact('tipolocals'));
    }
    public function recompensas($id)
    {
        $local = Locale::where('id', $id)->where('estado', 1)->with('infolocals')->firstorfail();

        $recompensas = Redencion::where('local_id', $local->id)
            ->with('locale')->where('estado', 1)->orderBy('puntos', 'asc')->get();
        return view('backend.detallerecompensas', compact('local', 'recompensas'));
    }

    public function impersonate_leave()
    {

        Auth::user()->leaveImpersonation();
        return redirect()->route('home');
    }

    public function reportenegocioclientes()
    {
        // $locales = Locale::where('estado', 1)
        // ->with(array('localpersonas' => function ($query) {
        //     $query->selectRaw('local_id, COUNT(local_id) as Cantidad');
        //     $query->groupBy('local_id');
        // }))
        // ->get();


        // $first = DB::table('localpersonas')
        //     ->select('persona_id')
        //     ->where('estado', 0);

        // $local = DB::table('localpersonas')
        //     // ->where('titulo')
        //     ->select('persona_id')
        //     ->union($locales)
        //     ->get();
        // dd($local);

        $repo = Locale::where('estado', 1)
            ->join('localpersonas', 'locales.id', '=', 'localpersonas.local_id')
            ->selectRaw('locales.id, locales.titulo, locales.logo, COUNT(localpersonas.local_id) as cant_cli')
            ->groupBy('localpersonas.local_id')
            ->with(array('localpersonas' => function ($query) {
                $query->select('id', 'local_id', 'persona_id');
                $query->with(array('puntocanges' => function ($query) {
                    $query->where('tipopunto', 'A');
                }));
            }))
            ->orderBy('cant_cli', 'desc')
            ->get()->toArray();

        $locales =  array();
        foreach ($repo as $key => $local) {
            $val = 0;
            foreach ($local['localpersonas'] as $key => $localper) {
                if (count($localper['puntocanges']) >= 2) {
                    $val = $val + 1;
                }
            }
            array_push($locales, ['cantclirecu' => $val, 'localcli' => $local]);
        }
        // dd($locales);


        // dd($repo);
        // return $locales;

        // $locales = DB::table('localpersonas')
        //     ->join('locales', 'locales.id', '=', 'localpersonas.local_id')
        //     ->selectRaw('locales.id, locales.titulo, locales.logo, localpersonas.local_id, COUNT(localpersonas.local_id) as cantidad')
        //     ->groupBy('localpersonas.local_id')
        //     ->orderBy('cantidad', 'desc')
        //     ->get();
        // dd($locales);
        return view('backend.admin.reportenegociocliente', compact('locales'));

        // $localcliente = Localpersona::selectRaw('COUNT(local_id) as Cantidad')
        // ->where('local_id', $locales->id)
        // ->groupBy('local_id')
        // ->get();
        // dd($localcliente);

    }
    public function reportRecompensaCliente()
    {
        $localperonas =  array();
        $locals = DB::select("SELECT id, titulo, estado FROM locales WHERE estado = 1");
        foreach ($locals as $key => $lcl) {
            $premios = DB::select(DB::raw("SELECT MIN(puntos) as puntomin FROM redencions WHERE estado = 1 AND local_id = :idlocal"), array(
                'idlocal' => $lcl->id
            ));
            $personaspremios = DB::select(DB::raw("SELECT p.nombres, p.apellidos, p.correo, lp.totpuntos, p.celular, lp.local_id
            FROM localpersonas AS lp
            INNER JOIN personas as p ON lp.persona_id = p.id
            WHERE lp.local_id = :idlocal AND lp.totpuntos >= :totpunto
            ORDER BY lp.totpuntos DESC"), array(
                'idlocal' => $lcl->id, 'totpunto' => $premios[0]->puntomin
            ));

            $cantidad = count($personaspremios);
            array_push($localperonas, ['local' => $lcl, 'clientes' => $personaspremios, 'cantidad' => $cantidad]);
        }

        // dd($localperonas);

        // $collection = collect([
        //     ['name' => 'Desk', 'colors' => ['Black', 'Mahogany']],
        //     ['name' => 'Chair', 'colors' => ['Black']],
        //     ['name' => 'Bookcase', 'colors' => ['Red', 'Beige', 'Brown']],
        // ]);

        // $sorted = collect($localperonas)->sortByDesc(function ($cli, $key) {
        //     return count($cli['clientes']);
        // });

        // dd($sorted->values()->all());

        return view('backend.admin.reporterecompensacliente', compact('localperonas'));
    }
    public function enviarReporte($id)
    {
        $ayer = date("Y-m-d", mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")));
        // dd($ayer);
        $local = Locale::where('id', $id)->firstorfail();
        $totalcli = Localpersona::where('local_id', $id)
            ->count();
        $totalhoy = Puntocange::where('local', $id)
            ->whereDate('created_at', '=', $ayer)
            ->count();
        // $query->whereDate('created_at', '=', Carbon::today()->toDateString());
        $ayerformat = date("d-m-Y", mktime(0, 0, 0, date("m"), date("d") - 1, date("Y")));
        $text = 'Hola *' . $local->titulo . '*, te saluda el equipo de de *ClienteVIP*, hasta la fecha tienes *' . $totalcli . '* clientes en tu programa de lealtad. El ' . $ayerformat . ' se realizó *' . $totalhoy . '* operación(es) de acumulación o canje de puntos.';

        $url = 'https://wa.me/51' . $local->celularprop . '?text=' . $text;
        return Redirect::to($url);
    }
    public function userxdianegocio($localid)
    {
        $local = Locale::where('id', $localid)->first();
        $userXmes = Localpersona::select(
            DB::raw('count(id) as total'),
            DB::raw("DATE_FORMAT(created_at,'%m') as mes")
        )
            ->where('local_id', $localid)
            ->whereYear('created_at', 2022)
            ->groupBy('mes')
            ->get();
        // dd($userXmes);
        $xdia =  array();
        foreach ($userXmes as $key => $value) {

            $userXdia = Localpersona::select(
                DB::raw('count(id) as total'),
                DB::raw("DATE_FORMAT(created_at,'%m-%d') as dia")
            )
                ->where('local_id', $localid)
                ->whereYear('created_at', 2022)
                ->whereMonth('created_at', $value->mes)
                ->groupBy('dia')
                ->get();

            // $cantidad = count($personaspremios);
            array_push($xdia, ['mes'=>$value->mes, 'dias' => $userXdia]);
        }
        // dd($xdia);

        // 2023
        $local2 = Locale::where('id', $localid)->first();
        $userXmes2 = Localpersona::select(
            DB::raw('count(id) as total'),
            DB::raw("DATE_FORMAT(created_at,'%m') as mes")
        )
            ->where('local_id', $localid)
            ->whereYear('created_at', 2023)
            ->groupBy('mes')
            ->get();
        // dd($userXmes2);
        $xdia2 =  array();
        foreach ($userXmes2 as $key => $value) {

            $userXdia2 = Localpersona::select(
                DB::raw('count(id) as total'),
                DB::raw("DATE_FORMAT(created_at,'%m-%d') as dia")
            )
                ->where('local_id', $localid)
                ->whereYear('created_at', 2023)
                ->whereMonth('created_at', $value->mes)
                ->groupBy('dia')
                ->get();

            // $cantidad = count($personaspremios);
            array_push($xdia2, ['mes'=>$value->mes, 'dias' => $userXdia2]);
        }
        // dd($xdia);


        return view('backend.admin.repograficouserxnegocio', compact('userXmes','xdia','local','userXmes2','xdia2'));
    }

    public function repoClixDia()
    {
        $userXdia = User::select(
            DB::raw('count(id) as total'),
            DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as dia")
        )
            ->groupBy('dia')
            ->get();

        return $userXdia;

        dd($userXdia);
    }

    public function generatorQr()
    {
        // dd($request->all());
        $valor = 'hola mundo';
        return view('backend.qrgenerator', compact('valor'));
    }

    public function qrgenerate(Request $request)
    {
        // dd($request->all());
        $valor = $request->descripcion;
        return view('backend.qrgenerator', compact('valor'));
    }
}
