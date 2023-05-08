<?php

namespace App\Http\Controllers\Promocion;

use App\Http\Controllers\Controller;
use App\Models\Locale;
use App\Models\Promocione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PromocionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth()->user()->rol == 2) {
            $local = Locale::where('user_id', Auth()->id())->first();

            $locale_id = $local->id;
            $locales = [];

            // $keyWord = '%' . $keyWord . '%';
            // return view('livewire.promociones.view', [
            //     'promociones' => Promocione::latest()
            //         // ->orWhere('locale_id', 'LIKE', $keyWord)
            //         // ->orWhere('titulo', 'LIKE', $keyWord)
            //         // ->orWhere('file', 'LIKE', $keyWord)
            //         // ->orWhere('estado', 'LIKE', $keyWord)
            //         // ->orWhere('fechaini', 'LIKE', $keyWord)
            //         // ->orWhere('fechafin', 'LIKE', $keyWord)
            //         // ->orWhere('lclfechaini', 'LIKE', $keyWord)
            //         // ->orWhere('lclfechafin', 'LIKE', $keyWord)
            //         ->Where('locale_id', $this->local->id)
            //         ->with('local')
            //         ->paginate(10),
            // ]);
        } else {
            $local = [];
            $locales = DB::table('locales')->select('id', 'titulo')->where('estado', 1)->get();
            // $keyWord = '%' . $this->keyWord . '%';
            // return view('livewire.promociones.view', [
            //     'promociones' => Promocione::latest()
            //         // ->orWhere('locale_id', 'LIKE', $keyWord)
            //         ->orWhere('titulo', 'LIKE', $keyWord)
            //         ->orWhere('file', 'LIKE', $keyWord)
            //         ->orWhere('estado', 'LIKE', $keyWord)
            //         ->orWhere('fechaini', 'LIKE', $keyWord)
            //         ->orWhere('fechafin', 'LIKE', $keyWord)
            //         ->orWhere('lclfechaini', 'LIKE', $keyWord)
            //         ->orWhere('lclfechafin', 'LIKE', $keyWord)
            //         ->with('local')
            //         ->paginate(10),
            // ]);
        }
        return view('backend.promociones.crear', compact('locales', 'local'));
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'locale_id' => 'required',
            ]);

            // DB::beginTransaction();
            $record = new Promocione();
            $record->locale_id = $request->locale_id;
            $record->titulo = $request->titulo;
            // $record->file = $request->file;
            $record->estado = $request->estado;
            $record->fechaini = $request->fechaini;
            $record->fechafin = $request->fechafin;
            $record->lclfechaini = $request->lclfechaini;
            $record->lclfechafin = $request->lclfechafin;
            $record->save();

            // $record = Promocione::create([
            //     'locale_id' => $request->locale_id,
            //     'titulo' => $request->titulo,
            //     // 'file' => $request->file,
            //     'estado' => $request->estado,
            //     'fechaini' => $request->fechaini,
            //     'fechafin' => $request->fechafin,
            //     'lclfechaini' => $request->lclfechaini,
            //     'lclfechafin' => $request->lclfechafin
            // ]);

            if ($request->file) {
                $urltemp = 'promociones/' . time() . '_0.' . $request->file->getClientOriginalExtension();
                $img = \Image::make($request->file)->resize(null, 374, function ($constraint) {
                    $constraint->aspectRatio();
                })->save('img/' . $urltemp);
                $record->file = $urltemp;
                $record->save();
            }
            // DB::commit();

            return response()->json([
                "status" => 1,
                "success" => 'ok',
                'message' => 'Se registró con éxito.',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

        if (Auth()->user()->rol == 2) {
            $promocion = Promocione::findOrFail($id);
            $local = Locale::where('user_id', Auth()->id())->first();
            $locales = [];
            if ($promocion->locale_id != $local->id) {
                return redirect('promociones');
            }
        } else {
            // $locales = '';
            $promocion = Promocione::findOrFail($id);
            $local = Locale::where('id', $promocion->locale_id)->first();
            $locales = DB::table('locales')->select('id', 'titulo')->where('estado', 1)->get();
        }

        // $this->selected_id = $id;
        // $this->locale_id = $record->locale_id;
        // $this->titulo = $record->titulo;
        // // $this->file = $record->file;
        // $this->estado = $record->estado;
        // $this->fechaini = $record->fechaini;
        // $this->fechafin = $record->fechafin;
        // $this->lclfechaini = $record->lclfechaini;
        // $this->lclfechafin = $record->lclfechafin;

        // $this->updateMode = true;
        // dd($local);

        return view('backend.promociones.editar', compact('local','locales','promocion'));
    }

    public function update(Request $request)
    {
        // dd($request->all());

        try {
            $request->validate([
                'locale_id' => 'required',
            ]);

            DB::beginTransaction();

            if ($request->id) {
                $record = Promocione::find($request->id);
                $record->update([
                    'locale_id' => $request->locale_id,
                    'titulo' => $request->titulo,
                    // 'file' => $request->file,
                    'estado' => $request->estado,
                    'fechaini' => $request->fechaini,
                    'fechafin' => $request->fechafin,
                    'lclfechaini' => $request->lclfechaini,
                    'lclfechafin' => $request->lclfechafin
                ]);
                if ($request->file) {
                    $urltemp = 'promociones/' . time() . '_0.' . $request->file->getClientOriginalExtension();
                    $img = \Image::make($request->file)->resize(null, 374, function ($constraint) {
                        $constraint->aspectRatio();
                    })->save('img/' . $urltemp);
                    $record->file = $urltemp;
                    $record->save();
                }
            }
            DB::commit();

            return response()->json([
                "status" => 1,
                "success" => 'ok',
                'message' => 'Se actualizó con éxito.',
            ]);
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function destroy($id)
    {
        //
    }
}
