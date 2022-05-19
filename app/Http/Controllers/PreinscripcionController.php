<?php

namespace App\Http\Controllers;

use App\Models\Preinscripcion;
use App\Models\Pais;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PreinscripcionController extends Controller
{

    public function index()
    {
        $preinscripciones = Preinscripcion::paginate();

        return view('preinscripcion.index', compact('preinscripciones'))
            ->with('i', (request()->input('page', 1) - 1) * $preinscripciones->perPage());
    }


    public function create()
    {
        $preinscripcion = new Preinscripcion();
        return view('preinscripcion.create', compact('preinscripcion'));
    }

    public function store(Request $request)
    {
        request()->validate(Preinscripcion::$rules);

        $preinscripcion = new Preinscripcion();
        $preinscripcion->DOCUMENTO = $request->get('DOCUMENTO');
        $preinscripcion->NOMBRE_PADRE = $request->get('NOMBRE_PADRE');
        $preinscripcion->APELLIDO_PADRE = $request->get('APELLIDO_PADRE');
        $preinscripcion->NOMBRE_HIJO = $request->get('NOMBRE_HIJO');
        $preinscripcion->APELLIDO_HIJO = $request->get('APELLIDO_HIJO');
        $preinscripcion->FECHA_NAC = $request->get('FECHA_NAC');
        $preinscripcion->LATITUD = $request->get('LATITUD');
        $preinscripcion->LONGITUD = $request->get('LONGITUD');
        $date = Carbon::now();
        $date = $date->format('Ymd H:i:s');
        $preinscripcion->DATETIME = $date;
        $preinscripcion->STATUS = $request->get('STATUS');
        $preinscripcion->save();

        
        return redirect()->route('preinscripciones.index')
            ->with('success', 'Preinscripcion creada exitosamente');
    }

    public function show($id)
    {
        $preinscripcion = Preinscripcion::find($id);

        return view('preinscripcion.show', compact('preinscripcion'));
    }

    public function edit($id)
    {
        $preinscripcion = Preinscripcion::find($id);

        return view('preinscripcion.edit', compact('preinscripcion'));
    }

   
    public function update(Request $request, $id)
    {
        request()->validate(Preinscripcion::$rules);

        //$pais->update($request->all());

        $preinscripcion = Preinscripcion::find($id);
        $preinscripcion->NOMBRE_PAIS = $request->get('NOMBRE_PAIS');
        $preinscripcion->STATUS = $request->get('STATUS');
        $preinscripcion->save();

        return redirect()->route('paises.index')
            ->with('success', 'País actualizado con éxito');
    }

    public function destroy($id)
    {
        $preinscripcion = Preinscripcion::find($id)->delete();

        return redirect()->route('preinscripciones.index')
            ->with('success', 'Preinscripcion eliminado con exito');
    }
}
