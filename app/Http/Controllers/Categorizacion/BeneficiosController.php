<?php

namespace App\Http\Controllers\Categorizacion;

use App\Http\Controllers\Controller;

//importamos los modelos a utilizar
use App\Models\categorizacion\Niveles;
use App\Models\categorizacion\Categorizacion;
use App\Models\categorizacion\Beneficios;

use App\Models\locale;
use App\Models\Persona;
use App\Models\Userlocal;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class BeneficiosController extends Controller
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
        if(!$local){
            $user_local = Userlocal::where('user_id',Auth::user()->id)->first();
            $local = $user_local->locale;
        }
        $niveles = Niveles::where('local_id', $local->id)->get();
        
        for ($i=0;  $i < $niveles->count(); $i++) { 
           $niveles[$i]->beneficios = Beneficios::where('categorizacion_nivel_id',$niveles[$i]->id)->get();
       }
        return view('categorizacion.beneficios.index',compact('niveles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $localperson = Localpersona::where('persona_id', auth()->user()->id)->first();
 

        // Log::info(print_r($localperson, true));
        // Log::info(json_encode($localperson)); 

        // $local = Locale::where('user_id','31' )->first();


       return 1;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\categorizacion\Beneficios  $Beneficios
     * @return \Illuminate\Http\Response
     */
    public function show(Beneficios $Beneficios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\categorizacion\Beneficios  $Beneficios
     * @return \Illuminate\Http\Response
     */
    public function edit(Beneficios $Beneficios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\categorizacion\Beneficios  $Beneficios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Beneficios $Beneficios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\categorizacion\Beneficios  $Beneficios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        try{

            $record = Beneficios::where('id', $request->id);
			$record->delete();
            return response()->json([
                'ok' => true,
            ]);
        }   
        catch(Exception $e){

            return response()->json([
                'ok' => false,
                'error_detail' => $e,
            ]);
        }

        //
    }

    public function updatePhoto(Request $request)
    {
        try {

        //ADD se agrega durante el cambio a roles 
        $local =  Auth::user()->local;
        if(!$local){
            $user_local = Userlocal::where('user_id',Auth::user()->id)->first();
            $local = $user_local->locale;
        }

        $path = public_path('img/Beneficios');
        if(!\File::isDirectory($path)){
            \File::makeDirectory($path, 0777, true, true);
        }
        $urltemp = '';
      
        $file = $request->file('image');
        if($file){

            $urltemp = 'Beneficios/' . time() . '_0.' . $file->getClientOriginalExtension();
            $img = \Image::make($file)->resize(null, 374, function ($constraint) {
                $constraint->aspectRatio();
            })->save('img/' . $urltemp);
        }

        Beneficios::create([
            'categorizacion_nivel_id' => $request->categorizacion_nivel_id,
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'tyc' => $request->tyc,
            'local_id' => $local->id,
           'user_id' => Auth::user()->id,
            'images' => $urltemp,
        ]);

        return response()->json([
            'ok' => true,
        ]);
        }
        catch(Exception $e){

            return response()->json([
                'ok' => false,
                'error_detail' => $e,
            ]);

        }
        
    }

}
